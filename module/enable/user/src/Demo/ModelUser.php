<?php

namespace Demo;

/**
 * User model
 */
class ModelUser
{
    /**
     * Returns the new user database object
     * @param array $data The associative array contaning the user data
     * @return \stdClass The user object
     */
    public function register($data)
    {
        // validate post
        if ($this->validateCreate($data)) {
            
            $email = $data['email'];
            $view = new \Arch\View(conf('THEME_PATH').'/demo/email_template.php');
            $view->addContent("Thank you $email for registering!");

            $email_result = $this->mail($email, 'Register', $view);
            if(!$email_result) {
                m("Registration failed. Try again.", 'alert alert-error');
            }
            else {
                // finally register
                $user = $this->import($this->create(), $data);
                $user->password = s($user->password);
                if ($this->save($user)) {
                    m("An email was sent to your address");
                    return $user;
                } else {
                    m("Could not complete registration. Please ignore any email", 'alert alert-error');
                }
            }
        } 
        return false;
    }
    
    /**
     * Tries to login user input
     * @param array $data
     * @return mixed
     */
    public function login($email, $password) {
        
        $user = false;
        
        $rule = app()->input->createRule('email', 'IsEmail')
                ->setErrorMessage('Invalid email address');
        app()->input->addRule($rule);
        $result = app()->input->validate()->getResult();
        app()->session->loadMessages(app()->input->getMessages());
        if ($result) {
            $email      = app()->input->post('email');
            $password   = s(app()->input->post('password'));
            $user = $this->findOne(
                'email = ? and password = ?', 
                array($email, $password)
            );
            if (!$user) m('Invalid email/password', 'alert alert-error');
        }
        return $user;
    }
    
    /**
     * Removes a user from database
     * @param string $email The email identifying the user
     * @return 
     */
    public function unregister($email)
    {
        return $this->delete('email = ?', array($email));
    }
    
    /**
     * Creates a new user object
     * @return \stdClass
     */
    public function create()
    {
        $user = new \stdClass;
        $user->id = null;
        $user->email = '';
        $user->password = '';
        return $user;
    }
    
    /**
     * Validates create user data
     * @param array $input The associative array containing the user data
     * @return boolean Returns true if all data is valid, otherwise false
     */
    public function validateCreate()
    {
        $rule = app()->input->createRule('email', 'IsEmail')
                ->setErrorMessage('Invalid email address');
        app()->input->addRule($rule);
        
        $rule = app()->input->createRule('email', 'Unique')
                ->setErrorMessage('Use other email')
                ->addParam(q('demo_user')->s('email')->fetchColumn());
        app()->input->addRule($rule);
        
        $rule = app()->input->createRule('password')
                ->setErrorMessage('Password cannot be empty');
        app()->input->addRule($rule);
        
        $rule = app()->input->createRule('password', 'Equals')
                ->setErrorMessage('Password does not match')
                ->addParam(p('password_confirm'));
        app()->input->addRule($rule);

        $result = app()->input->validate()->getResult();
        app()->session->loadMessages(app()->input->getMessages());
        return $result;
    }
    
    /**
     * Imports input into user object
     * @param \stdClass $user The user object
     * @param array $post The import data
     * @return \stdClass
     */
    public function import(\stdClass $user, $post)
    {
        $user->id = empty($post['id']) ? 0 : $post['id'];
        $user->email = $post['email'];
        $user->password = $post['password'];
        return $user;
    }
    
    /**
     * Returns a user from database based on its ID
     * @param integer $id The user record ID
     * @return \stdClass
     */
    public function load($id)
    {
        $user = q('demo_user')->s('*')->w('id = ?', array($id))->fetchObject();
        return $user;
    }
    
    /**
     * Returns all users matching the $where criteria
     * @param string $where The search criteria
     * @param array $data The criteria data
     * @return array|boolean
     */
    public function find($where, $data)
    {
        $users = q('demo_user')->s('*')->w($where, $data)->fetchAll();
        return $users;
    }
    
    /**
     * Returns all users matching the $where criteria
     * @param string $where The search criteria
     * @param array $data The criteria data
     * @return array|boolean
     */
    public function findOne($where, $data)
    {
        $items = $this->find($where, $data);
        if (empty($items)) return false;
        return reset($items);
    }

    /**
     * Saves one user into the database
     * @param \stdClass $user The user object
     * @return \PDOStatement
     */
    public function save(&$user)
    {
        $data = array('email' => $user->email, 'password' => $user->password);
        if (empty($user->id)) {
            $user->id = q('demo_user')->i($data)->getInsertId();
        }
        else $stm = q('demo_user')->u($data)->w('id = ?', array($user->id))->run();
        return $stm;
    }
    
    /**
     * Deletes the users matching the where criteria
     * @param string $where The criteria
     * @param array $data The criteria data
     * @return \PDOStatement
     */
    public function delete($where, $data)
    {
        return q('demo_user')->d($where, $data)->run();
    }
    
    /**
     * Sends an email
     * 
     * Don't worry to configure an email request, but use this method.
     * This uses the phpmailer library.
     * 
     * Example:
     * $result = \Arch\App::Instance()->mail(
     *      'admin@isp.com', 
     *      'Hello', 
     *      new View('/path/to/template.php', array('greet' => 'Hi'))
     * );
     * 
     * @param string $to
     * @param string $subject
     * @param View $view
     * @return boolean
     */
    public function mail($to, $subject, $view)
    {
        try {
            require_once conf('THEME_PATH').'/../vendor/phpmailer/class.phpmailer.php';
            $mail = new \PHPMailer(true); // defaults to using php "mail()"
            $mail->CharSet = 'UTF-8';
            $mail->SetFrom(MAIL_FROM, MAIL_FROMNAME);
            $mail->AddReplyTo(MAIL_REPLY, MAIL_REPLYNAME);
            $mail->AddAddress($to);
            $mail->Subject = $subject;
            $mail->AltBody = "Please use an HTML email viewer!";
            $mail->MsgHTML((string) $view);
            $result = $mail->Send();
            app()->log("Sending mail to $to has succeed");
        }
        catch (phpmailerException $e) {
            app()->log(
                "Sending mail to $to failed: ".$e->errorMessage(), 
                'error'
            );
            $result = false;
        }
        return $result;
    }
    
    /**
     * Checks database structure for this model
     * and makes operations if needed
     */
    public static function checkDatabase($install = true)
    {
        if (!q('demo_user')->execute('select 1 from demo_user', null, '')) {
            if ($install) {
                $filename = app()->config->get('MODULE_PATH')
                        .'/enable/user/db/pgsql/install.sql';
                $r = q('demo_user')->install($filename);
                if (!$r) {
                    app()->log('Failed install database', 'error');
                    app()->redirect(app()->url('/404'));
                }
            }
        }
    }
}

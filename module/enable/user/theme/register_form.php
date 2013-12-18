<div id="<?=$_id?>" class="well">
    <h2>Register</h2>
    <form action="<?=$registerUrl?>" method="post">
        <label>Email</label>
        <input name="email" type="text" value="<?=empty($email) ? '' : $email?>" 
               placeholder="Email" /><br />
        <label>Password</label>
        <input name="password" type="password" placeholder="Password" /><br />
        <label>Confirm Password</label>
        <input name="password_confirm" type="password" 
               placeholder="Confirm password" /><br />
        <input type="hidden" name="register" value="1" />
        <button class="btn">Register</button>

        <!-- add captcha -->
        <?=view()->createAntiSpam()?>
    </form>
    <h2>PHP</h2>
    <h3>Create rule to validate email address</h3>
    <pre>
$validator = help()->createValidator();
$rules[] = $validator->createRule('email', 'IsEmail', 'Invalid email address');
$validator->validate($rules);
    </pre>
    <h3>Add more rules and finally get validation result</h3>
    <pre>
$result = app()->input->validate()->getResult();
    </pre>
</div>

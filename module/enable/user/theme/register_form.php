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
        <button>Register</button>

        <!-- add captcha -->
        <?=app()->createCaptcha()?>
    </form>
</div>
<div id="<?=$_id?>" class="well">
    <h2>Log in</h2>
    <form action="<?=$loginUrl?>" method="post">
        <label>Email</label>
        <input type="text" name="email" placeholder="Email" 
               value="<?=empty($email) ? '' : $email?>">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" 
               value="123456">
        <input type="hidden" name="login" value="1" />
        
        <!-- add captcha -->
        <?=app()->createCaptcha()?>
        
        <label></label>
        <button type="submit" class="btn">Sign in</button>
    </form>
</div>

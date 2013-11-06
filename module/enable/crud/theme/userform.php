<form>
    <label>Email</label>
    <input type="text" name="email" class="span4" 
           placeholder="Enter an email address" 
           value="<?=empty($user->email) ? '' : $user->email?>" />
    <label>Password</label>
    <input type="text" name="password" class="span4" 
           placeholder="Enter a password" value="" />
    <label></label>
    <input type="hidden" name="id" 
           value="<?=empty($user->id) ? '' : $user->id?>" />
    <button type="submit" class="btn btn-success">Save</button>
    <?php if (!empty($user->id)) { ?>
        <button id="delete" data-ui="user/<?=$user->id?>" class="btn btn-danger">Delete</button>
    <?php } ?>
    <button id="new" class="btn btn-primary">New</button>
</form>
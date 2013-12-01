<div id="<?=$_id?>" class="well">
    <h1>HTTP Request Demo</h1>
    <p>
        <span>GET result: </span><span><?=$get_result?></span><br />
        <a href="<?=$http_get_url?>">Confirm GET request</a>
    </p>
    <p>
        <span>POST result: </span><span><?=$post_result?></span>
    </p>
    <form action="<?=$http_post_url?>" method="post">
        <input type="text" name="param" value="post" /><br />
        <button class="btn" type="submit">Confirm POST request</button>
    </form>
    <div class="clearfix"></div>
</div>
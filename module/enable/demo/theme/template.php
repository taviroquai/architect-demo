<div class="well">
    <h1>Demos Index</h1>
    <ul>
        <?php foreach ($links as $item) { ?>
        <li><a href="<?=$item['href']?>"><?=$item['title']?></a></li>
        <?}?>
    </ul>
</div>
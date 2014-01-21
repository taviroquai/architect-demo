<div id="<?=$_id?>" class="well">
    <h1>Demos Index</h1>
    <ul>
        <?php foreach ($links as $item) { ?>
        <li><a href="<?=$item['href']?>">
                <div class="span4 pull-left">
                    <i class="icon-star"></i> <?=$item['title']?>
                </div>
            </a>
        </li>
        <?}?>
    </ul>
    <div class="clearfix"></div>
</div>
<script type="text/javascript">
    jQuery(function($) {
        $('#demos-list li div').on('mouseenter', function() {
            $(this).addClass('animated flash');
        });
        $('#demos-list li div').on('mouseleave', function() {
            $(this).removeClass('animated flash');
        });
    });
</script>
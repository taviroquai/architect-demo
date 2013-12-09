<?php 
$items = app()->flushMessages();
if (!empty($items)) { ?>
    <?php foreach ($items as $item) { ?>
    <div class="<?=$item->cssClass?>"><?=$item->text?></div>
    <?php }?>
    <script type="text/javascript">
        jQuery(function($) {
            $('.alert').addClass('animated shake');
        });
    </script>
<?php } ?>

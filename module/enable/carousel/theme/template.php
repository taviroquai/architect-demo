<div class="well">
    <h1>Carousel Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <em>Note: add your style sheet</em>
        <h4>PHP</h4>
        <pre>
$carousel = app()->createCarousel()
    ->addItem('&lt;img src="#" /&gt;', 1);
    ->addItem('&lt;img src="#"  /&gt;', 0);
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/carousel.php</pre>
    </div>
</div>
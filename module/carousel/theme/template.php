<div class="well">
    <h1>Carousel Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <em>Note: add your style sheet</em>
        <h4>PHP</h4>
        <pre>
$carousel = view()->createCarousel()
    ->addItem('&lt;img src="#" /&gt;', 1);
    ->addItem('&lt;img src="#"  /&gt;', 0);
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/carousel.php</pre>
    </div>
</div>
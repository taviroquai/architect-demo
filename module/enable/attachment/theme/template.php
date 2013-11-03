<div class="well">
    <h1>Attachment Demo</h1>
    <a href="<?=$url?>">Download Attachment</a>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
if (g('dl')) {
    app()->download(THEME_PATH.'/default/img/'.g('dl'));
}
        </pre>
    </div>
</div>
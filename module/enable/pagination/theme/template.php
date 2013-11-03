<div class="well">
    <h1>Pagination Demo</h1>
    <div><?=$pagination?></div>
    <ul>
        <li>Total pages: <?=$pagination->total?></li>
        <li>Limit of items per page: <?=$pagination->limit?></li>
        <li>Offset (start item index): <?=$pagination->getOffset()?></li>
    </ul>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$pagination = app()->createPagination();
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/pagination.php</pre>
    </div>
</div>
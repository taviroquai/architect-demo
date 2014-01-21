<div class="well">
    <h1>Poll Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <em>Powered by Morris and Raphael</em>
        <h4>PHP</h4>
        <pre>
$poll = view()->createPoll();
$poll->setVotes("Candidate 1", 123);
$poll->setVotes("Candidate 2", 245);
$poll->setVotes("Candidate 3", 23);
$poll->setVotes("Candidate 4", 762);
$poll->setVotes("Candidate 5", 551);
$poll->set('labels', array('Votes'));
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/pollchart.php</pre>
    </div>
</div>
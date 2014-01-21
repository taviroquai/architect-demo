<?php

r('/demo/poll', function() {
    
    $poll = view()->createPoll();
    $poll->setVotes("Candidate 1", 123);
    $poll->setVotes("Candidate 2", 245);
    $poll->setVotes("Candidate 3", 23);
    $poll->setVotes("Candidate 4", 762);
    $poll->setVotes("Candidate 5", 551);
    $poll->set('labels', array('Votes'));
    if (i($poll->get('input_name'))) $poll->set('show_votes', true);

    $layout = l(__DIR__.'/theme/template.php')->addContent($poll);
    c($layout);
});

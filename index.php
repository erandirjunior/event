<?php

require 'vendor/autoload.php';

use SRC\Talk;
use SRC\Event;
use SRC\Trail;

$addNewTalk = 'y';
$command = new \SRC\Command();
$event = new Event(180, 240, '09:00');

while (strtolower($addNewTalk) === 'y') {
    $title      = $command->doQuestion('Talk name: ');
    $duration   = $command->doQuestion('Talk duration (min): ');

    if ($duration < 5 || !$title) {
        continue;
    }

    $event->addTalk($title, $duration);

    $addNewTalk = $command->doQuestion('Would you like add other talk? (y/n) ');
}

$eventMounted = $event->mountEvent();

foreach ($eventMounted as $track => $talks) {
    echo "{$track}:\n";

    foreach ($talks as $talk) {
        $showMinutes = $talk['talkDuration'] !== 0 ? "{$talk['talkDuration']}min" : '';

        echo "{$talk['talkInitialHour']} {$talk['talkName']} {$showMinutes}\n";
    }
}
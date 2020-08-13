<?php

require 'vendor/autoload.php';

use SRC\Talk;
use SRC\Event;
use SRC\Trail;

$data = [
    [
        'Overdoing it in Python',
        45
    ],
    [
        'Ruby on Rails: Why We Should Move On',
        60
    ],
    [
        'Ruby Errors from Mismatched Gem Versions',
        45
    ],
    [
        'Woah',
        30
    ],
    [
        'Communicating Over Distance',
        60
    ],
    [
        'Writing Fast Tests Against Enterprise Rails',
        60
    ],
    [
        'Rails for Python Developers lightning',
        60
    ],
    [
        'Accounting-Driven Development',
        45
    ],
    [
        'Pair Programming vs Noise',
        45
    ],
    [
        'Clojure Ate Scala (on my project)',
        45
    ],
    [
        'Lua for the Masses',
        30
    ],
    [
        'Common Ruby Errors',
        45
    ],
    [
        'Sit Down and Write',
        30
    ],
    [
        'Programming in the Boondocks of Seattle',
        30
    ],
    [
        'Ruby vs. Clojure for Back-End Development',
        30
    ],
    [
        'Ruby on Rails Legacy App Maintenance',
        60
    ],
    [
        'A World Without HackerNews',
        60
    ],
    [
        'Rails Magic',
        60
    ],
    [
        'User Interface CSS in Rails Apps',
        30
    ]
];

$addNewTalk = 'y';
$command = new \SRC\Command();
$event = new Event(180, 240, '09:00');

foreach ($data as $value) {
    $event->addTalk($value[0], $value[1]);
}

$eventMounted = $event->mountEvent();

foreach ($eventMounted as $track => $talks) {
    echo "{$track}:\n";

    foreach ($talks as $talk) {
        $showMinutes = $talk['talkDuration'] !== 0 ? "{$talk['talkDuration']}min" : '';

        echo "{$talk['talkInitialHour']} {$talk['talkName']} {$showMinutes}\n";
    }
}
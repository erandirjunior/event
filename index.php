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
        'Ruby Errors from Mismatched Gem Versions',
        45
    ],
    [
        'Common Ruby Errors',
        45
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
        'Rails Magic',
        60
    ],
    [
        'Ruby on Rails: Why We Should Move On',
        60
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
        'Woah',
        30
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
        'User Interface CSS in Rails Apps',
        30
    ]
];

$continue = 'y';
$command = new \SRC\Command();
$event = new Event(180, 240, '09:00');

/*while (strtolower($continue) === 'y') {
    $title      = $command->doQuestion('Talk name: ');
    $duration   = $command->doQuestion('Talk duration (min): ');

    $event->addTalk($title, $duration);

    $continue = $command->doQuestion('Would you like add other talk? (y/n) ');
}*/



foreach ($data as $value) {
    $event->addTalk($value[0], $value[1]);
}

$event->mountEvent();

/*$trail = new Trail(180, 240, 9);

$lunch = new Talk('Lunch', 60);
$netWork = new Talk('Network Event', 60);

$trail->mountTrail($event, $lunch, $netWork);*/
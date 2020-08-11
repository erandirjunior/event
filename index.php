<?php

require 'vendor/autoload.php';
//date_default_timezone_set('America/Fortaleza');



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

$event = new Event();

foreach ($data as $value) {
    $talk = new Talk($value[0], $value[1]);

    $event->add($talk);
}

$trail = new Trail(180, 240, 9);

$lunch = new Talk('Lunch', 60);
$netWork = new Talk('Network Event', 60);

$trail->mountTrail($event, $lunch, $netWork);
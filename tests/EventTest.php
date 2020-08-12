<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use SRC\Event;

class EventTest extends TestCase
{
    private $trail;

    private $event;

    public function setUp()
    {
        $this->event = new Event(180, 240, '09:00');
        $this->trail = [
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

        foreach ($this->trail as $value) {
            $this->event->addTalk($value[0], $value[1]);
        }
    }

    public function testTrail()
    {
        $trackOne = [
            [
                'talkName' => 'Overdoing it in Python',
                'talkDuration' => 45,
                'talkInitialHour' => '09:00 AM'
            ],
            [
                'talkName' => 'Ruby on Rails: Why We Should Move On',
                'talkDuration' => 60,
                'talkInitialHour' => '09:45 AM'
            ],
            [
                'talkName' => 'Ruby Errors from Mismatched Gem Versions',
                'talkDuration' => 45,
                'talkInitialHour' =>  '10:45 AM'
            ],
            [
                'talkName' => 'Woah',
                'talkDuration' => 30,
                'talkInitialHour' => '11:30 AM'
            ],
            [
                'talkName' => 'Lunch',
                'talkDuration' => 60,
                'talkInitialHour' => '12:00 PM'
            ],
            [
                'talkName' => 'Communicating Over Distance',
                'talkDuration' => 60,
                'talkInitialHour' => '01:00 PM'
            ],
            [
                'talkName' => 'Writing Fast Tests Against Enterprise Rails',
                'talkDuration' => 60,
                'talkInitialHour' => '02:00 PM'
            ],
            [
                'talkName' => 'Pair Programming vs Noise',
                'talkDuration' => 45,
                'talkInitialHour' => '03:00 PM'
            ],
            [
                'talkName' => 'Clojure Ate Scala (on my project)',
                'talkDuration' => 45,
                'talkInitialHour' => '03:45 PM'
            ],
            [
                'talkName' => 'Lua for the Masses',
                'talkDuration' => 30,
                'talkInitialHour' => '04:30 PM'
            ],
            [
                'talkName' => 'Networking Event',
                'talkDuration' => 0,
                'talkInitialHour' => '05:00 PM'
            ],
        ];
        $trackTwo = [
            [
                'talkName' => 'Common Ruby Errors',
                'talkDuration' => 45,
                'talkInitialHour' => '09:00 AM'
            ],
            [
                'talkName' => 'Sit Down and Write',
                'talkDuration' => 30,
                'talkInitialHour' => '09:45 AM'
            ],
            [
                'talkName' => 'Ruby on Rails Legacy App Maintenance',
                'talkDuration' => 60,
                'talkInitialHour' => '10:15 AM'
            ],
            [
                'talkName' => 'Accounting-Driven Development',
                'talkDuration' => 45,
                'talkInitialHour' => '11:15 AM'
            ],
            [
                'talkName' => 'Lunch',
                'talkDuration' => 60,
                'talkInitialHour' => '12:00 PM'
            ],
            [
                'talkName' => 'A World Without HackerNews',
                'talkDuration' => 60,
                'talkInitialHour' => '01:00 PM'
            ],
            [
                'talkName' => 'Rails Magic',
                'talkDuration' => 60,
                'talkInitialHour' => '02:00 PM'
            ],
            [
                'talkName' => 'Rails for Python Developers lightning',
                'talkDuration' => 60,
                'talkInitialHour' => '03:00 PM'
            ],
            [
                'talkName' => 'User Interface CSS in Rails Apps',
                'talkDuration' => 30,
                'talkInitialHour' => '04:00 PM'
            ],
            [
                'talkName' => 'Ruby vs. Clojure for Back-End Development',
                'talkDuration' => 30,
                'talkInitialHour' => '04:30 PM'
            ],
            [
                'talkName' => 'Networking Event',
                'talkDuration' => 0,
                'talkInitialHour' => '05:00 PM'
            ],
        ];

        $event = $this->event->mountEvent();

        $this->assertEquals($trackOne, $event['Track 1']);
        $this->assertEquals($trackTwo, $event['Track 2']);
    }
}
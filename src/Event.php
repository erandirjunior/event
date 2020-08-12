<?php

namespace SRC;

class Event
{
    private $firstPeriodTime;

    private $secondPeriodTime;

    private Trail $trail;

    private $inicialHourEvent;

    public function __construct(int $firstDurationTrail, int $secondDurationTrail, string $inicialHourEvent)
    {
        $this->firstPeriodTime 	= $firstDurationTrail;
        $this->secondPeriodTime = $secondDurationTrail;
        $this->inicialHourEvent = $inicialHourEvent;
        $this->trail            = new Trail();
    }

    public function addTalk(string $name, int $duration): void
    {
        $this->trail->add($this->createTalk($name, $duration));
    }

    private function createTalk(string $name, int $duration): Talk
    {
        return new Talk($name, $duration);
    }

    public function mountEvent()
    {
        try {
            $firstTrail     = $this->trail->getTrailMounted($this->firstPeriodTime);
            $lunchTalk      = [$this->createTalk('Lunch', 60)];
            $secondTrail    = $this->trail->getTrailMounted($this->secondPeriodTime);
            $networkTalk    = [$this->createTalk('Network Event', 60)];

            $this->showTalkEvent(array_merge($firstTrail, $lunchTalk, $secondTrail, $networkTalk));
        } catch (\Exception $e) {
            echo "The event couldn't be mounted";
        }
    }

    private function showTalkEvent(array $event)
    {
        $hour = date("h:i A", strtotime("{$this->inicialHourEvent} UTC"));

        foreach ($event as $talk) {
            $currentHour = $hour;
            echo "{$currentHour} {$talk->getName()} {$talk->getDuration()}min <br>";
            $hour = date("h:i A", $this->addTime($talk->getDuration(), $hour));
        }
    }

    private function addTime($minutes, $hour)
    {
        return strtotime("+{$minutes} minutes",strtotime($hour));
    }
}

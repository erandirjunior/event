<?php

namespace SRC;

class Event
{
    private $durationMorning;

    private $durationAfternoon;

    private Trail $trail;

    private $inicialHourEvent;

    private $event;

    public function __construct(int $durationMorning, int $durationAfternoon, string $inicialHourEvent)
    {
        $this->durationMorning 	    = $durationMorning;
        $this->durationAfternoon    = $durationAfternoon;
        $this->inicialHourEvent     = $inicialHourEvent;
        $this->trail                = new Trail();
        $this->event                = [];
    }

    public function addTalk(string $name, int $duration): void
    {
        $this->trail->add($this->createTalk($name, $duration));
    }

    private function createTalk(string $name, int $duration): Talk
    {
        return new Talk($name, $duration);
    }

    public function mountEvent(): array
    {
        try {
            $lunchTalk      = [$this->createTalk('Lunch', 60)];
            $networkTalk    = [$this->createTalk('Networking Event', 0)];

            $this->createTrail('Track 1', $lunchTalk, $networkTalk);
            $this->createTrail('Track 2', $lunchTalk, $networkTalk);

            return $this->event;
        } catch (\Exception $e) {
            echo "The event couldn't be mounted";
        }
    }

    private function createTrail($track, $lunchTime, $networkTime)
    {
        $firstTrail     = $this->trail->getTrailMounted($this->durationMorning);
        $secondTrail    = $this->trail->getTrailMounted($this->durationAfternoon);

        $this->mountTrailTalkEvent($track, array_merge($firstTrail, $lunchTime, $secondTrail, $networkTime));
    }

    private function mountTrailTalkEvent($track, array $event)
    {
        $hour = date("h:iA", strtotime("{$this->inicialHourEvent} UTC"));

        foreach ($event as $talk) {
            $this->event[$track][] = [
                'talkName' => $talk->getName(),
                'talkDuration' => $talk->getDuration(),
                'talkInitialHour' => $hour,
            ];

            $hour = date("h:iA", $this->addTime($talk->getDuration(), $hour));
        }
    }

    private function addTime($minutes, $hour)
    {
        return strtotime("+{$minutes} minutes",strtotime($hour));
    }
}

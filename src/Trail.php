<?php

namespace SRC;

/**
 * 
 */
class Trail
{
	private $firstPeriodTime;

	private $secondPeriodTime;

	private $trail;

	private $inicialTime;

	public function __construct(int $firstPeriodTime, int $secondPeriodTime, $inicialTime)
	{
		$this->firstPeriodTime 	= $firstPeriodTime;
		$this->secondPeriodTime = $secondPeriodTime;
		$this->inicialTime      = $inicialTime;
	}

	public function mountTrail(Event $event, Talk $lunch, Talk $network)
	{
	    echo "<pre>";
	    $firstPeriod    = $event->mountEvent($this->firstPeriodTime);
        $lunchPeriod    = [$lunch];
        $secondPeriod   = $event->mountEvent($this->secondPeriodTime);
        $networkPeriod  = [$network];

        $this->generateTrail(array_merge($firstPeriod, $lunchPeriod, $secondPeriod, $networkPeriod));
    }

    private function generateTrail(array $event)
    {
        $time = date("h:i A", strtotime("09:00:00 UTC"));
        foreach ($event as $talk) {
            $currentime = $time;
            echo "{$currentime} {$talk->getName()} {$talk->getTime()}min <br>";
            $minutesTotime = strtotime("+{$talk->getTime()} minutes",strtotime($time));
            $time = date("h:i A", $minutesTotime);
        }
	}
}
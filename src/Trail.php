<?php

namespace SRC;

class Trail
{
    private $talks;

    private $period;

    private $time;

    private $trail;

    private $numberOfElementsToRemove;

    public function __construct()
    {
        $this->talks    = [];
        $this->period   = 0;
        $this->time     = 0;
        $this->trail    = 0;
        $this->numberOfElementsToRemove = 1;
    }

    public function add(Talk $talk)
    {
        $this->talks[] = $talk;
    }

    public function getTrailMounted(int $timeDurationTrail): array
    {
        $this->resetTrail($timeDurationTrail);
        $this->mountTrail();
        return $this->trail;
    }

    private function resetTrail($timeDurationTrail)
    {
        $this->trail                    = [];
        $this->time                     = 0;
        $this->period                   = $timeDurationTrail;
        $this->numberOfElementsToRemove = 1;
    }

    private function mountTrail()
    {
        while ($this->time < $this->period) {
            foreach ($this->talks as $key => $talk) {
                if ($this->time === $this->period) {
                    break;
                }

                if ($this->checkIfCanAddTimeDuration($talk->getDuration())) {
                    $this->addTalkInTrailAndIncrementTime($talk);

                    $this->removeElementByIndex($key);
                }
            }

            $this->reorderTasksListIfTimeIsSmallerThanPeriod();
        }
    }

    private function checkIfCanAddTimeDuration($currentTime)
    {
        return ($this->time + $currentTime) < $this->period;
    }

    private function removeElementByIndex($index)
    {
        $data = [];

        foreach ($this->talks as $key => $talk) {
            if ($key !== $index) {
                $data[] = $talk;
            }
        }

        $this->talks = $data;
    }

    /**
     * Reorder $this->talks and remove elements of $this->trail based on
     * value $this->numberOfElementsToRemove.
     *
     * @see incrementNumberOfElementsToRemoveIfIsPossible()
     * @see getLastValueTaskTrailAndAddInTalksList()
     */
    private function reorderTasksListIfTimeIsSmallerThanPeriod()
    {
        if ($this->time !== $this->period) {
            for ($i = 0; $i < $this->numberOfElementsToRemove; $i++) {
                if (!$this->trail) {
                    $this->time = 0;
                    break;
                }

                $this->incrementNumberOfElementsToRemoveIfIsPossible();

                $this->getLastValueTaskTrailAndAddInTalksList();
            }
        }
    }

    /**
     * Check if $this->numberOfElementsToRemove is smaller than number of elements in $this->trail
     * If was smaller, then increment attributte $this->numberOfElementsToRemove.
     */
    private function incrementNumberOfElementsToRemoveIfIsPossible()
    {
        if ($this->numberOfElementsToRemove < count($this->trail)) {
            $this->numberOfElementsToRemove++;
        }
    }

    /**
     * Remove last value in $this->trail, then add this value in the last $this->talks.
     * Then subtract $this->time by value time removed from $this->trail.
     */
    private function getLastValueTaskTrailAndAddInTalksList()
    {
        $valor          = array_pop($this->trail);
        $this->talks[]  = $valor;
        $this->time     -= $valor->getDuration();
    }

    private function addTalkInTrailAndIncrementTime(Talk $talk)
    {
        $this->time += $talk->getDuration();
        $this->trail[] = $talk;
    }
}
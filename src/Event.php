<?php

namespace SRC;

class Event
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

    public function mountEvent($period): array
    {
        $this->trail                    = [];
        $this->period                   = 240;
        $this->time                     = 0;
        $this->period                   = $period;
        $this->numberOfElementsToRemove = 1;
        $this->proccess();

        return $this->trail;
    }

    private function proccess()
    {
        while ($this->time < $this->period) {
            foreach ($this->talks as $key => $value) {
                if ($this->time === $this->period) {
                    break;
                }

                if (($this->time + $value->getTime()) > $this->period) {
                    continue;
                }

                $this->time     += $value->getTime();
                $this->trail[]  = $value;

                $this->removeElementByIndex($key);
            }

            $this->reorderTasksListIfTimeIsSmallerPeriod();
        }
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
    private function reorderTasksListIfTimeIsSmallerPeriod()
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
        $this->time     -= $valor->getTime();
    }
}

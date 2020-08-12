<?php

namespace SRC;

class Talk
{
    private string $name;

    private int $duration;

    /**
     * Talk constructor.
     * @param string $name
     * @param int $duration
     */
    public function __construct(string $name, int $duration)
    {
        $this->setName($name);
        $this->duration = $duration;
    }

    private function setName(string $name)
    {
        preg_match('/(\d+)/m', $name, $match);

        if ($match) {
            throw new \Exception("The title of the talk cannot contain numbers!");
        }

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int|int
     */
    public function getDuration()
    {
        return $this->duration;
    }
}
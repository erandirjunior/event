<?php

namespace SRC;

class Talk
{
    private string $name;

    private int $duration;

    /**
     * Talk constructor.
     * @param string $name
     * @param int $time
     */
    public function __construct(string $name, int $duration)
    {
        $this->name     = $name;
        $this->duration = $duration;
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
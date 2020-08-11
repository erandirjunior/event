<?php

namespace SRC;

class Talk
{
    private string $name;

    private int $time;

    /**
     * Talk constructor.
     * @param string $name
     * @param int $time
     */
    public function __construct(string $name, int $time)
    {
        $this->name = $name;
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }
}
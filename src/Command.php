<?php

namespace SRC;

class Command
{
    public function doQuestion(string $question)
    {
        return readline($question);
    }
}
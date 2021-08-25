<?php

namespace App\Traits;

trait FormattedString
{
    public function format(array $arguments) :string
    {
        return implode(PHP_EOL, $arguments);
    }
}

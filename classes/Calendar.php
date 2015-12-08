<?php

namespace Caldera\Adventskalender;

class Calendar {
    protected $days;

    public function __construct()
    {
    }

    public function addDay(Day $day)
    {
        $dayNumber = $day->getDate()->format('d');

        $this->days[$dayNumber] = $day;
    }

    public function shuffleDays()
    {
        shuffle($this->days);
    }

    public function getDays()
    {
        return $this->days;
    }
}
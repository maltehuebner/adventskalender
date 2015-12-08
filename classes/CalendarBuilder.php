<?php

namespace Caldera\Adventskalender;

class CalendarBuilder
{
    protected $calendar;
    protected $xmlConfig;

    public function __construct()
    {
        $this->calendar = new Calendar();
    }

    public function loadXmlConfig($xmlFilePath)
    {
        $this->xmlConfig = simplexml_load_file($xmlFilePath);
    }
    public function build()
    {
        foreach ($this->xmlConfig->days->day as $configDay) {
            $day = new Day();

            $day->setDate(new \DateTime($configDay->date));
            $day->setTitle($configDay->title);
            $day->setDescription($configDay->description);
            $day->setLink($configDay->link);

            $this->calendar->addDay($day);
        }
    }

    public function getCalendar()
    {
        return $this->calendar;
    }
}
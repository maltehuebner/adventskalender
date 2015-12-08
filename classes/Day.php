<?php

namespace Caldera\Adventskalender;

class Day
{
    protected $dateTime;
    protected $title;
    protected $description;
    protected $link;

    public function __construct()
    {
    }

    public function isPast()
    {
        $today = new \DateTime();

        if ($this->dateTime < $today) {
            return true;
        }

        return false;
    }

    public function isToday()
    {
        $today = new \DateTime();

        if ($this->dateTime->format('Y-m-d') == $today->format('Y-m-d')) {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDate($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
}
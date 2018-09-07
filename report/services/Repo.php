<?php
namespace kam2r\report\report\services;

use shop\entities\Event;

class Repo
{
    protected $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    public function getReport()
    {
        $res = \shop\services\Soap::getReport(['sitting_id ' => $this->event->id]);
        return $res;
    }


}
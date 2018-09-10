<?php

namespace kam2r\report\report\services;


use shop\entities\Event;

class Eventsrepo
{
    protected $allowedEvents;

    public function __construct($allowedEvents = false)
    {
        $this->allowedEvents = $allowedEvents;
    }

    public function getEventsQuery()
    {
        if($events = $this->getAllowedEventsForMe())
            return Event::find()->where(['id' => $events])->orderBy(['id'=>SORT_DESC]);
        return Event::find()->orderBy(['id'=>SORT_DESC]);
    }

    private function getAllowedEventsForMe(){
        if(!$this->allowedEvents)
            return false;

        $user_id = \Yii::$app->user->id;
        foreach ($this->allowedEvents as $key => $allowedEvent){
            if($user_id == $key)
                return $allowedEvent;
        }
        return false;
    }

    public function isAllowedEvent($id)
    {
        if($events = $this->getAllowedEventsForMe()){
            foreach ($events as $event_id){
                if($event_id == $id)
                    return true;
            }
            return false;
        }
        return true;
    }


}
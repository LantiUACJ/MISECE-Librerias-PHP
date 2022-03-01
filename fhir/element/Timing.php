<?php

namespace Modulo\Element;

class Timing extends Element{

    public function  __construct(){
        $this->repeat = [];
        $this->event = [];
    }

    public function setEvent($event){
        $this->event = $event;
    }
    public function setBoundsDuration(Duration $boundsDuration){
        $this->repeat["boundsDuration"] =  $boundsDuration;
    }
    public function setBoundsRange(Range $boundsRange){
        $this->repeat["boundsRange"] = $boundsRange;
    }
    public function setBoundsPeriod(Period $boundsPeriod){
        $this->repeat["boundsPeriod"] = $boundsPeriod;
    }
    public function setCount($count){
        $this->repeat["count"] = $count;
    }
    public function setCountMax($countMax){
        $this->repeat["countMax"] = $countMax;
    }
    public function setDuration($duration){
        $this->repeat["duration"] = $duration;
    }
    public function setDurationMax($durationMax){
        $this->repeat["durationMax"] = $durationMax;
    }
    public function setDurationUnit($durationUnit){
        $codes = "s | min | h | d | wk | mo | a";
        $this->repeat["durationUnit"] = $durationUnit;
    }
    public function setFrequency($frequency){
        $this->repeat["frequency"] = $frequency;
    }
    public function setFrequencyMax($frequencyMax){
        $this->repeat["frequencyMax"] = $frequencyMax;
    }
    public function setPeriod($period){
        $this->repeat["period"] = $period;
    }
    public function setPeriodMax($periodMax){
        $this->repeat["periodMax"] = $periodMax;
    }
    public function setPeriodUnit($periodUnit){
        $codes = "s | min | h | d | wk | mo | a";
        $this->repeat["periodUnit"] = $periodUnit;
    }
    public function addDayOfWeek($dayOfWeek){
        $codes = 'mon | tue | wed | thu | fri | sat | sun';
        $this->repeat["dayOfWeek"][] = $dayOfWeek;
    }
    public function addTimeOfDay($timeOfDay){
        $this->repeat["timeOfDay"][] = $timeOfDay;
    }
    public function addWhen($when){
        $this->repeat["when"][] = $when;
    }
    public function setOffset($offset){
        $this->repeat["offset"] = $offset;
    }
    public function setCode(CodeableConcept $code){
        $this->code = $code;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->event as $event){
            $arrayData["event"] = $event;
        }
        if($this->boundsDuration){
            $arrayData["repeat"]["boundsDuration"] =  $this->boundsDuration;
        }
        if($this->boundsRange){
            $arrayData["repeat"]["boundsRange"] = $this->boundsRange;
        }
        if($this->boundsPeriod){
            $arrayData["repeat"]["boundsPeriod"] = $this->boundsPeriod;
        }
        if($this->count){
            $arrayData["repeat"]["count"] = $this->count;
        }
        if($this->countMax){
            $arrayData["repeat"]["countMax"] = $this->countMax;
        }
        if($this->duration){
            $arrayData["repeat"]["duration"] = $this->duration;
        }
        if($this->durationMax){
            $arrayData["repeat"]["durationMax"] = $this->durationMax;
        }
        if($this->durationUnit){
            $arrayData["repeat"]["durationUnit"] = $this->durationUnit;
        }
        if($this->frequency){
            $arrayData["repeat"]["frequency"] = $this->frequency;
        }
        if($this->frequencyMax){
            $arrayData["repeat"]["frequencyMax"] = $this->frequencyMax;
        }
        if($this->period){
            $arrayData["repeat"]["period"] = $this->period;
        }
        if($this->periodMax){
            $arrayData["repeat"]["periodMax"] = $this->periodMax;
        }
        if($this->periodUnit){
            $arrayData["repeat"]["periodUnit"] = $this->periodUnit;
        }
        foreach($this->dayOfWeek as $dayOfWeek){
            $arrayData["repeat"]["dayOfWeek"][] = $dayOfWeek;
        }
        foreach($this->timeOfDay as $timeOfDay){
            $arrayData["repeat"]["timeOfDay"][] = $timeOfDay;
        }
        foreach($this->when as $when){
            $arrayData["repeat"]["when"][] = $this->when;
        }
        if($this->offset){
            $arrayData["repeat"]["offset"] = $this->offset;
        }
        if($this->code){
            $arrayData["code"] = $code;
        }

        return $arrayData;
    }
    
}
    
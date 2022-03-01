<?php

namespace Modulo\Element;

class Period extends Element{

    public function __construct($start, $end){
        parent::__construct();
        $this->setStart($start);
        $this->setEnd($end);
    }

    public function setStart($start){
        $this->start = $start;
    }
    public function setEnd($end){
        $this->end = $end;
    }

    public function toArray(){
        $arrayData = parent::toArray();
        $arrayData["start"] = $this->start; 
        $arrayData["end"] = $this->end; 
        
        return $arrayData;
    }

}

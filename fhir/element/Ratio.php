<?php

namespace Modulo\Element;

class Ratio extends Element{

    public function __construct(){
        parent::__construct();
    }

    public function setNumerator(Quantity $numerator){
        $this->numerator = $numerator;
    }
    public function setDenominator(Quantity $denominator){
        $this->denominator = $denominator;
    }

    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->low)){
            $arrayData["low"] = $this->low;
        }
        if(isset($this->high)){
            $arrayData["high"] = $this->high;
        }
        return $arrayData;
    }
}
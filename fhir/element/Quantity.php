<?php

namespace Modulo\Element;

class Quantity extends Element{

    public function __construct($value, $unit){
        parent::__construct();
        $this->setValue($value);
        $this->setUnit($unit);
    }

    public function setValue($value){
        $this->value = $value;
    }
    public function setComparator($comparator){
        $this->comparator = $comparator;
    }
    public function setUnit($unit){
        $this->unit = $unit;
    }
    public function setSystem($system){
        $this->system = $system;
    }
    public function setCode($code){
        $this->code = $code;
    }

    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->value)){
            $arrayData["value"] = $this->value;
        }
        if(isset($this->comparator)){
            $arrayData["comparator"] = $this->comparator;
        }
        if(isset($this->unit)){
            $arrayData["unit"] = $this->unit;
        }
        if(isset($this->system)){
            $arrayData["system"] = $this->system;
        }
        if(isset($this->code)){
            $arrayData["code"] = $this->code;
        }
        return $arrayData;
    }
}

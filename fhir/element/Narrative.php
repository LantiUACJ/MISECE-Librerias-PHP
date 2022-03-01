<?php

namespace Modulo\Element;

class Narrative extends Element{
    public function __construct(){
        parent::__construct();
    }
    public function setstatus($status){
        $data = ["generated","extensions","additional","empty"];
        $this->status = $status;
    }
    public function setdiv($div){
        $this->div = $div;
    }
    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        if(isset($this->div)){
            $arrayData["div"] = $this->div;
        }
        return $arrayData;
    }
}
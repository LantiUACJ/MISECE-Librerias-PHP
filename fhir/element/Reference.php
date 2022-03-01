<?php

namespace Modulo\Element;

class Reference extends Element{

    public function __construct($resourceType, $id, $display = null){
        parent::__construct();
        $this->setType($resourceType);
        $this->setDisplay($display);
        $this->setReference($resourceType . "/" . $id);
    }

    public function setReference($reference){
        $this->reference = $reference;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setIdentifier(Identifier $identifier){
        $this->identifier = $identifier;
    }
    public function setDisplay($display){
        $this->display = $display;
    }

    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->reference)){
            $arrayData["reference"] = $this->reference;
        }
        if(isset($this->type)){
            $arrayData["type"] = $this->type;
        }
        if(isset($this->identifier)){
            $arrayData["identifier"] = $this->identifier->toArray();
        }
        if(isset($this->display)){
            $arrayData["display"] = $this->display;
        }
        return $arrayData;
    }
}
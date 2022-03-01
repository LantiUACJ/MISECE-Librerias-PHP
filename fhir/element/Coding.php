<?php
namespace Modulo\Element;
class Coding extends Element{

    public function __construct($display, $code){
        parent::__construct();
        $this->setDisplay($display);
        $this->setCode($code);
    }
    function setDisplay($display){
        $this->display = $display;
    }
    function setSystem($system){
        $this->system = $system;
    }
    function setVersion($version){
        $this->version = $version;
    }
    function setCode($code){
        $this->code = $code;
    }
    function setUserSelected(bool $userSelected){
        $this->userSelected = $userSelected;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        $arrayData["display"] = $this->display;
        $arrayData["code"] = $this->code;

        if(isset($this->system)) $arrayData["system"] = $this->system;
        if(isset($this->version)) $arrayData["version"] = $this->version;
        if(isset($this->userSelected)) $arrayData["userSelected"] = $this->userSelected;
        
        return $arrayData;
    }
}

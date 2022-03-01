<?php 
namespace Modulo\Element;
class HumanName extends Element{

    public function __construct() {
        parent::__construct();
    }

    public function setText($text){
        $this->text = $text;
    }
    public function setUse($use){
        $data = ["usual","official","temp","nickname","anonymous","old","maiden"];
        $this->use = $use;
    }
    public function setPeriod(Period $period){
        $this->period = $period;
    }
    public function setPrefix($prefix){
        $this->prefix [] = $prefix;
    }
    public function setGiven($given){
        $this->given[] = $given;
    }
    public function setFamily($family){
        $this->family = $family;
    }
    public function setSuffix($suffix){
        $this->suffix[] = $suffix;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        if(isset($this->text)){
            $arrayData["text"] = $this->text;
        }
        if(isset($this->use)){
            $arrayData["use"] = $this->use;
        }
        if(isset($this->period)){
            $arrayData["period"] = $this->period;
        }
        if(isset($this->prefix)){
            $arrayData["prefix"] = $this->prefix;
        }
        if(isset($this->given)){
            $arrayData["given"] = $this->given;
        }
        if(isset($this->family)){
            $arrayData["family"] = $this->family;
        }
        if(isset($this->suffix)){
            $arrayData["suffix"] = $this->suffix;
        }
        return $arrayData;
    }
}

<?php

namespace Modulo\Element;

use Modulo\Resource\Resource;

class Annotation extends Element{
    public function __construct(){
        parent::__construct();
    }

    public function setAuthorReference(Resource $authorReference){
        $this->authorReference = $authorReference->toReference();
    }
    public function setAuthorString($authorString){
        $this->authorString = $authorString;
    }
    public function setTime($time){
        $this->time = $time;
    }
    public function setText($text){
        $this->text = $text;
    }

    public function toArray(){
        $arrayData = parent::toArray();
        if(isset($this->authorReference))
            $arrayData["authorReference"] = $this->authorReference->toArray();
        if(isset($this->authorString))
            $arrayData["authorString"] = $this->authorString;
        if(isset($this->time))
            $arrayData["time"] = $this->time;
        if(isset($this->text))
            $arrayData["text"] = $this->text;
        return $arrayData;
    }
}

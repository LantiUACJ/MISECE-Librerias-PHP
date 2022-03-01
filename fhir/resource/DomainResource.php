<?php

namespace Modulo\Resource;

use Modulo\Element\Extension;

class DomainResource extends Resource{
    public function __construct(){
        parent::__construct();
        $this->extension = [];
        $this->contained = [];
    }

    public function setText($text){
        $this->text = $text;
    }
    public function addContained(Resource $contained){
        $this->contained[] = $contained;
    }
    public function setModifierExtension(Extension $modifierExtension){
        $this->modifierExtension = $modifierExtension;
    }
    public function addExtension(Extension $extension){
        $this->extension[] = $extension;
    }
    public function toArray(){
        $dataArray=parent::toArray();
        if(isset($this->text))
            $dataArray["text"] = $this->text;
        foreach($this->extension as $extension)
            $dataArray["extension"][] = $extension->toArray();
        foreach($this->contained as $contained)
            $dataArray["contained"][] = $contained->toArray();
        $dataArray["resourceType"] = $this->resourceType;
        return $dataArray;
    }
}

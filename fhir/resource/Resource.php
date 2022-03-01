<?php 

namespace Modulo\Resource;

use Modulo\Element\Reference;

class Resource{
    public function __construct(){
        $this->setId(hash("MD5", microtime(true)));
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setMeta(Meta $meta){
        $this->meta = $meta;
    }
    public function setImplicitRules($implicitRules){
        $this->implicitRules = $implicitRules;
    }
    public function setLanguage($language){
        $this->language = $language;
    }

    protected function toReference(){
        if(isset($this->referenceDisplay))
            return new Reference($this->resourceType, $this->id, $this->referenceDisplay);
        return new Reference($this->resourceType, $this->id);
    }
    public function setDisplay($display){
        $this->referenceDisplay = $display;
    }

    public function toJson(){
        return json_encode($this->toArray());
    }
    public function toArray(){
        $dataArray = [];
        $dataArray["id"] = $this->id;
        return $dataArray;
    }
}
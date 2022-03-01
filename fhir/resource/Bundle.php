<?php 
namespace Modulo\Resource;

use Modulo\Element\Identifier;

class Bundle extends DomainResource{

    public function __construct(){
        parent::__construct();
        $this->resourceType = "Bundle";
        $this->entry = [];
    }

    public function setIdentifier(Identifier $identifier){
        $this->identifier = $identifier;
    }

    public function setType(String $type){
        $only = ["document","message","transaction","transaction-response","batch","batch-response","history","searchset","collection"];
        $this->type = $this->only($only, $type);
    }

    public function setTimestamp(String $timestamp){
        $this->timestamp = $timestamp;
    }

    public function setTotal(String $total){
        $this->total = $total;
    }

    public function addEntry(Resource $resource){
        $this->entry[] = $resource;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        if(isset($this->identifier)){
            $arrayData["identifier"] = $this->identifier->toArray();
        }
        if(isset($this->type)){
            $arrayData["type"] = $this->type;
        }
        if(isset($this->timestamp)){
            $arrayData["timestamp"] = $this->timestamp;
        }
        if(isset($this->total)){
            $arrayData["total"] = $this->total;
        }

        $entryArray = [];
        foreach ($this->entry as $entry) {
            $current = [];
            $current["resource"]=$entry->toArray();
            $current["fullUrl"]=$entry->id;
            $entryArray[] = $current;
        }
        $arrayData["entry"] = $entryArray;

        return $arrayData;
    }
}
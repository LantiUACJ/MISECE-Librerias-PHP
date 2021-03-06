<?php 
namespace App\Fhir\Resource;

use App\Fhir\Element\Identifier;

class Bundle extends DomainResource{

    public function __construct($json = null){
        parent::__construct($json);
        $this->resourceType = "Bundle";
        $this->entry = [];
        if($json){
            $this->loadData($json);
        }
    }
    /* adquiere un json y lo transforma a Bundle */
    private function loadData($json){
        if(gettype($json) === "string"){
            $json = json_decode($json);
        }
        if(isset($json->entry)){
            foreach($json->entry as $entry)
                if(isset($entry->resource) && isset($entry->resource->resourceType))
                    $this->addEntry(ResourceBuilder::make($entry->resource));
        }
        if(isset($json->identifier)){
            $this->setIdentifier(Identifier::Load($json->identifier));
        }
        if(isset($json->type)){
            $this->setType($json->type);
        }
        if(isset($json->tipestamp)){
            $this->setTimestamp($json->timestamp);
        }
        if(isset($json->total)){
            $this->setTotal($json->total);
        }
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
    /**
     * @param string $id
     * @return \App\Fhir\Resource\Resource
    */
    public function findResource($id){
        foreach($this->entry as $entry){
            $resource = $entry;
            if(isset($resource->id) && $resource->id == $id){
                return $entry;
            }
        }
    }
    public function findCompositions(){
        $data = [];
        foreach($this->entry as $entry){
            if($entry->resourceType == "Composition")
                $data[] = $entry;
        }
        return $data;
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
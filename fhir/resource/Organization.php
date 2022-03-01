<?php 

namespace Modulo\Resource;

class Organization extends DomainResource{

    public function __construct(){
        $this->resourceType = "Organization";
        parent::__construct();
    }
    
    public function identifier(identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function active($active){
        $this->active = $active;
    }
    public function type(codableconcept $type){
        $this->type[] = $type;
    }
    public function name($name){
        $this->name = $name;
    }
    public function alias($alias){
        $this->alias[] = $alias;
    }
    public function telecom(contactPoint $telecom){
        $this->telecom[] = $telecom;
    }
    public function address(address $address){
        $this->address[] = $address;
    }
    public function partOf(reference $partOf){
        $this->partOf = $partOf;
    }
    public function contact(codeableConcept $purpose, humanName $name, contactPoint $telecom, codeableConcept $address){
        $this->contact[] = [
            "purpose"=>$purpose,
            "name"=>$name,
            "telecom"=>$telecom,
            "address"=>$address,
        ];
    }
    public function endpoint(reference $endpoint){
        $this->endpoint[] = $endpoint;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $this->identifier->toArray();
        }
        if(isset($this->active)){
            $arrayData["active"] = $this->active;
        }
        foreach($this->type as $type){
            $arrayData["type"][] = $type->toArray();
        }
        if(isset($this->name)){
            $arrayData["name"] = $this->name;
        }
        foreach($this->alias as $alias){
            $arrayData["alias"][] = $this->alias;
        }
        foreach($this->telecom as $telecom){
            $arrayData["telecom"][] = $this->telecom->toArray();
        }
        foreach($this->address as $address){
            $arrayData["address"][] = $this->address->toArray();
        }
        if(isset($this->partOf)){
            $arrayData["partOf"] = $this->partOf->toArray();
        }
        foreach($this->contact as $contact){
            $arrayData["contact"][] = [
                "purpose"=>$contact["purpose"]->toArray(),
                "name"=>$contact["name"]->toArray(),
                "telecom"=>$contact["telecom"]->toArray(),
                "address"=>$contact["address"]->toArray(),
            ];
        }
        foreach($this->endpoint as $endpoint){
            $arrayData["endpoint"][] = $this->endpoint->toArray();
        }

        return $arrayData;
    }
}


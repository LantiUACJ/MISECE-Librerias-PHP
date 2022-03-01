<?php 

namespace Modulo\Resource;

class Practitioner extends DomainResource{
    public function __construct(){
        $this->resourceType = "Practitioner";
        parent::__construct();
        $this->identifier = [];
        $this->name = [];
        $this->telecom = [];
        $this->address = [];
        $this->qualification = [];
    }
    public function identifier(identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function active($active){
        $this->active = $active;
    }
    public function name(humanName $name){
        $this->name[] = $name;
    }
    public function telecom(contactPoint $telecom){
        $this->telecom[] = $telecom;
    }
    public function address(address $address){
        $this->address[] = $address;
    }
    public function gender($gender){
        $only = ["male", "female", "unknown", "other"];
        $this->gender = $gender;
    }
    public function birthDate($birthDate){
        $this->birthDate = $birtDate;
    }
    public function photo(attachment $photo){
        $this->photo = $photo;
    }
    public function qualification(identificador $identifier, codeableConcept $code, period $period, reference $issuer){
        $this->qualification[] = [
            "identifier" => $identifier,
            "code" => $code,
            "period" => $period,
            "issuer" => $issuer
        ];
    }
    public function communication(codeableConcept $communication){
        $this->communication = $communication;
    }
    public function toArray(){
        $arrayData = parent::toArray();
        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        if(isset($this->active)){
            $arrayData["active"] = $this->active;
        }
        foreach($this->name as $name){
            $arrayData["name"][] = $name->toArray();
        }
        foreach($this->telecom as $telecom){
            $arrayData["telecom"][] = $telecom->toArray();
        }
        foreach($this->address as $address){
            $arrayData["address"][] = $address->toArray();
        }
        if(isset($this->gender)){
            $arrayData["gender"] = $this->gender;
        }
        if(isset($this->birthDate)){
            $arrayData["birthDate"] = $this->birtDate;
        }
        if(isset($this->photo)){
            $arrayData["photo"] = $this->photo;
        }
        foreach($this->qualification as $qualification){
            $arrayData["qualification"][] = [
                "identifier" => $qualification["identifier"]->toArray(),
                "code" => $qualification["code"]->toArray(),
                "period" => $qualification["period"]->toArray(),
                "issuer" => $qualification["issuer"]->toArray()
            ];
        }
        if(isset($this->communication)){
            $arrayData["communication"] = $this->communication->toArray();
        }
        return $arrayData;
    }
}

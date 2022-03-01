<?php 

namespace Modulo\Resource;

class Medication extends DomainResource{
    public function __construct(){
        $this->resourceType = "Medication";
        parent::__construct();
        $this->identifier = [];
        $this->ingredient = [];
    }

    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setCode(CodeableConcept $code){
        $this->code = $code;
    }
    public function setStatus($status){
        $only = ["registered", "inactive", "entered-in-error"];
        $this->status = $status;
    }
    public function setManufacturer(Reference $manufacturer){
        $this->manufacturer = $manufacturer;
    }
    public function setForm(CodeableConcept $form){
        $this->form = $form;
    }
    public function setAmount(Ratio $amount){
        $this->amount = $amount;
    }
    public function setIngredient(CodeableConcept $itemCodeableConcept, Reference $itemReference, $isActive, Ratio $strength){
        $ingredient = [
            "itemCodeableConcept"=>$itemCodeableConcept,
            "itemReference"=>$itemReference,
            "isActive"=>$isActive,
            "strength"=>$strength,
        ];
        $this->ingredient[] = $ingredient;
    }
    public function setBatch($lotNumber, $expirationDate){
        $this->batch = [
            "lotNumber"=>$lotNumber,
            "expirationDate"=>$expirationDate,
        ];
    }
    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"] = $identifier->toArray();
        }
        if(isset($this->code)){
            $arrayData["code"] = $this->code->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        if(isset($this->manufacturer)){
            $arrayData["manufacturer"] = $this->manufacturer->toArray();
        }
        if(isset($this->form)){
            $arrayData["form"] = $this->form;
        }
        if(isset($this->amount)){
            $arrayData["amount"] = $this->amount->toArray();
        }
        foreach($this->ingredient as $ingredient){
            $arrayData["ingredient"] = [
                "itemCodeableConcept"=>$ingredient["itemCodeableConcept"], 
                "itemReference"=>$ingredient["itemReference"], 
                "isActive"=>$ingredient["isActive"], 
                "strength"=>$ingredient["strength"], 
            ];
        }
        if(isset($this->batch)){
            $arrayData["batch"] = [
                "lotNumber"=>$this->batch["lotNumber"],
                "expirationDate"=>$this->batch["expirationDate"],
            ];
        }

        return $arrayData;
    }
}
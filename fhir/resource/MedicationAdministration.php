<?php

namespace Modulo\Resource;

class MedicationAdministration extends DomainResource{
    public function __construct(){
        $this->resourceType = "MedicationAdministration";
        parent::__construct();
        $this->identifier = [];
        $this->instantiates = [];
        $this->partOf = [];
        $this->statusReason = [];
        $this->performer = [];
        $this->reasonCode = [];
        $this->reasonReference = [];
        $this->device = [];
        $this->note = [];
        $this->eventHistory = [];
    }
    
    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function addInstantiates($instantiates){
        $this->instantiates[] = $instantiates;
    }
    public function addPartOf(Reference $partOf){
        $this->partOf[] = $partOf;
    }
    public function setStatus($status){
        $only = ["in-progress", "not-done", "on-hold", "completed", "entered-in-error", "stopped", "unknown"];
        $this->status = $status;
    }
    public function addStatusReason(CodeableConcept $statusReason){
        $this->statusReason[] = $statusReason;
    }
    public function setCategory(CodeableConcept $category){
        $this->category = $category;
    }
    public function setMedicationCodeableConcept(CodeableConcept $medicationCodeableConcept){
        $this->medicationCodeableConcept = $medicationCodeableConcept;
    }
    public function setMedicationReference(Reference $medicationReference){
        $this->medicationReference = $medicationReference;
    }
    public function setSubject(Reference $subject){
        $this->subject = $subject;
    }
    public function setContext(Reference $context){
        $this->context = $context;
    }
    public function setSupportingInformation(Reference $supportingInformation){
        $this->supportingInformation = $supportingInformation;
    }
    public function setEffectiveDateTime($effectiveDateTime){
        $this->effectiveDateTime = $effectiveDateTime;
    }
    public function setEffectivePeriod(Period $effectivePeriod){
        $this->effectivePeriod = $effectivePeriod;
    }
    public function addPerformer(CodeableConcept $performer, Reference $actor){
        $this->performer[] = [
            "performer"=> $performer,
            "actor"=>$actor
        ];
    }
    public function addReasonCode(CodeableConcept $reasonCode){
        $this->reasonCode[] = $reasonCode;
    }
    public function addReasonReference(Reference $reasonReference){
        $this->reasonReference[] = $reasonReference;
    }
    public function setRequest(Reference $request){
        $this->request = $request;
    }
    public function addDevice(Reference $device){
        $this->device[] = $device;
    }
    public function addNote(Annotation $note){
        $this->note[] = $note;
    }
    public function setDosage($text, codeableConcept $site, codeableConcept $route, CodeableConcept $method, Quantity $dose, Ratio $rateRatio, Quantity $rateQuantity){
        $this->dosage["text"] = $text;
        $this->dosage["site"] = $site;
        $this->dosage["route"] = $route;
        $this->dosage["method"] = $method;
        $this->dosage["dose"] = $dose;
        $this->dosage["rateRatio"] = $rateRatio;
        $this->dosage["rateQuantity"] = $rateQuantity;
    }
    public function addEventHistory(Reference $eventHistory){
        $this->eventHistory[] = $eventHistory;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"] = $identifier->toArray();
        }
        foreach($this->instantiates as $instantiates){
            $arrayData["instantiates"][] = $instantiates;
        }
        foreach($this->partOf as $partOf){
            $arrayData["partOf"][] = $partOf->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        foreach($this->statusReason as $statusReason){
            $arrayData["statusReason"][] = $statusReason->toArray();
        }
        if(isset($this->category)){
            $arrayData["category"] = $this->category->toArray();
        }
        if(isset($this->medicationCodeableConcept)){
            $arrayData["medicationCodeableConcept"] = $this->medicationCodeableConcept;
        }
        if(isset($this->medicationReference)){
            $arrayData["medicationReference"] = $this->medicationReference->toArray();
        }
        if(isset($this->subject)){
            $arrayData["subject"] = $this->subject->toArray();
        }
        if(isset($this->context)){
            $arrayData["context"] = $this->context->toArray();
        }
        if(isset($this->supportingInformation)){
            $arrayData["supportingInformation"] = $this->supportingInformation->toArray();
        }
        if(isset($this->effectiveDateTime)){
            $arrayData["effectiveDateTime"] = $this->effectiveDateTime;
        }
        if(isset($this->effectivePeriod)){
            $arrayData["effectivePeriod"] = $this->effectivePeriod->toArray();
        }
        foreach($this->performer as $performer){
            $arrayData["performer"][] = [
                "performer"=> $performer["performer"]->toArray(),
                "actor"=>$performer["actor"]->toArray()
            ];
        }
        foreach($this->reasonCode as $reasonCode){
            $arrayData["reasonCode"][] = $reasonCode->toArray();
        }
        foreach($this->reasonReference as $reasonReference){
            $arrayData["reasonReference"][] = $reasonReference->toArray();
        }
        if(isset($this->request)){
            $arrayData["request"] = $this->request->toArray();
        }
        foreach($this->device as $device){
            $arrayData["device"][] = $device->toArray();
        }
        foreach($this->note as $note){
            $arrayData["note"][] = $note->toArray();
        }
        if(isset($this->dosage) && $this->dosage["text"]){
            $arrayData["dosage"]["text"] = $text;
        }    
        if(isset($this->dosage) && $this->dosage["site"]){
            $arrayData["dosage"]["site"] = $site->toArray();
        }
        if(isset($this->dosage) && $this->dosage["route"]){
            $arrayData["dosage"]["route"] = $route->toArray();
        }
        if(isset($this->dosage) && $this->dosage["method"]){
            $arrayData["dosage"]["method"] = $method->toArray();
        }
        if(isset($this->dosage) && $this->dosage["dose"]){
            $arrayData["dosage"]["dose"] = $dose->toArray();
        }
        if(isset($this->dosage) && $this->dosage["rateRatio"]){
            $arrayData["dosage"]["rateRatio"] = $rateRatio->toArray();
        }
        if(isset($this->dosage) && $this->dosage["rateQuantity"]){
            $arrayData["dosage"]["rateQuantity"] = $rateQuantity->toArray();
        }
        foreach($this->eventHistory as $eventHistory){
            $arrayData["eventHistory"][] = $eventHistory->toArray();
        }
        return $arrayData;
    }

}
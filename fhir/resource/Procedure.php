<?php 

namespace Modulo\Resource;

class Procedure extends DomainResource{
    public function __construct(){
        $this->resourceType = "Procedure";
        parent::__construct();
        $this->identifier = [];
        $this->instantiatesCanonical = [];
        $this->instantiatesUri = [];
        $this->basedOn = [];
        $this->partOf = [];
        $this->performer = [];
        $this->reasonCode = [];
        $this->reasonReference = [];
        $this->bodySite = [];
        $this->report = [];
        $this->complication = [];
        $this->complicationDetail = [];
        $this->followUp = [];
        $this->note = [];
        $this->focalDevice = [];
        $this->usedReference = [];
        $this->usedCode = [];
    }
    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function addInstantiatesCanonical($instantiatesCanonical){
        $this->instantiatesCanonical[] = $instantiatesCanonical;
    }
    public function addInstantiatesUri($instantiatesUri){
        $this->instantiatesUri[] = $instantiatesUri;
    }
    public function addBasedOn(Resource $basedOn){
        $this->basedOn[] = $basedOn->toReference();
    }
    public function addPartOf(Resource $partOf){
        $this->partOf[] = $partOf->toReference();
    }
    public function setStatus($status){
        $data = ["preparation", "in-progress", "not-done", "on-hold", "stopped", "completed", "entered-in-error","unknown"];
        $this->status = $status;
    }
    public function setStatusReason(CodeableConcept $statusReason){
        $this->statusReason = $this->statusReason;
    }
    public function setCategory(CodeableConcept $category){
        $this->category = $this->category;
    }
    public function setCode(CodeableConcept $code){
        $this->code = $this->code;
    }
    public function setSubject(Resource $subject){
        $this->subject = $this->subject->toReference();
    }
    public function setEncounter(Resource $encounter){
        $this->encounter = $this->encounter->toReference();
    }
    public function setPerformedDateTime(Resource $performedDateTime){
        $this->performedDateTime = $this->performedDateTime;
    }
    public function setPerformedPeriod(Period $performedPeriod){
        $this->performedPeriod = $performedPeriod;
    }
    public function setPerformedString(Period $performedString){
        $this->performedString = $performedString;
    }
    public function setPerformedAge($performedAge){
        $this->performedAge = $performedAge;
    }
    public function setPerformedRange(Range $performedRange){
        $this->performedRange = $performedRange;
    }
    public function setRecorder(Range $recorder){
        $this->recorder = $recorder->toReference();
    }
    public function setAsserter(Range $asserter){
        $this->asserter = $asserter->toReference();
    }
    public function addPerformer(CodeableConcept $performer, Resource $actor, Resource $onBehalfOf){
        $this->performer[] = [
            "function"=>$performer, 
            "actor"=>$actor->toReference(),
            "onBehalfOf"=>$onBehalfOf->toReference(),
        ];
    }
    public function setLocation(Resource $location){
        $this->location = $location->toReference();
    }
    public function addReasonCode(CodeableConcept $reasonCode){
        $this->reasonCode[] = $reasonCode;
    }
    public function addReasonReference(Resource $reasonReference){
        $this->reasonReference[] = $reasonReference->toReference();
    }
    public function addBodySite(CodeableConcept $bodySite){
        $this->bodySite[] = $bodySite;
    }
    public function addOutcome(CodeableConcept $outcome){
        $this->outcome = $outcome;
    }
    public function addReport(Resource $report){
        $this->report[] = $report->toReference();
    }
    public function addComplication(CodeableConcept $complication){
        $this->complication[] = $complication;
    }
    public function addComplicationDetail(Resource $complicationDetail){
        $this->complicationDetail[] = $complicationDetail->toReference();
    }
    public function addFollowUp(CodeableConcept $followUp){
        $this->followUp[] = $followUp->toReference();
    }
    public function addNote(Annotation $note){
        $this->note[] = $note->toReference();
    }
    public function addFocalDevice(codeableConcept $action, Resource $manipulated){
        $this->focalDevice[] = [
            "action"=>$focalDevice,
            "manipulated"=>$manipulated->toReference(),
        ];
    }
    public function addUsedReference(Resource $usedReference){
        $this->usedReference[] = $usedReference->toReference();
    }
    public function addUsedCode(CodeableConcept $usedCode){
        $this->usedCode[] = $usedCode;
    }


    public function toArray(){
        $arrayData = parent::toArray();
        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        foreach($this->instantiatesCanonical as $instantiatesCanonical){
            $arrayData["instantiatesCanonical"][] = $instantiatesCanonical;
        }
        foreach($this->instantiatesUri as $instantiatesUri){
            $arrayData["instantiatesUri"][] = $instantiatesUri;
        }
        foreach($this->basedOn as $basedOn){
            $arrayData["basedOn"][] = $basedOn->toArray();
        }
        foreach($this->partOf as $partOf){
            $arrayData["partOf"][] = $partOf->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $status;
        }
        if(isset($this->statusReason)){
            $arrayData["statusReason"] = $this->statusReason->toArray();
        }
        if(isset($this->category)){
            $arrayData["category"] = $this->category->toArray();
        }
        if(isset($this->code)){
            $arrayData["code"] = $this->code->toArray();
        }
        if(isset($this->subject)){
            $arrayData["subject"] = $this->subject->toArray();
        }
        if(isset($this->encounter)){
            $arrayData["encounter"] = $this->encounter->toArray();
        }
        if(isset($this->performedDateTime)){
            $arrayData["performedDateTime"] = $this->performedDateTime->toArray();
        }
        if(isset($this->performedPeriod)){
            $arrayData["performedPeriod"] = $performedPeriod->toArray();
        }
        if(isset($this->performedString)){
            $arrayData["performedString"] = $performedString->toArray();
        }
        if(isset($this->performedAge)){
            $arrayData["performedAge"] = $performedAge;
        }
        if(isset($this->performedRange)){
            $arrayData["performedRange"] = $performedRange->toArray();
        }
        if(isset($this->recorder)){
            $arrayData["recorder"] = $recorder->toArray();
        }
        if(isset($this->asserter)){
            $arrayData["asserter"] = $asserter->toArray();
        }
        foreach($this->performer as $performer){
            $arrayData["performer"][] = [
                "function"=>$performer->toArray(), 
                "actor"=>$actor->toArray(),
                "onBehalfOf"=>$onBehalfOf->toArray(),
            ];
        }
        if(isset($this->location)){
            $arrayData["location"] = $location->toArray();
        }
        foreach($this->reasonCode as $reasonCode){
            $arrayData["reasonCode"][] = $reasonCode->toArray();
        }
        foreach($this->reasonReference as $reasonReference){
            $arrayData["reasonReference"][] = $reasonReference->toArray();
        }
        foreach($this->bodySite as $bodySite){
            $arrayData["bodySite"][] = $bodySite->toArray();
        }
        if(isset($this->outcome)){
            $arrayData["outcome"] = $outcome->toArray();
        }
        foreach($this->report as $report){
            $arrayData["report"][] = $report->toArray();
        }
        foreach($this->complication as $complication){
            $arrayData["complication"][] = $complication->toArray();
        }
        foreach($this->complicationDetail as $complicationDetail){
            $arrayData["complicationDetail"][] = $complicationDetail->toArray();
        }
        foreach($this->followUp as $followUp){
            $arrayData["followUp"][] = $followUp->toArray();
        }
        foreach($this->note as $note){
            $arrayData["note"][] = $note->toArray();
        }
        foreach($this->focalDevice as $focalDevice){
            $arrayData["focalDevice"][] = [
                "action"=>$focalDevice->toArray(),
                "manipulated"=>$manipulated->toArray(),
            ];
        }
        foreach($this->usedReference as $usedReference){
            $arrayData["usedReference"][] = $usedReference->toArray();
        }
        foreach($this->usedCode as $usedCode){
            $arrayData["usedCode"][] = $usedCode->toArray();
        }
        return $arrayData;
    }
}
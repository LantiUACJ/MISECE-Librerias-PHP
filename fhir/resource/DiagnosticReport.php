<?php 

namespace Modulo\Resource;

use Modulo\Element\CodeableConcept;
use Modulo\Element\Identifier;
use Modulo\Element\Period;
use Modulo\Element\Attachment;

class DiagnosticReport extends DomainResource{
    
    public function __construct(){
        $this->resourceType = "DiagnosticReport";
        parent::__construct();
        $this->identifier = [];
        $this->basedOn = [];
        $this->category = [];
        $this->performer = [];
        $this->specimen = [];
        $this->result = [];
        $this->imagingStudy = [];
        $this->media = [];
        $this->conclusionCode = [];
        $this->presentedForm = [];
        $this->resultsInterpreter = [];
    }
    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function addBasedOn(Resource $basedOn){
        $this->basedOn[] = $basedOn->toReference();
    }
    public function setStatus($status){
        $status = ["registered", "partial","preliminary","final"];
        $this->status = $status;
    }
    public function addCategory(CodeableConcept $category){
        $this->category[] = $category;
    }
    public function setCode(CodeableConcept $code){
        $this->code = $code;
    }
    public function setSubject(Resource $subject){
        $this->subject = $subject->toReference();
    }
    public function setEncounter(Resource $encounter){
        $this->encounter = $encounter->toReference();
    }
    public function setEffectiveDateTime($effectiveDateTime){
        $this->effectiveDateTime = $effectiveDateTime;
    }
    public function setEffectivePeriod(Period $effectivePeriod){
        $this->effectivePeriod = $effectivePeriod;
    }
    public function setIssued($issued){
        $this->issued = $issued;
    }
    public function addPerformer(Resource $performer){
        $this->performer[] = $performer->toReference();
    }
    public function addResultsInterpreter(Resource $resultsInterpreter){
        $this->resultsInterpreter[] = $resultsInterpreter->toReference();
    }
    public function addSpecimen(Resource $specimen){
        $this->specimen[] = $specimen->toReference();
    }
    public function addResult(Resource $result){
        $this->result[] = $result->toReference();
    }
    public function addImagingStudy(Resource $imagingStudy){
        $this->imagingStudy[] = $imagingStudy->toReference();
    }
    public function addMedia($media, Resource $link){
        $this->media[] = [
            "media"=>$media,
            "link"=>$link->toReference()
        ];
    }
    public function setConclusion($conclusion){
        $this->conclusion = $conclusion;
    }
    public function addConclusionCode(CodeableConcept $conclusionCode){
        $this->conclusionCode[] = $conclusionCode;
    }
    public function addPresentedForm(Attachment $presentedForm){
        $this->presentedForm[] = $presentedForm;
    }
    
    public function toArray(){
        $dataArray = parent::toArray();
        $dataArray["resourceType"]=$this->resourceType;
        foreach($this->identifier as $identifier)
            $dataArray["identifier"][] = $identifier->toArray();
        foreach($this->basedOn as $basedOn)
            $dataArray["basedOn"][] = $basedOn->toArray();
        if(isset($this->status)){
            $dataArray["status"] = $this->status;
        }
        foreach($this->category as $category)
            $dataArray["category"][] = $category->toArray();
        if(isset($this->code)){
            $dataArray["code"] = $this->code->toArray();
        }
        if(isset($this->subject)){
            $dataArray["subject"] = $this->subject->toArray();
        }
        if(isset($this->encounter)){
            $dataArray["encounter"] = $this->encounter->toArray();
        }
        if(isset($this->effectiveDateTime)){
            $dataArray["effectiveDateTime"] = $this->effectiveDateTime;
        }
        if(isset($this->effectivePeriod)){
            $dataArray["effectivePeriod"] = $this->effectivePeriod->toArray();
        }
        if(isset($this->issued)){
            $dataArray["issued"] = $this->issued;
        }
        foreach($this->performer as $performer){
            $dataArray["performer"][] = $performer->toArray();
        }
        foreach($this->resultsInterpreter as $resultsInterpreter){
            $dataArray["resultsInterpreter"] = $resultsInterpreter->toArray();
        }
        foreach($this->specimen as $specimen){
            $dataArray["specimen"][] = $specimen->toArray();
        }
        foreach($this->result as $result){
            $dataArray["result"][] = $result->toArray();
        }
        foreach($this->imagingStudy as $imagingStudy){
            $dataArray["imagingStudy"][] = $imagingStudy->toArray();
        }
        foreach($this->media as $media){
            $dataArray["media"] = [
                "media"=>$media["media"],
                "link"=>$media["link"]->toArray(),
            ];
        }
        if(isset($this->conclusion)){
            $dataArray["conclusion"] = $this->conclusion;
        }
        foreach($this->conclusionCode as $conclusionCode){
            $dataArray["conclusionCode"][] = $conclusionCode->toArray();
        }
        foreach($this->presentedForm as $presentedForm){
            $dataArray["presentedForm"] = $presentedForm->toArray();
        }

        return $dataArray;
    }
}

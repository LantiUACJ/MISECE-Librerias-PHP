<?php 

namespace Modulo\Resource;

class Observation extends DomainResource{

    public function __construct(){
        $this->resourceType = "Observation";
        parent::__construct();
        $this->identifier = [];
        $this->basedOn = [];
        $this->partOf = [];
        $this->category = [];
        $this->focus = [];
        $this->performer = [];
        $this->interpretation = [];
        $this->note = [];
        $this->hasMember = [];
        $this->derivedFrom = [];
    }

    public function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setStatus($status){
        $only = ["registered", "preliminary", "final", "amended"];
        $this->status = $status;
    }
    public function setIssued($issued){
        $this->issued = $issued;
    }
    public function addtBasedOn(Reference $basedOn){
        $this->basedOn[] = $basedOn;
    }
    public function addPartOf(Reference $partOf){
        $this->partOf[] = $partOf;
    }
    public function addCategory(CodeableConcept $category){
        $this->category[] = $category;
    }
    public function setCode(CodeableConcept $code){
        $this->code = $code;
    }
    public function setSubject(Reference $subject){
        $this->subject = $subject;
    }
    public function addFocus(Reference $focus){
        $this->focus[] = $focus;
    }
    public function setEncounter(Reference $encounter){
        $this->encounter = $encounter;
    }
    public function setEffectiveDateTime($effectiveDateTime){
        $this->effectiveDateTime = $effectiveDateTime;
    }
    public function setEffectivePeriod(Period $effectivePeriod){
        $this->effectivePeriod = $effectivePeriod;
    }
    public function setEffectiveTiming(Timing $effectiveTiming){
        $this->effectiveTiming = $effectiveTiming;
    }
    public function setEffectiveInstant($effectiveInstant){
        $this->effectiveInstant = $effectiveInstant;
    }
    public function addPerformer(Reference $performer){
        $this->performer[] = $performer;
    }
    public function setValueQuantity(Quantity $valueQuantity){
        $this->valueQuantity = $valueQuantity;
    }
    public function setValueCodeableConcept(CodeableConcept $valueCodeableConcept){
        $this->valueCodeableConcept = $valueCodeableConcept;
    }
    public function setValueString($valueString){
        $this->valueString = $valueString;
    }
    public function setValueBoolean($valueBoolean){
        $this->valueBoolean = $valueBoolean;
    }
    public function setValueInteger($valueInteger){
        $this->valueInteger = $valueInteger;
    }
    public function setValueRange(Range $valueRange){
        $this->valueRange = $valueRange;
    }
    public function setValueRatio(Ratio $valueRatio){
        $this->valueRatio = $valueRatio;
    }
    public function setValueSampledData(SampleData $valueSampledData){
        $this->valueSampledData = $valueSampledData;
    }
    public function setValueTime($valueTime){
        $this->valueTime = $valueTime;
    }
    public function setValueDateTime($valueDateTime){
        $this->valueDateTime = $valueDateTime;
    }
    public function setValuePeriod(Ratio $valuePeriod){
        $this->valuePeriod = $valuePeriod;
    }
    public function setDataAbsentReason(CodeableConcept $dataAbsentReason){
        $this->dataAbsentReason = $dataAbsentReason;
    }
    public function addInterpretation(CodeableConcept $interpretation){
        $this->interpretation[] = $interpretation; 
    }
    public function addNote(Annotation $note){
        $this->note[] = $note;
    }
    public function setBodySite(CodeableConcept $bodySite){
        $this->bodySite = $bodySite;
    }
    public function setMethod(CodeableConcept $method){
        $this->method = $method;
    }
    public function setSpecimen(Reference $specimen){
        $this->specimen = $specimen;
    }
    public function setDevice(Reference $device){
        $this->device = $device;
    }
    public function setReferenceRange(Quantity $low, Quantity $high, CodeableConcept $type, CodeableConcept $appliesTo, Range $age, $text){
        $this->referenceRange->low = $low;
        $this->referenceRange->high = $high;
        $this->referenceRange->type = $type;
        $this->referenceRange->appliesTo = $appliesTo;
        $this->referenceRange->age = $age;
        $this->referenceRange->text = $text;
    }
    public function addHasMember(Reference $hasMember){
        $this->hasMember[] = $hasMember;
    }
    public function addDerivedFrom(Reference $derivedFrom){
        $this->derivedFrom[] = $derivedFrom;
    }
    public function setComponent(CodeableConcept $code, Quantity $valueQuantity, CodeableConcept $valueCodeableConcept, $valueString, 
        $valueInteger, Range $valueRange, Ratio $valueRatio, SampleData $valueSampledData, $valueTime, $valueDateTime,
        Reriod $period, CodeableConcept $dataAbsentReason, $interpretation, $referenceRange){
        $this->component->code = $code;
        $this->component->valueQuantity = $valueQuantity;
        $this->component->valueCodeableConcept = $valueCodeableConcept;
        $this->component->valueString = $valueString;
        $this->component->valueBoolean = $valueBoolean;
        $this->component->valueInteger = $valueInteger;
        $this->component->valueRange = $valueRange;
        $this->component->valueRatio = $valueRatio;
        $this->component->valueSampledData = $valueSampledData;
        $this->component->valueTime = $valueTime;
        $this->component->valueDateTime = $valueDateTime;
        $this->component->period = $period;
        $this->component->dataAbsentReason = $dataAbsentReason;
        $inters = [];
        foreach($interpretation as $inter){
            if($inter instanceof CodeableConcept)
                $inters[] = $inter;
        }
        $this->component->interpretation = $inters;
        $refences = [];
        foreach($referenceRange as $refes){
            if($refes instanceof CodeableConcept)
                $refences[] = $refes;
        }
        $this->component->referenceRange = $refences;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        if(isset($this->issued)){
            $arrayData["issued"] = $this->issued;
        }
        foreach($this->basedOn as $basedOn){
            $arrayData['basedOn'][] = $basedOn->toArray();
        }
        foreach($this->partOf as $partOf){
            $arrayData["partOf"][] = $partOf->toArray();
        }
        foreach($this->category as $category){
            $arrayData["category"][] = $category->toArray();
        }
        if(isset($this->code)){
            $arrayData["code"] = $this->code->toArray();
        }
        if(isset($this->subject)){
            $arrayData["subject"] = $this->subject->toArray();
        }
        foreach($this->focus as $focus){
            $arrayData["focus"][] = $focus->toArray();
        }
        if(isset($this->encounter)){
            $arrayData["encounter"] = $this->encounter->toArray();
        }
        if(isset($this->effectiveDateTime)){
            $arrayData["effectiveDateTime"] = $this->effectiveDateTime;
        }
        if(isset($this->effectivePeriod)){
            $arrayData["effectivePeriod"] = $this->effectivePeriod->toArray();
        }
        if(isset($this->effectiveTiming)){
            $arrayData["effectiveTiming"] = $this->effectiveTiming->toArray();
        }
        if(isset($this->effectiveInstant)){
            $arrayData["effectiveInstant"] = $this->effectiveInstant;
        }
        foreach($this->performer as $performer){
            $arrayData["performer"][] = $performer->toArray();
        }
        if(isset($this->valueQuantity)){
            $arrayData["valueQuantity"] = $this->valueQuantity->toArray();
        }
        if(isset($this->valueCodeableConcept)){
            $arrayData["valueCodeableConcept"] = $this->valueCodeableConcept->toArray();
        }
        if(isset($this->valueString)){
            $arrayData["valueString"] = $this->valueString;
        }
        if(isset($this->valueBoolean)){
            $arrayData["valueBoolean"] = $this->valueBoolean;
        }
        if(isset($this->valueInteger)){
            $arrayData["valueInteger"] = $this->valueInteger;
        }
        if(isset($this->valueRange)){
            $arrayData["valueRange"] = $this->valueRange->toArray();
        }
        if(isset($this->valueRatio)){
            $arrayData["valueRatio"] = $this->valueRatio->toArray();
        }
        if(isset($this->valueSampledData)){
            $this->valueSampledData = $valueSampledData->toArray();
        }
        if(isset($this->valueTime)){
            $this->valueTime = $valueTime;
        }
        if(isset($this->valueDateTime)){
            $this->valueDateTime = $valueDateTime;
        }
        if(isset($this->valuePeriod)){
            $arrayData["valuePeriod"] = $this->valuePeriod->toArray();
        }
        if(isset($this->dataAbsentReason)){
            $arrayData["dataAbsentReason"] = $this->dataAbsentReason->toArray();
        }
        foreach($this->interpretation as $interpretation){
            $arrayData["interpretation"] = $interpretation->toArray();
        }
        foreach($this->note as $note){
            $arrayData["note"] = $note->toArray();
        }
        if(isset($this->bodySite)){
            $arrayData["bodySite"] = $this->bodySite->toArray();
        }
        if(isset($this->method)){
            $arrayData["method"] = $this->method->toArray();
        }
        if(isset($this->specimen)){
            $arrayData["specimen"] = $this->specimen;
        }
        if(isset($this->device)){
            $arrayData["device"] = $this->device;
        }
        if(isset($this->referenceRange)){
            $arrayData["referenceRange"]["low"] = $this->referenceRange["low"]->toArray();
            $arrayData["referenceRange"]["high"] = $this->referenceRange["high"]->toArray();
            $arrayData["referenceRange"]["type"] = $this->referenceRange["type"]->toArray();
            $arrayData["referenceRange"]["appliesTo"] = $this->referenceRange["appliesTo"]->toArray();
            $arrayData["referenceRange"]["age"] = $this->referenceRange["age"]->toArray();
            $arrayData["referenceRange"]["text"] = $this->referenceRange["text"];
        }
        foreach($this->hasMember as $hasMember){
            $arrayData["hasMember"] = $this->hasMember->toArray();
        }
        foreach($this->derivedFrom as $derivedFrom){
            $arrayData["derivedFrom"] = $this->derivedFrom;
        }
        if(isset($this->component)){
            $arrayData["component"]["code"] = $this->component["code"]->toArray();
            $arrayData["component"]["valueQuantity"] = $this->component["valueQuantity"]->toArray();
            $arrayData["component"]["valueCodeableConcept"] = $this->component["valueCodeableConcept"]->toArray();
            $arrayData["component"]["valueString"] = $this->component["valueString"];
            $arrayData["component"]["valueBoolean"] = $this->component["valueBoolean"];
            $arrayData["component"]["valueInteger"] = $this->component["valueInteger"];
            $arrayData["component"]["valueRange"] = $this->component["valueRange"]->toArray();
            $arrayData["component"]["valueRatio"] = $this->component["valueRatio"]->toArray();
            $arrayData["component"]["valueSampledData"] = $this->component["valueSampledData"]->toArray();
            $arrayData["component"]["valueTime"] = $this->component["valueTime"];
            $arrayData["component"]["valueDateTime"] = $this->component["valueDateTime"];
            $arrayData["component"]["period"] = $this->component["period"]->toArray();
            $arrayData["component"]["dataAbsentReason"] = $this->component["dataAbsentReason"]->toArray();
            $inters = [];
            foreach($this->component->interpretation as $inter){
                $arrayData["componet"]["interpretation"][] = $inter->toArray();
            }
            foreach($this->component->referenceRange as $referenceRange){
                $arrayData["componet"]["referenceRange"][] = $referenceRange->toArray();
            }
        }
        return $arrayData;
    }
}

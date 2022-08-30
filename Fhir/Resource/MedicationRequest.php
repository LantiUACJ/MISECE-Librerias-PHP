<?php

namespace App\Fhir\Resource;

use App\Fhir\Element\Annotation;
use App\Fhir\Element\CodeableConcept;
use App\Fhir\Element\Dosage;
use App\Fhir\Element\Identifier;
use App\Fhir\Element\Period;
use App\Fhir\Element\Quantity;
use App\Fhir\Element\Ratio;
use App\Fhir\Element\Reference;

class MedicationAdministration extends DomainResource{

    public function __construct($json = null){
        $this->resourceType = "MedicationRequest";
        parent::__construct($json);

        $this->identifier = [];
        $this->category = [];
        $this->reasonCode = [];
        $this->reasonReference = [];
        $this->instantiatesCanonica = [];
        $this->instantiatesUr = [];
        $this->basedOn = [];
        $this->insurance = [];
        $this->note = [];
        $this->detectedIssue = [];
        $this->eventHistory = [];

        if($json) $this->loadData($json);
    }
    private function loadData($json){
        if(isset($json->identifier))
            foreach($json->identifier as $identifier)
                $this->identifier[] = Identifier::Load($identifier);
        if (isset($json->status))
            $this->intent = $json->intent;
        if (isset($json->statusReason))
            $this->statusReason = $json->statusReason;
        if (isset($json->intent))
            $this->intent = $json->intent;
        if (isset($json->category) && $json->category)
            foreach ($json->category as $category)
                $this->category[] = CodeableConcept::Load($category);
        if (isset($json->priority))
            $this->priority = $json->priority;
        if (isset($json->doNotPerform))
            $this->doNotPerform = $json->doNotPerform;
        if (isset($json->reportedBoolean))
            $this->reportedBoolean = $json->reportedBoolean;
        if (isset($json->reportedReference))
            $this->reportedReference = Reference::Load($json->reportedReference);
        if (isset($json->medicationCodeableConcept))
            $this->medicationCodeableConcept = CodeableConcept::Load($json->medicationCodeableConcept);
        if (isset($json->medicationReference))
            $this->medicationReference = Reference::Load($json->medicationReference);
        if (isset($json->subject))
            $this->subject = Reference::Load($json->subject);
        if (isset($json->encounter))
            $this->encounter = Reference::Load($json->encounter);
        if (isset($json->supportingInformation))
            $this->supportingInformation = Reference::Load($json->supportingInformation);
        if (isset($json->authoredOn))
            $this->authoredO = $json->authoredOn;
        if (isset($json->requester))
            $this->requester = Reference::Load($json->requester);
        if (isset($json->performer))
            $this->performer = Reference::Load($json->performer);
        if (isset($json->performerType))
            $this->performerType = CodeableConcept::Load($json->performerType);
        if (isset($json->recorder))
            $this->recorder = Reference::Load($json->recorder);
        if (isset($json->reasonCode) && $json->reasonCode)
            foreach ($json->reasonCode as $reasonCode)
                $this->reasonCode[] = CodeableConcept::Load($reasonCode);
        if (isset($json->reasonReference) && $json->reasonReference)
            foreach ($json->reasonReference as $reasonReference)
                $this->reasonReference[] = Reference::Load($reasonReference);
        if (isset($json->instantiatesCanonical) && $json->instantiatesCanonical)
            foreach ($json->instantiatesCanonical as $instantiatesCanonical)
                $this->instantiatesCanonica[] = $instantiatesCanonical;
        if (isset($json->instantiatesUri) && $json->instantiatesUri)
            foreach ($json->instantiatesUri as $instantiatesUri)
                $this->instantiatesUr[] = $instantiatesUri;
        if (isset($json->basedOn) && $json->basedOn)
            foreach ($json->basedOn as $basedOn)
                $this->basedOn[] = Reference::Load($basedOn);
        if (isset($json->groupIdentifier))
            $this->groupIdentifier = Identifier::Load($json->groupIdentifier);
        if (isset($json->courseOfTherapyType))
            $this->courseOfTherapyType = CodeableConcept::Load($json->courseOfTherapyType);
        if (isset($json->insurance) && $json->insurance)
            foreach ($json->insurance as $insurance)
                $this->insurance[] = Reference::Load($insurance);
        if (isset($json->note) && $json->note)
            foreach ($json->note as $note)
                $this->note[] = Annotation::Load($note);
        if (isset($json->dosageInstruction) && $json->dosageInstruction)
            foreach ($json->dosageInstruction as $dosageInstruction)
                $this->dosageInstruction[] = Dosage::Load($dosageInstruction);
        if (isset($json->dispenseRequest) && $json->dispenseRequest){
            $this->dispenseRequest = [];
            if (isset($json->dispenseRequest->initialFill) && $json->dispenseRequest->initialFill){
                $initialFill = [];
                if (isset($json->dispenseRequest->initialFill->quantity))
                    $initialFill["quantity"] = Quantity::Load($json->dispenseRequest->initialFill->quantity);
                if (isset($json->dispenseRequest->initialFill->duration))
                    $initialFill["duration"] = Quantity::Load($json->dispenseRequest->initialFill->duration);
                if($initialFill)
                    $this->dispenseRequest["initialFill"] = $initialFill;
            }
            if(isset($json->substitution)){
                $this->dispenseRequest["substitution"] = [];
                if (isset($json->substitution->dispenseInterval))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($json->substitution->dispenseInterval);
                if (isset($json->substitution->validityPeriod))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Period::Load($json->substitution->validityPeriod);
                if (isset($json->substitution->numberOfRepeatsAllowed))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = $json->substitution->numberOfRepeatsAllowed;
                if (isset($json->substitution->quantity))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($json->substitution->quantity);
                if (isset($json->substitution->expectedSupplyDuration))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($json->substitution->expectedSupplyDuration);
                if (isset($json->dispenseRequest->performer))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Reference::Load($json->dispenseRequest->performer);
            }
        }
        if (isset($json->substitution)){
            $this->substitution = [];
            if (isset($json->substitution->allowedBoolean))
                $this->substitution["allowedBoolean"] = $json->substitution->allowedBoolean;
            if (isset($json->substitution->allowedCodeableConcept))
                $this->substitution["allowedCodeableConcept"] = CodeableConcept::Load($json->substitution->allowedCodeableConcept);
            if (isset($json->substitution->reason))
                $this->substitution["reason"] = CodeableConcept::Load($json->substitution->reason);
        }
        if (isset($json->priorPrescription))
            $this->priorPrescription = Reference::Load($json->priorPrescription);
        if (isset($json->detectedIssue) && $json->detectedIssue)
            foreach ($json->detectedIssue as $detectedIssue)
                $this->detectedIssue[] = Reference::Load($detectedIssue);
        if (isset($json->eventHistory) && $json->eventHistory)
            foreach ($json->eventHistory as $eventHistory)
                $this->eventHistory[] = Reference::Load($eventHistory);
    }

    /* Obligatorio */
    function addIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    /* obligatorio */
    function setStatus($status){
        $this->status = $status;
    }
    /* obligatorio */
    function setStatusReason($statusReason){
        $this->statusReason = $statusReason;
    }
    /* obligatorio */
    function setIntent($intent){
        $this->intent = $intent;
    }
    function addCategory(CodeableConcept $category){
        $this->category[] = $category;
    }
    function setPriority($priority){
        $this->priority = $priority;
    }
    function setDoNotPerform($doNotPerform){
        $this->doNotPerform = $doNotPerform;
    }
    function setReportedBoolean($reportedBoolean){
        $this->reportedBoolean = $reportedBoolean;
    }
    function setReportedReference(Resource $reportedReference){
        $this->reportedReference = $reportedReference->toReference();
    }
    function setMedicationCodeableConcept(CodeableConcept $medicationCodeableConcept){
        $this->medicationCodeableConcept = $medicationCodeableConcept;
    }
    /* obligatorio */
    function setMedicationReference(Resource $medicationReference){
        $this->medicationReference = $medicationReference->toReference();
    }
    /* obligatorio */
    function setSubject(Resource $subject){
        $this->subject = $subject->toReference();
    }
    function setEncounter(Resource $encounter){
        $this->encounter = $encounter->toReference();
    }
    function setSupportingInformation(Resource $supportingInformation){
        $this->supportingInformation = $supportingInformation;
    }
    function setAuthoredOn($authoredOn){
        $this->authoredO = $authoredOn;
    }
    function setRequester(Resource $requester){
        $this->requester = $requester->toReference();
    }
    function setPerformer(Resource $performer){
        $this->performer = $performer->toReference();
    }
    function setPerformerType(CodeableConcept $performerType){
        $this->performerType = $performerType;
    }
    function setRecorder(Resource $recorder){
        $this->recorder = $recorder->toReference();
    }
    function addReasonCode(CodeableConcept $reasonCode){
        $this->reasonCode[] = $reasonCode;
    }
    function addReasonReference(Resource $reasonReference){
        $this->reasonReference[] = $reasonReference->toReference();
    }
    function addInstantiatesCanonical($instantiatesCanonical){
        $this->instantiatesCanonica[] = $instantiatesCanonical;
    }
    function addInstantiatesUri($instantiatesUri){
        $this->instantiatesUr[] = $instantiatesUri;
    }
    function addBasedOn(Resource $basedOn){
        $this->basedOn[] = $basedOn->toReference();
    }
    function setGroupIdentifier(Identifier $groupIdentifier){
        $this->groupIdentifier = $groupIdentifier;
    }
    function setCourseOfTherapyType(CodeableConcept $courseOfTherapyType){
        $this->courseOfTherapyType = $courseOfTherapyType;
    }
    function addInsurance(Resource $insurance){
        $this->insurance[] = $insurance->toReference();
    }
    function addNote(Annotation $note){
        $this->note[] = $note;
    }
    /* obligatorio
        \Fhir\Element\Dosage:
            "text": 
            "route": \Fhir\Element\CodeableConcept
                "coding": \Fhir\Element\Coding (array 1..*)
                    "code": 
                    "display": 
                    "system": "http://snomed.info/sct"
                "text":
            "method": \Fhir\Element\CodeableConcept
                "coding": \Fhir\Element\Coding (array 1..*)
                    "code": 
                    "display":
                    "system": "http://snomed.info/sct"
                "text":
            "doseAndRate": Array(1..*)
                "doseQuantity": 
                    "value":
                    "unit":
                    "system":
                    "code":
    */
    function addDosageInstruction(Dosage $dosageInstruction){
        $this->dosageInstruction[] = $dosageInstruction;
    }
    function setDispenseRequest(Quantity $quantity, Quantity $duration, Quantity $dispenseInterval, Period $validityPeriod, $numberOfRepeatsAllowed, Quantity $sustQuantity, Quantity $expectedSupplyDuration, Resource $performer){
        $this->dispenseRequest = [];
        if ($quantity || $duration){
            $initialFill = [];
            if ($quantity)
                $initialFill["quantity"] = $quantity;
            if ($duration)
                $initialFill["duration"] = $duration;
            if($initialFill)
                $this->dispenseRequest["initialFill"] = $initialFill;
        }
        if($dispenseInterval || $validityPeriod || $numberOfRepeatsAllowed || $quantity || $expectedSupplyDuration || $performer){
            $this->dispenseRequest["substitution"] = [];
            if (isset($dispenseInterval))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($dispenseInterval);
            if (isset($validityPeriod))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = Period::Load($validityPeriod);
            if (isset($numberOfRepeatsAllowed))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = $numberOfRepeatsAllowed;
            if (isset($quantity))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($sustQuantity);
            if (isset($expectedSupplyDuration))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($expectedSupplyDuration);
            if (isset($performer))
                $this->dispenseRequest["substitution"]["dispenseInterval"] = $performer->toReference();
        }
    }
    function setSubstitution($allowedBoolean, CodeableConcept $allowedCodeableConcept, CodeableConcept $reason){
        $this->substitution = [];
        if ($allowedBoolean)
            $this->substitution["allowedBoolean"] = $allowedBoolean;
        if ($allowedCodeableConcept)
            $this->substitution["allowedCodeableConcept"] = CodeableConcept::Load($allowedCodeableConcept);
        if ($reason)
            $this->substitution["reason"] = CodeableConcept::Load($reason);
    }
    function setPriorPrescription(Resource $priorPrescription){
        $this->priorPrescription = $priorPrescription->toReference();
    }
    function addDetectedIssue(Resource $detectedIssue){
        $this->detectedIssue[] = $detectedIssue->toReference();
    }
    function addEventHistory(Resource $eventHistory){
        $this->eventHistory[] = $eventHistory->toReference();
    }

    function toArray(){
        if(isset($this->identifier))
            foreach($this->identifier as $identifier)
                $this->identifier[] = Identifier::Load($identifier);
        if (isset($this->status))
            $this->intent = $this->intent;
        if (isset($this->statusReason))
            $this->statusReason = $this->statusReason;
        if (isset($this->intent))
            $this->intent = $this->intent;
        if (isset($this->category) && $this->category)
            foreach ($this->category as $category)
                $this->category[] = CodeableConcept::Load($category);
        if (isset($this->priority))
            $this->priority = $this->priority;
        if (isset($this->doNotPerform))
            $this->doNotPerform = $this->doNotPerform;
        if (isset($this->reportedBoolean))
            $this->reportedBoolean = $this->reportedBoolean;
        if (isset($this->reportedReference))
            $this->reportedReference = Reference::Load($this->reportedReference);
        if (isset($this->medicationCodeableConcept))
            $this->medicationCodeableConcept = CodeableConcept::Load($this->medicationCodeableConcept);
        if (isset($this->medicationReference))
            $this->medicationReference = Reference::Load($this->medicationReference);
        if (isset($this->subject))
            $this->subject = Reference::Load($this->subject);
        if (isset($this->encounter))
            $this->encounter = Reference::Load($this->encounter);
        if (isset($this->supportingInformation))
            $this->supportingInformation = Reference::Load($this->supportingInformation);
        if (isset($this->authoredOn))
            $this->authoredO = $this->authoredOn;
        if (isset($this->requester))
            $this->requester = Reference::Load($this->requester);
        if (isset($this->performer))
            $this->performer = Reference::Load($this->performer);
        if (isset($this->performerType))
            $this->performerType = CodeableConcept::Load($this->performerType);
        if (isset($this->recorder))
            $this->recorder = Reference::Load($this->recorder);
        if (isset($this->reasonCode) && $this->reasonCode)
            foreach ($this->reasonCode as $reasonCode)
                $this->reasonCode[] = CodeableConcept::Load($reasonCode);
        if (isset($this->reasonReference) && $this->reasonReference)
            foreach ($this->reasonReference as $reasonReference)
                $this->reasonReference[] = Reference::Load($reasonReference);
        if (isset($this->instantiatesCanonical) && $this->instantiatesCanonical)
            foreach ($this->instantiatesCanonical as $instantiatesCanonical)
                $this->instantiatesCanonica[] = $instantiatesCanonical;
        if (isset($this->instantiatesUri) && $this->instantiatesUri)
            foreach ($this->instantiatesUri as $instantiatesUri)
                $this->instantiatesUr[] = $instantiatesUri;
        if (isset($this->basedOn) && $this->basedOn)
            foreach ($this->basedOn as $basedOn)
                $this->basedOn[] = Reference::Load($basedOn);
        if (isset($this->groupIdentifier))
            $this->groupIdentifier = Identifier::Load($this->groupIdentifier);
        if (isset($this->courseOfTherapyType))
            $this->courseOfTherapyType = CodeableConcept::Load($this->courseOfTherapyType);
        if (isset($this->insurance) && $this->insurance)
            foreach ($this->insurance as $insurance)
                $this->insurance[] = Reference::Load($insurance);
        if (isset($this->note) && $this->note)
            foreach ($this->note as $note)
                $this->note[] = Annotation::Load($note);
        if (isset($this->dosageInstruction) && $this->dosageInstruction)
            foreach ($this->dosageInstruction as $dosageInstruction)
                $this->dosageInstruction[] = Dosage::Load($dosageInstruction);
        if (isset($this->dispenseRequest) && $this->dispenseRequest){
            $arrayData = [];
            if (isset($this->dispenseRequest->initialFill) && $this->dispenseRequest->initialFill){
                $initialFill = [];
                if (isset($this->dispenseRequest->initialFill->quantity))
                    $initialFill["quantity"] = Quantity::Load($this->dispenseRequest->initialFill->quantity);
                if (isset($this->dispenseRequest->initialFill->duration))
                    $initialFill["duration"] = Quantity::Load($this->dispenseRequest->initialFill->duration);
                if($initialFill)
                    $this->dispenseRequest["initialFill"] = $initialFill;
            }
            if(isset($this->substitution)){
                $this->dispenseRequest["substitution"] = [];
                if (isset($this->substitution->dispenseInterval))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($this->substitution->dispenseInterval);
                if (isset($this->substitution->validityPeriod))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Period::Load($this->substitution->validityPeriod);
                if (isset($this->substitution->numberOfRepeatsAllowed))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = $this->substitution->numberOfRepeatsAllowed;
                if (isset($this->substitution->quantity))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($this->substitution->quantity);
                if (isset($this->substitution->expectedSupplyDuration))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Quantity::Load($this->substitution->expectedSupplyDuration);
                if (isset($this->dispenseRequest->performer))
                    $this->dispenseRequest["substitution"]["dispenseInterval"] = Reference::Load($this->dispenseRequest->performer);
            }
        }
        if (isset($this->substitution)){
            $arrayData = [];
            if (isset($this->substitution->allowedBoolean))
                $this->substitution["allowedBoolean"] = $this->substitution->allowedBoolean;
            if (isset($this->substitution->allowedCodeableConcept))
                $this->substitution["allowedCodeableConcept"] = CodeableConcept::Load($this->substitution->allowedCodeableConcept);
            if (isset($this->substitution->reason))
                $this->substitution["reason"] = CodeableConcept::Load($this->substitution->reason);
        }
        if (isset($this->priorPrescription))
            $this->priorPrescription = Reference::Load($this->priorPrescription);
        if (isset($this->detectedIssue) && $this->detectedIssue)
            foreach ($this->detectedIssue as $detectedIssue)
                $this->detectedIssue[] = Reference::Load($detectedIssue);
        if (isset($this->eventHistory) && $this->eventHistory)
            foreach ($this->eventHistory as $eventHistory)
                $this->eventHistory[] = Reference::Load($eventHistory);
    }

}
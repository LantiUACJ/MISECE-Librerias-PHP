<?php

namespace Modulo\Resource;

use Modulo\Element\Identifier;
use Modulo\Element\Period;
use Modulo\Element\Coding;
use Modulo\Element\CodeableConcept;
use Modulo\Element\Quantity;

use Modulo\Exception\TextNotDefinedException;

class Encounter extends DomainResource{

    public function __construct(){
        $this->resourceType = "Encounter";
        parent::__construct();
        $this->identifier = [];
        $this->classHistory = [];
        $this->type = [];
        $this->episodeOfCare = [];
        $this->basedOn = [];
        $this->statusHistory = [];
        $this->participant = [];
        $this->appointment = [];
        $this->reasonCode = [];
        $this->diagnosis = [];
        $this->account = [];
    }
    public function setIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setStatus($status){
        $this->status = null;
        $only = ["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"];
        foreach($only as $word){
            if($word == strtolower($status)){
                $this->status = $status;
            }
        }
        if(!$this->status){
			throw new TextNotDefinedException("Status", implode(", ",$only));
        }
    }
    public function addStatusHistory($status, Period $period){
        $status_acepted = null;
        $only = ["planned", "arrived", "triaged", "in-progress", "onleave", "finished", "cancelled"];
        foreach($only as $word){
            if($word == strtolower($status)){
                $status_acepted = $status;
            }
        }
        if(!$status_acepted){
			throw new TextNotDefinedException("Status", implode(", ",$only));
        }
        
        $statusHistory = [
            "status"=>$status_acepted,
            "period"=>$period
        ];
        $this->statusHistory[] = $statusHistory;
    }
    public function addClassHistory(Coding $coding, Period $period){
        $classHistory = [
            "coding"=>$coding,
            "period"=>$period
        ];
        $this->classHistory[] = $classHistory;
    }
    public function setClass(Coding $class){
        $this->class = $class;
    }
    public function addType(CodeableConcept $type){
        $this->type[] = $type;
    }
    public function setServiceType(CodeableConcept $serviceType){
        $this->serviceType = $serviceType;
    }
    public function setPriority(CodeableConcept $priority){
        $this->priority = $priority;
    }
    public function setSubject(Resource $subject){
        $this->subject = $subject->toReference();
    }
    public function addEpisodeOfCare(Resource $episodeOfCare){
        $this->episodeOfCare[] = $episodeOfCare->toReference();
    }
    public function addBasedOn(Resource $basedOn){
        $this->basedOn[] = $basedOn->toReference();
    }
    public function addParticipant($types, $period, $individual){
        $participant = [];
        $participant["type"] = [];
        foreach($types as $type){
            if($type instanceOf CodeableConcept){
                $participant["type"][] = $type;
            }
        }
        $participant["period"] = $period;
        $participant["individual"] = $individual;
        $this->participant[] = $participant;
    }
    public function addAppointment(Resource $appointment){
        $this->appointment[] = $appointment->toReference();
    }
    public function setPeriod(Period $period){
        $this->period = $period;
    }
    public function setLength(Quantity $length){
        $this->length = $length;
    }
    public function addReasonCode(CodeableConcept $reasonCode){
        $this->reasonCode[] = $reasonCode;
    }
    public function addReasonReference(Resource $reasonReference){
        $this->reasonReference[] = $reasonReference->toReference();
    }
    public function addDiagnosis(Resource $condition, CodeableConcept $use, $rank){
        $data = [
            "condition"=>$condition->toReference(),
            "use"=>$use,
            "rank"=>$rank,
        ];
        $this->diagnosis[] = $data;
    }
    public function addAccount(Resource $account){
        $this->account[] = $account->toReference();
    }
    public function setHospitalization(Identifier $preAdmissionIdentifier = null, Resource $origin = null, CodeableConcept $admitSource = null, CodeableConcept $reAdmission = null, 
                                        CodeableConcept $dietPreference = null, CodeableConcept $specialCourtesy = null, CodeableConcept $specialArrangement = null,
                                        Resource $destination = null, CodeableConcept $dischargeDisposition = null
                                    ){
        if(isset($preAdmissionIdentifier)){
            $this->hospitalization["preAdmissionIdentifier"] = $preAdmissionIdentifier;
        }
        if(isset($origin)){
            $this->hospitalization["origin"] = $origin->toReference();
        }
        if(isset($admitSource)){
            $this->hospitalization["admitSource"] = $admitSource;
        }
        if(isset($reAdmission)){
            $this->hospitalization["reAdmission"] = $reAdmission;
        }
        if(isset($dietPreference)){
            $this->hospitalization["dietPreference"] = $dietPreference;
        }
        if(isset($specialCourtesy)){
            $this->hospitalization["specialCourtesy"] = $specialCourtesy;
        }
        if(isset($specialArrangement)){
            $this->hospitalization["specialArrangement"] = $specialArrangement;
        }
        if(isset($destination)){
            $this->hospitalization["destination"] = $destination->toReference();
        }
        if(isset($dischargeDisposition)){
            $this->hospitalization["dischargeDisposition"] = $dischargeDisposition;
        }
    }
    public function addLocation(Resource $location, $status, CodeableConcept $physicalType, Period $period){
        $data = [];
        $data["location"] = $location->toReference();
        $statuses = ["planned", "active", "reserved", "completed"];
        $data["status"] = $status;
        $data["physicalType"] = $physicalType;
        $data["period"] = $period;
        $this->location[] = $data;
    }
    public function setServiceProvider(Resource $serviceProvider){
        $this->serviceProvider = $serviceProvider->toReference();
    }
    public function setPartOf(Resource $partOf){
        $this->partOf = $partOf->toReference();
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        foreach($this->statusHistory as $statusHistory){
            $arrayData["statusHistory"][] = [
                "status"=>$statusHistory["status"],
                "period"=>$statusHistory["period"]->toArray()
            ];
        }
        foreach($this->classHistory as $classHistory){
            $arrayData["classHistory"][] = [
                "coding"=>$classHistory["coding"]->toArray(),
                "period"=>$classHistory["period"]->toArray(),
            ];
        }
        if(isset($this->class)){
            $arrayData["class"] = $this->class->toArray();
        }
        foreach($this->type as $type){
            $arrayData["type"][] = $type->toArray();
        }
        if(isset($this->serviceType)){
            $arrayData["serviceType"] = $this->serviceType->toArray();
        }
        if(isset($this->priority)){
            $arrayData["priority"] = $this->priority->toArray();
        }
        if(isset($this->subject)){
            $arrayData["subject"] = $this->subject->toArray();
        }
        foreach($this->episodeOfCare as $episodeOfCare){
            $arrayData["episodeOfCare"][] = $episodeOfCare->toArray();
        }
        foreach($this->basedOn as $basedOn){
            $arrayData["basedOn"][] = $basedOn->toArray();
        }
        foreach ($this->participant as $participant) {
            $types = [];
            foreach($participant["type"] as $type)
                $types[] = $type->toArray();

            $arrayData["participant"][] = [
                "type" => $types,
                "period"=>$participant["period"]->toArray(),
                "individual"=>$participant["individual"]
            ];
        }
        foreach($this->appointment as $appointment){
            $arrayData["appointment"] = $appointment->toArray();
        }
        if(isset($this->period)){
            $arrayData["period"] = $this->period->toArray();
        }
        if(isset($this->length)){
            $arrayData["length"] = $this->length->toArray();
        }
        foreach($this->reasonCode as $reasonCode){
            $arrayData["reasonCode"][] = $reasonCode->toArray();
        }
        foreach($this->reasonReference as $reasonReference){
            $arrayData["reasonReference"][] = $reasonReference->toArray();
        }
        foreach($this->diagnosis as $diagnosis){
            $arrayData["diagnosis"][] = [
                "condition"=>$diagnosis["condition"]->toArray(),
                "use"=>$diagnosis["use"]->toArray(),
                "rank"=>$diagnosis["rank"],
            ];
        }
        foreach($this->account as $account){
            $arrayData["account"] = $account->toArray();
        }
        if(isset($this->hospitalization)){
            if(isset($this->hospitalization["preAdmissionIdentifier"])){
                $arrayData["hospitalization"]["preAdmissionIdentifier"] = $this->hospitalization["preAdmissionIdentifier"]->toArray();
            }
            if(isset($this->hospitalization["origin"])){
                $arrayData["hospitalization"]["origin"] = $this->hospitalization["origin"]->toArray();
            }
            if(isset($this->hospitalization["admitSource"])){
                $arrayData["hospitalization"]["admitSource"] = $this->hospitalization["admitSource"]->toArray();
            }
            if(isset($this->hospitalization["reAdmission"])){
                $arrayData["hospitalization"]["reAdmission"] = $this->hospitalization["reAdmission"]->toArray();
            }
            if(isset($this->hospitalization["dietPreference"])){
                $arrayData["hospitalization"]["dietPreference"] = $this->hospitalization["dietPreference"]->toArray();
            }
            if(isset($this->hospitalization["specialCourtesy"])){
                $arrayData["hospitalization"]["specialCourtesy"] = $this->hospitalization["specialCourtesy"]->toArray();
            }
            if(isset($this->hospitalization["specialArrangement"])){
                $arrayData["hospitalization"]["specialArrangement"] = $this->hospitalization["specialArrangement"]->toArray();
            }
            if(isset($this->hospitalization["destination"])){
                $arrayData["hospitalization"]["destination"] = $this->hospitalization["destination"]->toArray();
            }
            if(isset($this->hospitalization["dischargeDisposition"])){
                $arrayData["hospitalization"]["dischargeDisposition"] = $this->hospitalization["dischargeDisposition"]->toArray();
            }
        }
        if(isset($this->location)){
            foreach($this->location as $location)
                $arrayData["location"][] = [
                    "location"=>$location["location"]->toArray(),
                    "status"=>$location["status"],
                    "physicalType"=>$location["physicalType"]->toArray(),
                    "period"=>$location["period"]->toArray(),
                ];
        }
        if(isset($this->serviceProvider)){
            $arrayData["serviceProvider"] = $this->serviceProvider->toArray();
        }
        if(isset($this->partOf)){
            $arrayData["partOf"] = $this->partOf->toArray();
        }
        return $arrayData;
    }
}
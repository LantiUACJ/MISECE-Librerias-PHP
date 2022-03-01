<?php 
namespace Modulo\Resource;

use Modulo\Element\Identifier;
use Modulo\Element\Coding;
//use Modulo\Element\Reference;

class ImagingStudy extends DomainResource{

    public function __construct(){
        $this->resourceType = "ImagingStudy";
        parent::__construct();
        $this->identifier = [];
        $this->modality = [];
        $this->basedOn = [];
        $this->interpreter = [];
        $this->endpoint = [];
        $this->reasonCode = [];
        $this->reasonReference = [];
        $this->note = [];
        $this->series = [];
    }
    public function setIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setStatus($status){
        $this->status = null;
        $only = ["registered", "available","cancelled","entered-in-error","unknown"];
        foreach($only as $word){
            if($word == strtolower($status)){
                $this->status = $status;
            }
        }
        if(!$this->status){
			throw new TextNotDefinedException("Status", implode(", ",$only));
        }
    }
    public function setModality(Coding $modality){
        $this->modality[] = $modality;
    }
    public function setSubject(Resource $subject){
        $this->subject = $subject->toReference();
    }
    public function setEncounter(Resource $encounter){
        $this->encounter = $encounter->toReference();
    }
    public function setStarted($started){
        $this->started = $started;
    }
    public function addBasedOn(Resource $basedOn){
        $this->basedOn[] = $basedOn->toReference();
    }
    public function setReferrer(Resource $referrer){
        $this->referrer = $referrer->toReference();
    }
    public function addInterpreter(Resource $interpreter){
        $this->interpreter[] = $interprete->toReference();;
    }
    public function addEndpoint(Resource $endpoint){
        $this->endpoint[] = $endpoint->toReference();
    }
    public function setNumberOfSeries($numberOfSeries){
        $this->numberOfSeries = $numberOfSeries;
    }
    public function setNumberOfInstances($numberOfInstances){
        $this->numberOfInstances = $numberOfInstances;
    }
    public function setProcedureReference(Resource $procedureReference){
        $this->procedureReference = $procedureReference->toReference();
    }
    public function setLocation(Reference $location){
        $this->location = $location;
    }
    public function addReasonCode(CodeableConcept $reasonCode){
        $this->reasonCode[] = $reasonCode;
    }
    public function addReasonReference(Resource $reasonReference){
        $this->reasonReference[] = $reasonReference->toReference();
    }
    public function addNote(Annotation $note){
        $this->note[] = $note;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public static function Series(){
        return new Series();
    }
    public function addSeries(Series $series){
        $this->series[] = $series;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        if(isset($this->status)){
            $arrayData["status"] = $this->status;
        }
        foreach($this->modality as $modality){
            $arrayData["modality"][] = $modality->toArray();
        }
        if(isset($this->subject)){
            $arrayData["subject"] = $this->subject->toArray();
        }
        if(isset($this->encounter)){
            $arrayData["encounter"] = $this->encounter->toArray();
        }
        if(isset($this->started)){
            $arrayData["started"] = $this->started;
        }
        foreach($this->basedOn as $baseOn){
            $arrayData["basedOn"][] = $basedOn->toArray();
        }
        if(isset($this->referrer)){
            $arrayData["referrer"] = $this->referrer->toArray();
        }
        foreach($this->interpreter as $interpreter){
            $arrayData["interpreter"][] = $interpreter->toArray();
        }
        foreach($this->endpoint as $endpoint){
            $arrayData["endpoint"][] = $endpoint->toArray();
        }
        if(isset($this->numberOfSeries)){
            $this->numberOfSeries = $numberOfSeries;
        }
        if(isset($this->numberOfInstances)){
            $this->numberOfInstances = $numberOfInstances;
        }
        if(isset($this->procedureReference)){
            $this->procedureReference = $procedureReference->toArray();
        }
        if(isset($this->location)){
            $this->location = $location->toArray();
        }
        foreach($this->reasonCode as $reasonCode){
            $arrayData["reasonCode"][] = $reasonCode->toArray();
        }
        foreach($this->reasonReference as $reasonReference){
            $arrayData["reasonReference"][] = $reasonReference->toArray();
        }
        foreach($this->note as $note){
            $arrayData["note"][] = $note->toArray();
        }
        if(isset($this->description)){
            $this->description = $description;
        }
        foreach($this->series as $series){
            $arrayData["series"][] = $series->toArray();
        }
        return $arrayData;
    }
}
class Series{

    public function __construct(){
        $this->endpoint = [];
        $this->specimen = [];
        $this->performer = [];
        $this->instance = [];
    }
    
    public function setUid($uid){
        $this->uid = $uid;
    }
    public function setNumber($number){
        $this->number = $number;
    }
    public function setModality(Coding $modality){
        $this->modality = $modality;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setNumberOfInstances(CodeableConcept $numberOfInstances){
        $this->numberOfInstances = $numberOfInstances;
    }
    public function addEndpoint(Reference $endpoint){
        $this->endpoint[] = $endpoint;
    }
    public function setBodySite(Coding $bodySite){
        $this->bodySite = $bodySite;
    }
    public function setLaterality(Coding $laterality){
        $this->laterality = $laterality;
    }
    public function addSpecimen(Reference $specimen){
        $this->specimen[] = $specimen;
    }
    public function setStarted($started){
        $this->started = $started;
    }
    public function setPerformer(CodeableConcept $function, Resource $actor){
        $performer = [
            "function"=>$function,
            "actor"=>$actor->toReference(),
        ];
        $this->performer[] = $performer;
    }
    public function addInstance($uid, $number, $title, Coding $sopClass){
        $instance = [
            "uid"=>$uid,
            "number"=>$number,
            "title"=>$title,
            "sopClass"=>$sopClass,
        ];

        $this->instance[] = $instance;
    }
    public function toArray(){
        $arrayData = [];
        if(isset($this->uid))
            $arrayData["uid"] = $uid;
        if(isset($this->number))
            $arrayData["number"] = $number;
        if(isset($this->modality))
            $arrayData["modality"] = $modality->toArray();
        if(isset($this->description))
            $arrayData["description"] = $description;
        if(isset($this->numberOfInstances))
            $arrayData["numberOfInstances"] = $numberOfInstances->toArray();
        foreach($this->endpoint as $endpoint)
            $arrayData["endpoint"][] = $endpoint->toArray();
        if(isset($this->bodySite))
            $arrayData["bodySite"] = $bodySite->toArray();
        if(isset($this->laterality))
            $arrayData["laterality"] = $laterality->toArray();
        foreach($this->specimen as $specimen)
            $arrayData["specimen"] = $specimen->toArray();
        if(isset($this->started))
            $arrayData["started"] = $started;
        if(isset($this->performer))
            $arrayData["performer"][] = [
                "actor"=>$performer->actor->toArray(),
                "function"=>$performer->function->toArray()
            ];
        if(isset($this->instance))
            $arrayData["instance"][] = [
                "uid"=>$uid,
                "number"=>$number,
                "title"=>$title,
                "sopClass"=>$sopClass->toArray(),
            ];
            

        return $arrayData;
    }
}
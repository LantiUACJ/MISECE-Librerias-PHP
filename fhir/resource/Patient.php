<?php 

namespace Modulo\Resource;

use Modulo\Element\HumanName;
use Modulo\Element\Identifier;
use Modulo\Element\ContactPoint;
use Modulo\Element\Address;
use Modulo\Element\CodeableConcept;
use Modulo\Element\attachment;
use Modulo\Element\Reference;
use Modulo\Element\Period;
use Modulo\Element\Resource;

class Patient extends DomainResource{
    public function __construct(){
        $this->resourceType = "Patient";
        parent::__construct();
        $this->name = [];
        $this->identifier = [];
        $this->telecom = [];
        $this->address = [];
        $this->contact = [];
        $this->communication = [];
        $this->generalPractitioner = [];
        $this->link = [];
    }
    public function setName(HumanName $name){
        $this->name[] = $name;
    }
    public function setIdentifier(Identifier $identifier){
        $this->identifier[] = $identifier;
    }
    public function setActive($active){
        $this->active = $active;
    }
    public function setGender($gender){
        $only = ["male", "female", "unknown", "other"];
        $this->gender = $gender;
    }
    public function setBirthDate($birthDate){
        $this->birthDate = $birthDate;
    }
    public function setDeceasedBoolean($deceasedBoolean){
        $this->deceasedBoolean = $deceasedBoolean;
    }
    public function setDeceasedDateTime($deceasedDateTime){
        $this->deceasedDateTime = $deceasedDateTime;
    }
    public function setMultipleBirthBoolean($multipleBirthBoolean){
        $this->multipleBirthBoolean = $multipleBirthBoolean;
    }
    public function setMultipleBirthInteger($multipleBirthInteger){
        $this->multipleBirthInteger = $multipleBirthInteger;
    }
    public function setTelecom(ContactPoint $telecom){
        $this->telecom[] = $telecom;
    }
    public function setAddress(Address $address){
        $this->address[] = $address;
    }
    public function setMaritalStatus(CodeableConcept $maritalStatus){
        $this->maritalStatus = $maritalStatus;
    }
    public function setPhoto(Attachment $photo){
        $this->photo = $photo;
    }
    public function setContact(CodeableConcept $relationship, HumanName $name, ContactPoint $telecom, Address $address, $gender, Resource $organization, Period $period){
        $relations = [];
        $relationship = [];
        $telecoms = [];
        $contact = [];
        foreach($relationship as $rel)
            if($rel instanceof CodeableConcept)
                $relations[] = $relationship;
        if(sizeof($relations) > 0){
            $contact["relationship"] = $relations;
        }
        $relationship["name"] = $contact->name;
        foreach($telecom as $tel)
            if($rel instanceof CodeableConcept)
                $telecoms[] = $tel;
        if(sizeof($telecoms) > 0){
            $contact["telecom"] = $telecoms;
        }
        $contact["address"] = $address;
        $only = ["male", "female", "unknown", "other"];
        $contact["gender"] = $gender; 
        $contact["organization"] = $organization->toReference();
        $contact["period"] = $period;
        $this->contact[] = $contact;
    }
    public function setCommunication(CodeableConcept $language, $preferred){
        $this->communication[] = [
            "language"=>$language,
            "preferred"=>$preferred,
        ];
    }
    public function setGeneralPractitioner(Resource $generalPractitioner){
        $this->generalPractitioner[] = $generalPractitioner->toReference();
    }
    public function setManagingOrganization(Resource $managingOrganization){
        $this->managingOrganization = $managingOrganization->toReference();
    }
    public function setLink(Resource $link){
        $this->link[] = $link->toReference();
    }

    public function toArray(){
        $arrayData = parent::toArray();

        foreach($this->name as $name){
            $arrayData["name"][] = $name->toArray();
        }
        foreach($this->identifier as $identifier){
            $arrayData["identifier"][] = $identifier->toArray();
        }
        if(isset($this->active)){
            $arrayData["active"] = $this->active;
        }
        if(isset($this->gender)){
            $arrayData["gender"] = $this->gender;
        }
        if(isset($this->birthDate)){
            $arrayData["birthDate"] = $this->birthDate;
        }
        if(isset($this->deceasedBoolean)){
            $arrayData["deceasedBoolean"] = $this->deceasedBoolean;
        }
        if(isset($this->deceasedDateTime)){
            $arrayData["deceasedDateTime"] = $this->deceasedDateTime;
        }
        if(isset($this->multipleBirthBoolean)){
            $arrayData["multipleBirthBoolean"] = $this->multipleBirthBoolean;
        }
        if(isset($this->multipleBirthInteger)){
            $arrayData["multipleBirthInteger"] = $this->multipleBirthInteger;
        }
        foreach($this->telecom as $telecom){
            $arrayData["telecom"][] = $telecom->toArray();
        }
        foreach($this->address as $address){
            $this->address[] = $address->toArray();
        }
        if(isset($this->maritalStatus)){
            $arrayData["maritalStatus"] = $this->maritalStatus->toArray();
        }
        if(isset($this->photo)){
            $arrayData["photo"] = $photo->toArray();
        }
        foreach($this->contact as $contact){
            $relations = [];
            $relationship = [];
            $telecoms = [];
            $contact = [];
            foreach($contact["relationship"] as $rel)
                $relations[] = $relationship;
            if(sizeof($relations) > 0){
                $contact["relationship"] = $relations;
            }
            $relationship["name"] = $contact->name;
            foreach($telecom as $tel)
                if($rel instanceof CodeableConcept)
                    $telecoms[] = $tel;
            if(sizeof($telecoms) > 0){
                $contact["telecom"] = $telecoms;
            }
            $contact["address"] = $address;
            $only = ["male", "female", "unknown", "other"];
            $contact["gender"] = $gender; 
            $contact["organization"] = $organization;
            $contact["period"] = $period;
            $this->contact[] = $contact;
        }
        foreach($this->communication as $communication){
            $arrayData["communication"][] = [
                "language"=>$communication["language"],
                "preferred"=>$communication["preferred"],
            ];
        }
        foreach($this->generalPractitioner as $generalPractitioner){
            $this->generalPractitioner[] = $generalPractitioner->toArray();
        }
        if(isset($this->managingOrganization)){
            $arrayData["managingOrganization"] = $managingOrganization->toArray();
        }
        foreach($this->link as $link){
            $arrayData["link"][] = $link->toArray();
        }
        return $arrayData;
    }
}

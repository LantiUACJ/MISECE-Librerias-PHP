<?php

namespace Modulo\Element;

use Modulo\Resource\Resource;

use Modulo\Exception\TextNotDefinedException;

class Identifier extends Element{
	private $usecode = ["usual","official","temp","secondary","old"];

	public function __construct($use, $value, CodeableConcept $type = null){
        parent::__construct();
		$this->use = "";
		$this->setUse($use);
		$this->setValue($value);
		if($type) $this->setType($type);
	}

	public function setUse($use){
		foreach($this->usecode as $code){
			if(strtolower($use) == $code){
				$this->use = strtolower($use);
			}
		}
		if(!$this->use)
			throw new TextNotDefinedException("USE", implode(", ",$this->usecode));
	}
	public function setSystem($system){
		$this->system = $system;
	}
	public function setPeriod(Period $period){
		$this->period = $period;
	}
	public function setAssigner(Resource $assigner){
		$this->assigner = $assigner->toReference();
	}
	public function setType(CodeableConcept $type){
		$this->type = $type;
	}
	public function setValue($value){
		$this->value = $value;
	}
	public function toArray(){
        $arrayData = parent::toArray();
		
		$arrayData["use"] = $this->use;
		$arrayData["value"] = $this->value;

		if(isset($this->type)) $arrayData["type"] = $this->type->toArray();

		return $arrayData;
	}
}
?>

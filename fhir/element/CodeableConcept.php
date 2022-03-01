<?php
namespace Modulo\Element;

class CodeableConcept extends Element{

    public function __construct($text, Coding $coding = null){
        parent::__construct();
        $this->coding = [];
        $this->setText($text);
        if($coding) $this->addCoding($coding);
    }
    public function addCoding(Coding $coding){
        $this->coding[] = $coding;
    }
    public function setText($text){
        $this->text = $text;
    }
    public function toArray(){
        $arrayData = parent::toArray();
        $arrayData["text"] = $this->text;
        if(sizeof($this->coding) > 0){
            foreach($this->coding as $coding)
                $arrayData["coding"][] = $coding->toArray();
        }
        return $arrayData;
    }
}
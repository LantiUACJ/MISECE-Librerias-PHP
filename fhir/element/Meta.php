<?php

namespace Modulo\Element;

class Meta extends Element{
    public function __construct(){
        parent::__construct();
        $this->profile=[];
        $this->security=[];
        $this->tag=[];
    }
    public function setversionId($versionId){
        $this->versionId = $versionId;
    }
    public function setlastUpdated($lastUpdated){
        $this->lastUpdated = $lastUpdated;
    }
    public function setsource($source){
        $this->source = $source;
    }
    public function addprofile($profile){
        $this->profile[] = $profile;
    }
    public function addsecurity(Coding $security){
        $this->security[] = $security;
    }
    public function addtag(Coding $tag){
        $this->tag[] = $tag;
    }

    public function toArray(){
        $arrayData = parent::toArray();

        if(isset($versionId)){
            $this->versionId = $versionId;
        }
        if(isset($lastUpdated)){
            $this->lastUpdated = $lastUpdated;
        }
        if(isset($source)){
            $this->source = $source;
        }
        foreach($this->profile as $profile){
            $this->profile[] = $profile;
        }
        foreach($this->security as $security){
            $this->security[] = $security->toArray();
        }
        foreach($this->tag as $tag){
            $this->tag[] = $tag->toArray();
        }
    }
}


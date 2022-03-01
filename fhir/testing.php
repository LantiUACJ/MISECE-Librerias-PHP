<?php

use Modulo\Element\Address;
use Modulo\Element\Identifier;
use Modulo\Element\Period;
use Modulo\Element\Coding;
use Modulo\Element\CodeableConcept;
use Modulo\Element\Quantity;
use Modulo\Element\Attachment;
use Modulo\Element\HumanName;
use Modulo\Resource\DiagnosticReport;
use Modulo\Resource\Patient;
use Modulo\Resource\ImagingStudy;
use Modulo\Resource\Bundle;

$data = [];
/*
$diag = new DiagnosticReport();
$diag->setDisplay("Diagnostic Report test");*/
/*
$diag2 = new DiagnosticReport();

$encounter = new Modulo\Resource\Encounter();
$diag->setId("Custom ID");
$diag->addIdentifier(new Identifier("official","tesing", new CodeableConcept("Advanced", new Coding("coding","123"))));
$diag->addBasedOn($encounter);
$diag->setStatus("partial");
$diag->addCategory(new CodeableConcept("Advanced", new Coding("coding","321")));
$diag->setCode(new CodeableConcept("Code", new Coding("Dog","123")));
$diag->setSubject($encounter);
$diag->setEncounter($encounter);
$diag->setEffectiveDateTime("2020-01-01");
$diag->setEffectivePeriod(new Period("2020-01-01","2020-01-01"));
$diag->setIssued("texto");
$diag->addPerformer($encounter);
$diag->addResultsInterpreter($encounter);
$diag->addSpecimen($encounter);
$diag->addResult($encounter);
$diag->addImagingStudy($encounter);
$diag->addMedia("Información", $encounter);
$diag->setConclusion("Error de cálculo");
$diag->addConclusionCode(new CodeableConcept("Error", new Coding("coding","81741")));
$ata = new Attachment();

$ata->setContentType("UTF-8/TEXT");
$ata->setLanguage("ES");
$ata->setData("Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugiat quis nemo placeat libero deserunt, explicabo quam doloremque amet consequatur dolor, quas odio neque! Ullam fuga reprehenderit iste quia velit perspiciatis!");
$ata->setUrl("http://lorem.ipsum.com");
$ata->setSize("300kb");
$ata->setHash("????");
$ata->setTitle("Lorem Ipsum");
$ata->setCreation("TEST");

$diag->addPresentedForm($ata);


$encounter->addContained($diag);

$encounter->setIdentifier(new Identifier("official","Encotype333"));
$encounter->setStatus("finished");
$encounter->addStatusHistory("finished", new Period("2020-01-01","2021-01-01"));
$encounter->addClassHistory(new Coding("Cita Rutinaria","RJ9000"), new Period("2021-01-02","2021-09-01"));
$encounter->addStatusHistory("planned", new Period("2021-01-02","2021-09-01"));
$encounter->addClassHistory(new Coding("Cita Rutinaria","RJ9000"), new Period("2021-01-02","2021-09-01"));
$encounter->setClass(new Coding("Class God","Class00931"));
$encounter->addType(new CodeableConcept("Visita Rutinaria"));
$encounter->setServiceType(new CodeableConcept("xPress"));
$encounter->setPriority(new CodeableConcept("Low"));

$encounter->setSubject($diag);
$encounter->addEpisodeOfCare($diag2);
$encounter->addEpisodeOfCare($diag2);
$encounter->addBasedOn($diag2);
$encounter->addBasedOn($diag2);
$encounter->addParticipant([new CodeableConcept("Doctor"), new CodeableConcept("Patient")], new Period("2021-01-02","2021-09-01"), "El gato cosmico");
$encounter->addAppointment($diag2);
$encounter->setPeriod(new Period("2020-01-01","2020-01-01"));
$encounter->setLength(new Quantity("3","HOURS"));

$encounter->addReasonCode(new CodeableConcept("Reason 1"));
$encounter->addReasonCode(new CodeableConcept("Reason 2"));
$encounter->addReasonCode(new CodeableConcept("Reason 3"));

$encounter->addReasonReference($diag2);
$encounter->addReasonReference($diag2);
$encounter->addReasonReference($diag2);
$encounter->addDiagnosis($diag2, new CodeableConcept("Official"), "Rank #1");

$encounter->addAccount($diag2);

$encounter->setHospitalization(new Identifier("official","AdmissionIdentifier03193"), $diag2, new CodeableConcept("Fuente de admisión"), new CodeableConcept("Re-admición"),new CodeableConcept("diata preferencial"), new CodeableConcept("cortesia especial"), new CodeableConcept("Arreglo especial"), $diag2, new CodeableConcept("Disposición de descarga"));
$encounter->addLocation($diag2,"Old", new CodeableConcept("Fisical Type"), new Period("2020-01-01","2020-01-01"));
$encounter->addLocation($diag2,"Actual", new CodeableConcept("Fisical Type"), new Period("2020-01-01","2020-01-01"));
$encounter->setServiceProvider($diag2);
$encounter->setPartOf($diag2);*/ 
/*
$img = new ImagingStudy();

$img->setIdentifier(new Identifier("official","Encotype333"));
$img->setStatus("registered");
$img->setModality(new Coding("modality-1","modality-00931"));
$img->setModality(new Coding("modality-2","modality-00931"));
$img->setSubject($diag);

use Modulo\Resource\Medication;
$medication = new Medication();

use Modulo\Resource\MedicationAdministration;
$medicationadmin = new MedicationAdministration();

use Modulo\Resource\Observation;
$observation = new Observation();

use Modulo\Resource\Patient;
$patient = new Patient();

use Modulo\Resource\Practitioner;
$practitioner = new Practitioner();

use Modulo\Resource\Procedure;
$Procedure = new Procedure();

$data = [
    //"encounter" => $encounter->toArray(),
    "img"=>$img->toArray(),
    "medication"=>$medication->toArray(),
    "medicationadmin"=>$medicationadmin->toArray(),
    "observation"=>$observation->toArray(),
    "patient"=>$patient->toArray(),
    "practitioner"=>$practitioner->toArray(),
    "Procedure"=>$Procedure->toArray(),
];

echo json_encode($data);
*/

$p = new Patient();
$p->setGender("Male");
$p->setActive("true");
$a = new Address();
$a->setCity("Juárez");
$a->setPostalCode("32380");
$a->setCountry("México");
$a->setPeriod(new Period("01-01-1990", "now"));
$p->setAddress($a);

$dr = new DiagnosticReport();
$dr->addCategory(new CodeableConcept("Hola"));
$dr->setSubject($p);

$bundle = new Bundle();
$h = new HumanName();
$h->setText("Paciente Hecho en PHP");
$p->setName($h);
$bundle->addEntry($p);
$bundle->addEntry($dr);

echo json_encode($bundle->toArray());
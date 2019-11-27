<?php
require 'GumballMachine.php';
class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof1
    private $nom1="XXX1";
    private $prenom1="YYY1";
    private $date_naissance1="1980-09-29";
    private $lieu_naissance1="ZZZ1";
    //prof2
    private $nom2="XXX2";
    private $prenom2="YYY2";
    private $date_naissance2="1981-10-30";
    private $lieu_naissance2="ZZZ2";
    //prof3
    private $nom3="XXX3";
    private $prenom3="YYY3";
    private $date_naissance3="1982-12-31";
    private $lieu_naissance3="ZZZ3";
    //prof4
    private $nom4="XXX4";
    private $prenom4="YYY4";
    private $date_naissance4="1985-12-31";
    private $lieu_naissance4="ZZZ4";
    // cours1
    private $intitule1="IOT";
    private $duree1="10";
    private $id_prof1="XXX2 YYY2";
    // cours2        /*� completer*/
    private $intitule2="IA";
    private $duree2="12";
    private $id_prof2="XXX1 YYY1";
    // cours3
    private $intitule3="C++";
    private $duree3="18";
    private $id_prof3="XXX3 YYY3";
    // cours4
    private $intitule4="EDL";
    private $duree4="30";
    private $id_prof4="XXX3 YYY3";
    // Pour update
    // cours5
    private $intitule5="C++";
    private $duree5="30";        /*� completer*/

    private $id_prof5="XXX3 YYY3";


    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }

    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }        /*� completer*/

    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom1,$this->prenom1,$this->date_naissance1,$this->lieu_naissance1));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom2,$this->prenom2,$this->date_naissance2,$this->lieu_naissance2));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom3,$this->prenom3,$this->date_naissance3,$this->lieu_naissance3));
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom4,$this->prenom4,$this->date_naissance4,$this->lieu_naissance4));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+4,$max__id2);
    }

    public function testAffichageProfAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Insertion of Professors"));
    }


    public function testAffichageCoursAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
    }

    public function testInsertC()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule1,$this->duree1,$this->gumballMachineInstance->GetIdP($this->nom2,$this->prenom2)));
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule2,$this->duree2,$this->gumballMachineInstance->GetIdP($this->nom1,$this->prenom1)));
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule3,$this->duree3,$this->gumballMachineInstance->GetIdP($this->nom3,$this->prenom3)));
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule4,$this->duree4,$this->gumballMachineInstance->GetIdP($this->nom3,$this->prenom3)));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+4,$max__id2);
    }

    public function testAffichageCoursAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Insertion of Courses"));
    }
    /*
    public function testUpdateP()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->UpdateP($this->gumballMachineInstance->getDB(), $this->nom4,$this->prenom4,$this->date_naissance4,"Liverpool", $this->gumballMachineInstance->GetIdP($this->nom3,$this->prenom3)));
    }
    public function testAffichageProfAPU()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Update of Professors"));
    }
    public function testDProf()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->deleteP($this->gumballMachineInstance->getDB(), $this->gumballMachineInstance->GetIdP($this->nom4,$this->prenom4)));
    }*/
    public function testUpdateC()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->UpdateC($this->gumballMachineInstance->getDB(), $this->intitule3,"30",$this->gumballMachineInstance->GetIdP($this->nom3, $this->prenom3)));
        $this->assertEquals(true, $this->gumballMachineInstance->UpdateC($this->gumballMachineInstance->getDB(), $this->intitule4,"55",$this->gumballMachineInstance->GetIdP($this->nom3, $this->prenom1)));

    }


    public function testAffichageCoursAPU()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Update of Courses"));
    }

    public function testDCours()
    {
        $this->assertEquals(true, $this->gumballMachineInstance->deleteC($this->gumballMachineInstance->getDB(), $this->intitule2));
    }

    public function testAffichageCoursAPD()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Delete of Courses"));
    }

}
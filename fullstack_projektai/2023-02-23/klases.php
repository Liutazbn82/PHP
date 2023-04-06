<?php

class Klase {
    // savybės
    public $savybe = 'labas posaule!';

    // konstantos aprasymas
    const URL = 'https://google.com';

    // prieigos modifikatoriai (access modificators)
    // public - viešas prieinamumas
    // private
    // protected

    // automatiskai inicijuojamas metodas po klases paleidimo
    function __construct($hello) {
        if($hello)
            $this->savybe = $hello;
    }

    // Metodai

    public function funkcija() {
        $this->savybe = 'Paskaita vyksta!';
    }
    
    public function adresas() {
        // self raktazodis nurodo kreipimasi i klase
        // Scope resolution operatorius - "::"
        return file_get_contents(self::URL);
    }
}

// new Klase('veikia'); // skliauteliai rodo perduodamus argumentus

// klases issaukimas ir (instance) grazinimas
$klase = new Klase('konstruktorius veikia'); // galima priskirti prie kintamojo
$klase1 = new Klase(false); // galima priskirti prie kintamojo
$klase2 = new Klase('trecias variantas'); // galima priskirti prie kintamojo

// savybes iskvietimas vykdomas su arrow operatoriumi
echo $klase ->savybe;

// metodo ishkvietimas
echo $klase->funkcija();

// Konstantos sugrazinimas is klases
echo '<br/>' . Klase::URL;
echo '<br/>' . $klase::URL;

// Google duomenu paemimas
// echo $klase->adresas();

// echo '<pre>';
// var_dump($klase);
// var_dump($klase1);
// var_dump($klase2);

// Statinės savybės ir metodai
echo '<h3>Statines savybes ir metodai</h3>';

class StatineKlase {
    // Inkapsuliacija - duomenu slepimas, nes klaseje patalpinti duomenys neprieinami globaliam scope
    // statine savybe
    public static $vardas = '<h4>Nerijus</h4>';
    // statinis metodas
    public static function keistiVarda() {
        // pakeiciu savybes reiksme
        // StatineKlase::$vardas = '<h4>Adomas</h4>'; pakeiciam 'self'
        self::$vardas = '<h4>Adomas</h4>';
    }

    public $pavarde;

    public function __construct($pavarde) {
        $this->pavarde = $pavarde;
    }
}

echo StatineKlase::$vardas; // Atvaizdavimas. Vardas be dolerio zenklo kreipiasi i konstanta

StatineKlase::keistiVarda();

echo StatineKlase::$vardas; 

StatineKlase::$vardas =  '<h4>Giedrius</h4>';

$klase1 = new StatineKlase('Petraitis');
$klase2 = new StatineKlase('Adomaitis');
$klase3 = new StatineKlase('Jonaitis');

echo '<pre>';
var_dump($klase1);
var_dump($klase2);
var_dump($klase3);

$klase1::$vardas = '<h4>Alisa</h4>';

echo $klase1::$vardas;
echo StatineKlase::$vardas;
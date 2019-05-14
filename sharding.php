<?php

class Persona
{
    private $dni;
    private $nombre;
    private $email;
    private $telefono;

    public function __construct($dni, $nombre, $email, $telefono)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;

    }
    public function getDni()
    {
        return $this->dni;
    }
    public function getName()
    {
        return $this->nombre;
    }


}

class DB
{
    private $dbs;

    public function __construct()
    {
        $this->dbs = [];
    }
    public function addDb()
    {
        $this->dbs[] = [];
    }
    public function llenarDb($personas)
    {
        $mod = count($this->dbs);
        foreach($personas as $k => $v){
            $this->dbs[$v->getDni() % $mod][$v->getDni()] = $v;
        }

        
    }
    public function addDbAndResharding($cantServidoresAgregados)
    {
        for($i = 0; $i < $cantServidoresAgregados; $i++){
            $this->dbs[] = [];
        }
        $mod = count($this->dbs);
        foreach($this->dbs as $k => $db){
            foreach($db as $l => $persona){
                if($persona->getDni() % $mod != $k){
                    $this->dbs[$persona->getDni() % $mod][$persona->getDni()] = $persona;
                    unset($this->dbs[$k][$l]);
                    

                }
                
            }
        }
    }
    public function imprimirBases(){
        foreach($this->dbs as $k => $v){
            echo 'Base[' . $k . "]\n";
            foreach($v as $l => $w){
                echo $w->getDni() . ', '. $w->getName() . "\n";
            }
            echo "\n"; 
        }
    }
}

$personas = [
    new Persona(10, 'pepe', 'pepe@gmail', 116677780),
    new Persona(11, 'toto', 'toto@gmail', 116677789),
    new Persona(12, 'cacho', 'cacho@gmail', 116577787),
    new Persona(13, 'tito', 'tito@gmail', 116687788),
    new Persona(14, 'carlos', 'carlos@gmail', 116637788),
    new Persona(15, 'tete', 'tete@gmail', 116674788),
    new Persona(16, 'beto', 'beto@gmail', 116676788),
    new Persona(17, 'lolo', 'lolo@gmail', 116679788),
];

$db = new DB();
$db->addDb();
$db->addDb();
$db->addDb();
$db->llenarDb($personas);
$db->imprimirBases();
echo '---------------------------';
echo "\n";
$db->addDbAndResharding(1);
$db->imprimirBases();

//var_dump($db);


<?php

require_once "../Controladores/seccionesC.php";
require_once "../Modelos/seccionesM.php";

class SeccionesA{

    public $Sid;

    public function AgregarArchivoA(){

        $columna = "id";
        $valor= $this->Sid;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);

        echo json_encode($resultado);

    }

    

    

}

class SeccionesV{

    public $Sidv;

    public function AgregarVideoV(){

        $columna = "id";
        $valor= $this->Sidv;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);

        echo json_encode($resultado);

    }


}

class SeccionesY{

    public $Sidy;

    public function VideoYV(){

        $columna = "id";
        $valor= $this->Sidy;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);

        echo json_encode($resultado);

    }


}

class SeccionesI{

    public $Sidi;

    public function AgregarImagenI(){

        $columna = "id";
        $valor= $this->Sidi;

        $resultado = SeccionesC::VerSeccionesC($columna, $valor);

        echo json_encode($resultado);

    }


}


if (isset($_POST["Sid"])) {
    
    $a = new SeccionesA();
    $a -> Sid = $_POST["Sid"];
    $a -> AgregarArchivoA();
    
}

if (isset($_POST["Sidv"])) {
    
    $a = new SeccionesV();
    $a -> Sidv = $_POST["Sidv"];
    $a -> AgregarVideoV();
    
}

if (isset($_POST["Sidy"])) {
    
    $a = new SeccionesY();
    $a -> Sidy = $_POST["Sidy"];
    $a -> VideoYV();
    
}

if (isset($_POST["Sidi"])) {
    
    $a = new SeccionesI();
    $a -> Sidi = $_POST["Sidi"];
    $a -> AgregarImagenI();
    
}
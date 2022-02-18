<?php

require_once "ConexionBD.php";

class InicioM extends ConexionBD{

    static public function VerInicioM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = 1");

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    static public function GuardarDescripcionM($tablaBD, $descripcion){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET descripcion = :descripcion WHERE id = 1");

        $pdo -> bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    static public function GuardarManualProfesorM($tablaBD, $pdf){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET manualProfesor = :pdf WHERE id = 1");

        $pdo -> bindParam(":pdf", $pdf, PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;

        
    }

    static public function GuardarManualEstudianteM($tablaBD, $pdf){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET manualEstudiante = :pdf WHERE id = 1");

        $pdo -> bindParam(":pdf", $pdf, PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;

        
    }





}
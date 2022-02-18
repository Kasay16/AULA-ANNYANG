<?php

require_once "ConexionBD.php";

class GradosM extends ConexionBD{

    static public function CrearGradoM($tablaBD, $grado){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");
        
        $pdo -> bindParam(":nombre", $grado, PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    static public function VerGradosM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;

    }

    static public function EditarGradoM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = $id");

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;

    }


    static public function ActualizarGradoM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nombre = :nombre WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["grado"], PDO::PARAM_STR);

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    static public function BorrarGradoM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");

        if($pdo->execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
        
    }


}
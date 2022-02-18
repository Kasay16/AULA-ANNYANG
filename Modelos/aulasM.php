<?php

require_once "ConexionBD.php";

class AulasM extends ConexionBD{

    static public function CrearAulaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (materia, id_grado, id_profesor) VALUES (:materia, :id_grado, :id_profesor)");

        $pdo -> bindParam(":materia", $datosC["materia"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_grado", $datosC["id_grado"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_profesor", $datosC["id_profesor"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }


    static public function VerAulasM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;
        
    }

    static public function VerAulas2M($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;
        
    }




    static public function BorrarAulaM($tablaBD, $id){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = $id");

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;


    }


    static public function SolicitarAulaM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (materia, id_profesor, observaciones, estado) VALUES (:materia, :id_profesor, :observaciones, :estado)");

        $pdo -> bindParam(":materia", $datosC["materia"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_profesor", $datosC["id_profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":observaciones", $datosC["observaciones"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;

    }

    static public function VerSolicitudesM($tablaBD){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;

    }


    static public function VerSM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;
        
    }

    
    static public function ActualizarEstadoSM($tablaBD, $datosC){

        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

        if ($pdo -> execute()) {
            return true;
        }

        $pdo -> close();
        $pdo = null;
        
    }



}
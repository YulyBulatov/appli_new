<?php

function connexion()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=appli_new", "root", "", array(
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die;
      
    }

    return $db;
}

function findAll(){

    $db = connexion();

        $stmt = $db->prepare("SELECT * FROM appli");
        $stmt->execute();
        foreach($stmt as $row){
            print_r($row);
        }
    

}

function findOneById($id){

    $db = connexion();

        $stmt = $db->prepare("SELECT * FROM appli WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return print_r($stmt);
    

}

function insertProduct($name, $descr, $price){

    $db = connexion();

        $stmt = $db->prepare("INSERT INTO appli (name, description, price) VALUES (name=:name, description=:descr, price=:price");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':descr', $descr);
        $stmt->bindParam(':price', $price);
        $stmt->execute();

}




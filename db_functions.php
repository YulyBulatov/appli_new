<?php

function connexion()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=appli_new", "root", "root", array(
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
     
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

}

function findOneById($id){

    $db = connexion();

        $stmt = $db->prepare("SELECT * FROM appli WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
    

}

function insertProduct($name, $descr, $price){

    $db = connexion();

        $stmt = $db->prepare("INSERT INTO appli (name, description, price) VALUES (:name, :descr, :price)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':descr', $descr);
        $stmt->bindValue(':price', $price);
        $stmt->execute();
        $id_produit = $db->lastInsertId();
        $message ="Le produit id ".$id_produit." a été ajouté"; 

        echo $message;

}




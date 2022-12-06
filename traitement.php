<?php
    session_start();
    require_once "db_functions.php";

    if(isset($_GET['action'])){

        switch($_GET['action']){

            case "add":

                $produits = findOneById($_GET['id']);
                $qtt = 1;

                foreach ($produits as $produit){
                
                        $product = [
                            "name"  => $produit['name'],
                            "price" => $produit['price'],
                            "qtt"   => $qtt,
                            "total" => $produit['price']*$qtt
                        ];

                    $_SESSION['products'][] = $product;
                    $_SESSION["message"] = "Produit enregistré avec succès !";
                    

                }

                header("Location:index.php");

                break;


            case "add_new":

                

                if(isset($_POST['submit'])){

                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                    if($name && $price && $desc){

                        insertProduct($name, $desc, $price);
                    }

                }

                $index = $_SESSION["id"];

                header("Location:product.php?id=$index");

                break;

            case "delete":

                unset($_SESSION['products'][$_GET['id']]);

                header("Location:recap.php");

                break;

            case "delete_all":

                unset($_SESSION['products']);

                header("Location:recap.php");

                break;

            case "qtt_up":

                ++$_SESSION['products'][$_GET['id']]['qtt'];

                header("Location:recap.php");

                break;

            case "qtt_down":

                --$_SESSION['products'][$_GET['id']]['qtt'];

                if($_SESSION['products'][$_GET['id']]['qtt'] == 0){

                    unset($_SESSION['products'][$_GET['id']]);

                }

                header("Location:recap.php");

                break;

        }
        
    }



    
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'baza1';
    $tablename = 'tabela1';

    $connection = mysqli_connect($servername,$username,$password,$dbname);

    if(!$connection){
        die('Connection failed: '.mysqli_connection_error());
    };
    
    $postac = $_POST['postac'];
    $poziom = $_POST['poziom'];
    $rasa = $_POST['rasa'];
    $klasa = $_POST['klasa'];
    $swiat = $_POST['swiat'];

    $sql_show = "SELECT * FROM $tablename WHERE postac = $postac";
    $sql_update ="UPDATE $tablename SET postac = $postac , poziom = $poziom , rasa = $rasa, klasa = $klasa , swiat = $swiat WHERE postac = $postac ";
    $sql_delete = "DELETE FROM $tablename WHERE postac = $postac";
    $sql_add = "INSERT INTO $tablename(`postac`, `poziom`,`rasa`,`klasa`,`swiat` VALUES ($postac,$poziom,$rasa,$klasa,$swiat)";



    if(filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING) == 'add'){
        if(mysqli_query($connection,$sql_add)){
            echo 'added succesfully';
        } else {
            echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) + "')<script>";
        }
    }elseif(filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING == 'update'){
        if(mysqli_query($connection,$sql_update)){
            echo ' updated succesfully';
        } else {
            echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) + "')<script>";
        }
    }elseif(filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING == 'show'){
        if($result = mysqli_query($connection,$sql_show)){
            foreach $result as $row {
                echo $row;
            }
        }else{
            echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) + "')<script>";
        }
    }elseif(filter_input(INPUT_POST, 'select', FILTER_SANITIZE_STRING == 'delete'){
        if(mysqli_query($connection,$sql_delete)){
            echo 'deleted succesfully';
        }else{
            echo "<script>console.log('Error: " . $sql . "<br>" . mysqli_error($conn) + "')<script>";
        }
    }else {
        echo 'Imput all the information about your charakter';
    }
?>

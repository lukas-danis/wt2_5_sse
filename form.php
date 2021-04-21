<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['val'])) {
    if(empty($_POST['val'])){
        $val = 1;
    }else{
        $val = $_POST['val'];
    }
    require_once "Database.php";

    $conn = (new Database())->createConnection();
    $stmt = $conn->prepare("DELETE FROM sendVal");
    $stmt->execute();
    // $stmt = $conn->prepare("INSERT INTO sendVal (value) VALUES (:value)");
    $stmt = $conn->prepare("INSERT INTO sendVal (value, check1, check2, check3) VALUES (:value, :check1, :check2, :check3)");
    $stmt->bindParam(':value', $val);
    $true = 1;
    $false = 0;
    if(isset($_POST['check1'])){
        $stmt->bindParam(':check1',$true);
    }
    else{
        $stmt->bindParam(':check1',$false);
    }

    if(isset($_POST['check2'])){
        $stmt->bindParam(':check2',$true);
    }
    else{
        $stmt->bindParam(':check2',$false);
    }

    if(isset($_POST['check3'])){
        $stmt->bindParam(':check3',$true);
    }
    else{
        $stmt->bindParam(':check3',$false);
    }
    // $stmt->bindParam(':check2', $_POST['check2']);
    // $stmt->bindParam(':check3', $_POST['check3']);
    $stmt->execute();
}
header("Location: index.php");

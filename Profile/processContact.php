<?php
session_start();
include_once('../database.php');

if(isset($_SESSION['logged_in']) && $_SESSION['user_id'] 
&& $_SESSION['user_email'] && $_SESSION['logged_in'] == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $ID = $_SESSION['user_id'];
        $Email = $_SESSION['user_email'];
        //if(isset($_POST['Address']) && isset($_POST['Postcode']) && 
        //isset($_POST['City']) && isset($_POST['State']) && 
        //isset($_POST['Phone']) ) {

            $Address = $_POST['Address'];
            $Postcode = $_POST['Postcode'];
            $City = $_POST['City'];
            $State = $_POST['State'];
            $Phone = $_POST['Phone'];

            $sql = "UPDATE `contacttable` SET `Address`='$Address', `Postcode`='$Postcode', 
            `City`='$City', `State`='$State', 
            `Phone`='$Phone' WHERE `ID`='$ID'";

            try{
            $updateValue = $pdo->prepare($sql);
            $updateValue -> execute();
            header("Location:../Profile/updateContact.php?action=updateContactSuccessful");
            

            }catch (Exception $e){
                echo "Error: " . $e;
            }
        //}
}
}
?>
<?php
session_start();
include_once('../database.php');

if(isset($_SESSION['logged_in']) && $_SESSION['user_id'] 
&& $_SESSION['user_email'] && $_SESSION['logged_in'] == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $ID = $_SESSION['user_id'];
        //if(isset($_POST['Faculty']) && isset($_POST['Course']) && 
        //isset($_POST['EntryYear']) && isset($_POST['Duration']) && 
        //isset($_POST['Mode']) ) {

            $Faculty = $_POST['Faculty'];
            $Course = $_POST['Course'];
            $EntryYear = $_POST['EntryYear'];
            $Duration = $_POST['Duration'];
            $Mode = $_POST['Mode'];

            $sql = "UPDATE `academictable` SET `Faculty`='$Faculty', `Course`='$Course', 
            `EntryYear`='$EntryYear', `Duration`='$Duration', 
            `Mode`='$Mode' WHERE `ID`='$ID'";

            try{
            $updateValue = $pdo->prepare($sql);
            $updateValue -> execute();
            header("Location:../Profile/updateAcademic.php?action=updateAcademicSuccessful");
            

            }catch (Exception $e){
                echo "Error: " . $e;
            }
        //}
}
}
?>
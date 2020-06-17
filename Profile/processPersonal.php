<?php
session_start();
include_once('../database.php');

//$image = $_FILES["ProfilePicture"]["name"];
//$imgContent = addslashes(file_get_contents($image));

if(isset($_SESSION['logged_in']) && $_SESSION['user_id'] 
&& $_SESSION['user_email'] && $_SESSION['logged_in'] == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $ID = $_SESSION['user_id'];
        if(isset($_POST['Name']) && isset($_POST['NewMatrics']) ){
        //if(!empty($_FILES["ProfilePicture"]["name"]) && 
        //isset($_POST['Name']) && isset($_POST['NewMatrics']) && 
        //isset($_POST['IC']) && isset($_POST['Nationality']) && 
        //isset($_POST['Gender']) && isset($_POST['Birthday']) &&
        //isset($_POST['Race']) && isset($_POST['Religion']) &&
        //isset($_POST['Marital'])) {
            //$ProfilePicture = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

            //$ProfilePicture = $_POST['ProfilePicture'];
            $image = $_FILES["ProfilePicture"]["tmp_name"];
            $imgContent = addslashes(file_get_contents($image));
            $Name = $_POST['Name'];
            $NewMatrics = $_POST['NewMatrics'];
            $IC = $_POST['IC'];
            $Nationality = $_POST['Nationality'];
            $Gender = $_POST['Gender'];
            $Birthday = $_POST['Birthday'];
            $Race = $_POST['Race'];
            $Religion = $_POST['Religion'];
            $Marital = $_POST['Marital'];

            $sql = "UPDATE `personaltable` SET `ProfilePicture`='$imgContent', 
            `IC`='$IC', `Nationality`='$Nationality', 
            `Gender`='$Gender', `Birthday`='$Birthday', 
            `Race`='$Race', `Religion`='$Religion', 
            `Marital`='$Marital', `NewMatrics`='$NewMatrics' 
            WHERE `ID`='$ID'";
            $sql1 = "UPDATE `user` SET `Name`='$Name' WHERE `ID`='$ID'";

            try{
            $updateValue = $pdo->prepare($sql);
            $updateValue1 = $pdo->prepare($sql1);
            $updateValue -> execute();
            $updateValue1 -> execute();
            header("Location:../Profile/updatePersonal.php?action=updatePersonalSuccessful");
            

            }catch (Exception $e){
                echo "Error: " . $e;
            }
        }
//}
}
}
?>
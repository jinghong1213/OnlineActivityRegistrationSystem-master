<?php
session_start();
include_once('../database.php');

if(isset($_SESSION['logged_in']) && $_SESSION['user_id'] 
&& $_SESSION['user_email'] && $_SESSION['logged_in'] == true){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $ID = $_SESSION['user_id'];
        if(isset($_POST['password']) && isset($_POST['newpassword'])
        && isset($_POST['repeatpassword']) ){

            $Password = $_POST['password'];
            $newPassword = $_POST['newpassword'];

            $passwordCheck = "SELECT * FROM `user` WHERE `ID`='$ID'";
            $stmt = $pdo->prepare($passwordCheck);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $hashPassword = $row['Password'];
            }
            $verify = validatePassword($Password,$hashPassword);
            if($verify == true){
                $salt = "roA&h2u!PoaWr2u";
                $hash = hash("sha256", $newPassword . $salt);
                $sql = "UPDATE `user` SET `Password`='$hash' WHERE `ID`='$ID'";

                try{
                    $stmt = $pdo->prepare($sql);
                    $stmt -> execute();
                    header("Location:../Profile/changePassword.php?action=passwordChanged");
                }catch (Exception $e){
                    echo "Error: " . $e;
                }
            }else{
                header("Location:../Profile/changePassword.php?action=invalidPassword");
            }
            $pdo = null;

        }
//}
}
}
function validatePassword($Password, $hashPassword){
    $salt = "roA&h2u!PoaWr2u";

    $password = hash("sha256", $Password . $salt);

    if ($password == $hashPassword) {
    //if(password_verify($Password,$hashPassword)){
        return true;
    } else {
        return false;
    }
}
?>
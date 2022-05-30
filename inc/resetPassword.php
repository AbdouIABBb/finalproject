<?php
    require "functions.php";

    function generateAndSendCode($email){
        require "mail.php";
        $code = rand(100000,999999);
        $conn=connect();
        $requette ="UPDATE user SET code = '$code' WHERE email = '$email'";
        $resultat = $conn ->query($requette);
        if($resultat){
            $message = "Bonjour, votre code de confirmation est : ".$code;
            if(mailTo($email,"Code de confirmation",$message)){
                $_SESSION['reset'] = $email;
                return true;
            }
        }
        return false;
    }

    function confirmCode($email,$code){
        $conn=connect();
        $requette ="SELECT * FROM user WHERE email = '$email' AND code = '$code'";
        $resultat = $conn ->query($requette);
        if($resultat->rowCount() == 1){
            $requette ="UPDATE user SET code = '' WHERE email = '$email'";
            $resultat = $conn ->query($requette);
            return true;
        }
        unset($_SESSION['reset']);
        return false;

    }

    function modifyPassword($data){
        $conn=connect();
        $email = $_SESSION['reset'];
        if($data['password'] == $data['passwordCF']){
            $password = md5($data['password']);
            $requette ="UPDATE user SET password = '$password' WHERE email = '$email'";
            $resultat = $conn ->query($requette);
            unset($_SESSION['reset']);
            return true;
        }
    }
?>
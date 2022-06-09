<?php
    session_start();
    require "../inc/functions.php";

    if(isset($_POST['modifier'])){
        $data=[
            'email'=>$_SESSION['email'],
            'tel'=> $_POST['tel'],
            'ancien' => $_POST['ancienMP'],
            'nouveau' => $_POST['nouveauMP'],
            'confirmer' => $_POST['confirmerMP']
            ];
        if(empty($data['tel']) && empty($data['ancien']) && empty($data['nouveau']) && empty($data['confirmer'])){
            $_SESSION['message'] = "Il y'a rien a modifier";
            header("Location: ../profile.php");
            die();
        }
        $user = checkIfUserExists($data['email']);
        if(empty($data['tel'])) $data['tel'] = $user['telephone'];
        if(empty($data['ancien'])){
            $data['password'] = $user['password'];
            modifierProfile($data);
            $_SESSION['success'] = "les information on ete modifier avec succes";
            header("Location: ../profile.php");
        }else{
            if(md5($data['ancien']) == $user['password']){
                if(!empty($data['nouveau']) && !empty($data['confirmer'])){
                    if($data['nouveau'] == $data['confirmer']){
                        $data['password'] = md5($data['nouveau']);
                        if(modifierProfile($data)){
                            $_SESSION['success'] = "les information on ete modifier avec succes";
                            header("Location: ../profile.php");
                        }
                    }else{
                        $_SESSION['message'] = "New password and confirm password don't match";
                        header("Location: ../profile.php");
                    }
                }else{
                    $_SESSION['message'] = "Remplir tous les champs";
                    header("Location: ../profile.php");
                }
            }else{
                $_SESSION['message'] = "Ancien mot de passe incorrect";
                header("Location: ../profile.php");
            }
        }

    }

?>
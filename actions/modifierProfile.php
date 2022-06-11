<?php
    session_start();
    require "../inc/functions.php";

    if(isset($_POST['modifier-profile'])){
        $data=[
            'email'=>$_POST['email'],
            'tel'=> $_POST['tel'],
            'nom' => $_POST['nom'],
            'prenom'=> $_POST['prenom'],
            'email-condition'=> $_SESSION['email']
            ];
        if(empty($data['tel']) && empty($data['email']) && empty($data['nom']) && empty($data['prenom'])){
            $_SESSION['message'] = "Il y'a rien a modifier";
            header("Location: ../profile.php");
            die();
        }
        $user = checkIfUserExists($_SESSION['email']);
        if(empty($data['tel'])) $data['tel'] = $user['telephone'];
        if(empty($data['email'])){
            $data['email'] = $user['email']; 
        }else{
            $_SESSION['email'] = $data['email'];
        }
        if(empty($data['nom'])) $data['nom'] = $user['nom'];
        if(empty($data['prenom'])) $data['prenom'] = $user['prenom'];
        if(modifierProfile($data)){
            echo "good";
            die();
        }else{
            echo "bad";
            die();
        }

    }

    if(isset($_POST['modifier-pass'])){
        $data=[
            'ancien'=>$_POST['ancien'],
            'nouveau'=> $_POST['nouveau'],
            'confirmer' => $_POST['confirmer'],
            'email-condition'=> $_SESSION['email']
            ];
        $user = checkIfUserExists($_SESSION['email']);
        if(empty($data['ancien'])){
            $data['password'] = $user['password'];
            modifierPass($data);
            $_SESSION['success'] = "les information on ete modifier avec succes";
            header("Location: ../profile.php");
        }else{
            if(md5($data['ancien']) == $user['password']){
                if(!empty($data['nouveau']) && !empty($data['confirmer'])){
                    if($data['nouveau'] == $data['confirmer']){
                        $data['password'] = md5($data['nouveau']);
                        if(modifierPass($data)){
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
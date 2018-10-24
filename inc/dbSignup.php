<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 01.10.2018
     * Time: 20:29
     */

    if (!isset($_POST['fname'])) {

        header("Location: ../signup.php");
        exit();
    }else {
        // todo KM: Fix the utf8

        $first = htmlspecialchars($_POST['fname']);
        $last = htmlspecialchars($_POST['lname']);
        $mail = htmlspecialchars($_POST['mail']);
        $username = $_POST['username'];
        $pw1 = $_POST['pwd1'];
        $pw2 = $_POST['pwd2'];
        $hPwd="";


        //todo KM: checke die gültigkeit der Namen:

        if(!preg_match('/^[a-zA-ZäÄöÖßüÜ]{2,}$/',$first)){
            header("Location: ../signup.php?error=e8");
            exit();
        }elseif (!preg_match('/^[a-zA-ZäÄöÖßüÜ]{2,}$/',$last)){
            header("Location: ../signup.php?error=e7");
            exit();
        }

        //todo KM: checke die gültigkeit der mailadresse:

        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=e6");
            exit();

        }

        if(!($pw1==$pw2)//PasswordMatch
        ){
            header("Location: ../signup.php?error=e5");
            exit();
        }else{
            //todo:KM Hier musst du noch einen passenden Regex finden
            //^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$
            // Passwort mit mindestens 8 Zeichen, mindestend ein kleingeschriebenes und ein grossgeschriebenes Zeichen und eine Ziffer
            //http://www.lehrling.biefer.com/andere/regexp.php
            //^[a-zA-Z0-9]{6,30}$

            if(!preg_match('/^.*(?=.{6,30})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/',$pw1)){


                header("Location: ../signup.php?error=e4");
                exit();

            }else{
                $hPwd = password_hash($pw1,PASSWORD_DEFAULT);

                //echo password_verify($pw1,$hPwd);
                //todo KM: check ob der username bereits vergeben ist
                include_once("../helper/ddb.php");
                try {
                    $check = $db->prepare("select * from `user` where u_uid = ?");
                    $check->execute(array($username));
                    $uresult = $check->fetch(PDO::FETCH_ASSOC);
                }catch (Exception $e){
                    header("Location: ../signup.php?error=e10");
                    exit();
                }
                if (isset($uresult['u_uid'])){
                    header("Location: ../signup.php?error=e9");
                    exit();
                }else {


                    //Upload der Userdaten

                    try {
                        $insert = $db->prepare("INSERT INTO `user` (`u_first`, `u_last`, `u_uid`, `u_mail`, `u_pwd`) VALUES (?, ?, ?, ?, ?)");

                        $insert->execute(array($first, $last, $username, $mail, $hPwd));
                    }catch(Exception $e){
                        header("Location: ../signup.php?error=e10");
                        exit();
                    }

                    header("Location: ../index.php?status=SignupSuccess");
                }
            }

        }
    }









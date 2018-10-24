<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 24.09.2018
     * Time: 22:06
     */

session_start();

    if(!isset($_POST['submit'])) {

        header("Location: login.php?error=unsetInput");
        exit();


    }else{
        if($_POST['username']=="" & $_POST['pwd']=="") {
            header("Location: login.php?error=unsetInput");
            exit();
        }else{
            $iUser = $_POST['username'];
            $iPwd = $_POST['pwd'];

            include_once("ddb.php");
            try {
                $loginQuery = $db->prepare("Select * from `user` where u_uid =?");
                $loginQuery->execute(array($iUser));
                $uresult = $loginQuery->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                header("Location: ../login.php?error=dbError");
                exit();
            }

            $dbUid = $uresult['u_id'];
            $dbUfirst = $uresult['u_first'];
            $dbUlast = $uresult['u_last'];
            $dbUusername = $uresult['u_uid'];
            $dbUmail = $uresult['u_mail'];
            $dbUpwd= $uresult['u_pwd'];
            $dbStatus=$uresult['ustatus'];
            $dbTimeCreated=$uresult['U-timeCreated'];


            //todo KM: Noch den Verified status implementieren
           $isValid= password_verify($iPwd,$dbUpwd);
           if (!$isValid){
               header("Location: ../login.php?error=invalidPassword");
               exit();

           }else{

               $_SESSION['uID']=$dbUid;
               $_SESSION['username']=$dbUusername;
               $_SESSION['firstName']=$dbUfirst;
               $_SESSION['lastName']=$dbUlast;
               $_SESSION['mail']=$dbUmail;
               $_SESSION['isValidated']=$dbStatus;
               $_SESSION['cTime']=$dbTimeCreated;

               header("Location: ../index.php");
               exit();
           }


        }
    }

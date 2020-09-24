<?php
/**
 * Created by PhpStorm.
 * User: dries
 * Date: 24/09/2020
 * Time: 11:19
 */
if(!empty($_POST)){
    if($_POST["firstname"] ==""||$_POST["lastname"]==""||$_POST["email"]==""||$_POST["subject"]==""){
        echo "Vul alle velden in...";
    }else{
        $email=$_POST['email'];
        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
        $email= filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email){
            echo "Ongeldig email adres";
        }
        else{
            $subject = "YD-Binnenhuis Contact";
            $message = $_POST['subject'];
            $headers = 'From:'. $email . "rn";
            $headers .= 'Cc:'. $email . "rn";
            $message = wordwrap($message, 70);
            mail("driesvandievoort8@gmail.com", $subject, $message, $headers);
            echo "Jouw mail is succesvol verstuurd, bedankt om contact met ons op te nemen!";
            echo $subject;
            echo $message;
            echo $headers;
        }
    }
}
?>
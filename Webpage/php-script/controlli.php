<?php

function desc($rec,&$erroreR,&$errore){
    if (!preg_match("/([a-zA-Zèàéòù0-9]+[ ]*[ \.;,:!\-\?'&#]{0,1}[ ]*)+$/",$rec)) {
                  $erroreR = "Scrivi una recensione sensata";
                  $errore=true;
                  
              }
}

function sostituzione(&$testo){
                  $testo=addslashes($testo);
                  $testo = str_replace ("à", "&agrave;", $testo);
                  $testo = str_replace ("è", "&egrave;", $testo);
                  $testo = str_replace ("è", "&eacute;", $testo);
                  $testo = str_replace ("ì", "&igrave;", $testo);
                  $testo = str_replace ("ò", "&ograve;", $testo);
                  $testo = str_replace ("ù", "&ugrave;", $testo);
}

function prezzo($p){
    if (!preg_match("/^[0-9]+$/",$p)) {
        return true;
    }
    return false;
}

function nomeProdotto($nome){
    if (!preg_match("/^[a-zA-Z0-9èòàì ]+$/",$nome)) {
        return true;
    }
    return false;
}

function descProdotto($desc){
    if(!preg_match("/^([a-zA-Zèàéòù]+[ ]*[ \.;,:!\-\?'&#]{0,1}[ ]*)+$/",$desc)) {
        return true;
    }
    return false;
}

function nomeBundle($nome){
    if (!preg_match("/^[a-zA-Z]+$/",$nome)) {
        return true;
    }
    return false;
}

function checkLength($str){
    $l=strlen($str);
    if($l<6 || $l>20){
        return true;
    }
    return false;
}

function checkUsername($user){
    if(!preg_match("/^[a-zA-Z0-9]*$/",$user)) {
        return true;
    }
    return false;
}

function checkPassword($pass){
    if(!preg_match("/^[a-zA-Z0-9@#\$\%\&\-]+$/",$pass)) {
        return true;
    }
    return false;
}

function checkMail($mail){
    if(!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]{2,3}$/",$mail)) {
        return true;
    }
    return false;
}



    

    
?>
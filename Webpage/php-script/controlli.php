<?php

function desc($rec,&$erroreR,&$errore){
    if (!preg_match("/^([a-zA-Zèàéòù]+[ \.;,:!\-\?'&#]*)+$/",$rec)) {
                  $erroreR = "solo lettere e spazi possono essere inseriti in questo campo";
                  $errore=true;
                  
              }
}

function sostituzione(&$testo){
                  $testo=addslashes($testo);
                  $testo = str_replace ("à", "&agrave", $testo);
                  $testo = str_replace ("è", "&egrave", $testo);
                  $testo = str_replace ("è", "&eacute", $testo);
                  $testo = str_replace ("ì", "&igrave", $testo);
                  $testo = str_replace ("ò", "&ograve", $testo);
                  $testo = str_replace ("ù", "&ugrave", $testo);
}

function prezzo($p){
    if (!preg_match("/^[0-9]+$/",$p)) {
        return true;
    }
    return false;
}

function nomeProdotto($nome){
    if (!preg_match("/^[a-zA-Z0-9èòàì]+$/",$nome)) {
        return true;
    }
    return false;
}

function descProdotto($desc){
    if(!preg_match("/^([a-zA-Zèàéòù]+[ \.;,:!\-\?']*)+$/",$desc)) {
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
    if(!preg_match("/^[a-zA-Z0-9èàéòù]+$/",$user)) {
        return true;
    }
    return false;
}

function checkPassword($pass){
    if(!preg_match("/^[a-zA-Z0-9èàéòù@#\$\%\&\-]+$/",$pass)) {
        return true;
    }
    return false;
}



    

    
?>
<?php

function desc($rec,&$erroreR,&$errore){
    if (!preg_match("/^([a-zA-Zèàéòù]+[ \.;,:!\-\?'&#]*)+$/",$rec)) {
                  $erroreR = "solo lettere e spazi possono essere inseriti in questo campo";
                  $errore=true;
                  
              }
}

function sostituzione(&$testo){
                  $testo=htmlspecialchars($testo);
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
        return 'errore';
    }
    return 'ok';
}

function nomeProdotto($nome){
    if (!preg_match("/^[a-zA-Z0-9]+$/",$nome)) {
        return 'errore';
    }
    return 'ok';
}

function descProdotto($desc){
    if(!preg_match("/^([a-zA-Zèàéòù]+[ \.;,:!\-\?']*)+$/",$desc)) {
        return 'errore';
    }
    return 'ok';
}



    

    
?>
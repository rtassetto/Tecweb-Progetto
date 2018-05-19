<?php

function desc($rec,&$erroreR,&$errore){
    if (!preg_match("/^[a-zA-Z'èà,.; ]*$/",$rec)) {
                  $erroreR = "solo lettere e spazi possono essere inseriti in questo campo";
                  $errore=true;
                  
              }
}

function sostituzione(&$testo){
                  $testo=addslashes($testo);
                  $testo = str_replace ("à", "&agrave", $testo);
                  $testo = str_replace ("è", "&egrave", $testo);
                  $testo = str_replace ("ì", "&igrave", $testo);
                  $testo = str_replace ("ò", "&ograve", $testo);
                  $testo = str_replace ("ù", "&ugrave", $testo);
}

function prezzo(&$p){
    if (!preg_match("/123456789/",$p)) {
        return 'errore';
    }
    return 'ok';
}


    

    
?>
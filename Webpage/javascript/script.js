function validazioneForm() {
    var nome = document.getElementById("nome").valueOf;
    var specializzazione = document.getElementById("specializzazione");
    var qi = document.getElementById("qi");
    var descrizione = document.getElementById("descrizione");
    
    var corretto = checkNome(nome.va);
    var rispec = checkspec(specializzazione);
    var risqi = checkqi(qi);
    var risdesc = checkdesc(descrizione);
    corretto = corretto && rispec && risqi && risdesc;
    return corretto;
}

function checkUser() {
    var nomeinserito = document.getElementById("username").value;
    var pattern = new RegExp("^[a-zA-Z0-9]+$");
    if(pattern.test(nomeinserito)){
       document.getElementById("usernameerr").innerHTML="";
    }
    if(!pattern.test(nomeinserito)|| nomeinserito.length<6 ){
        //mostra errore
        document.getElementById("usernameerr").innerHTML="l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri";
    }
    /*if(nomeinserito.length>6){document.getElementById("usernameerr").innerHTML="";}
    else{document.getElementById("usernameerr").innerHTML="l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri";}*/
}



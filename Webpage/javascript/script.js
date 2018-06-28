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
    if(!pattern.test(nomeinserito)|| nomeinserito.length<6 || nomeinserito.length>20){
        //mostra errore
        document.getElementById("usernameerr").innerHTML="l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri";
    }
}

function checkPass(){
    var pass = document.getElementById("password").value;
    var pattern = new RegExp("^[a-zA-Z0-9@#\$\%\&\-]+$");
    if(!pattern.test(pass)|| pass.length<6 || pass.length>20){
        document.getElementById("passerr").innerHTML="l'username può contenere solo lettere e numeri deve essere lungo tra i 6 e i 20 caratteri";
    }
    else{document.getElementById("passerr").innerHTML="";}
}

function checkMail(){
    var mail = document.getElementById("email").value;
    var pattern = new RegExp("^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]{2,3}$")
    if(!pattern.test(mail)){
        document.getElementById("passerr").innerHTML="inserisci una email corretta";
    }
    else{document.getElementById("passerr").innerHTML="";}
}



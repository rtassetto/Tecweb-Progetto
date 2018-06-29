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
        document.getElementById("passerr").innerHTML="la password deve essere lunga tra i 6 e i 20 caratteri e non può contenere spazi";
    }
    else{document.getElementById("passerr").innerHTML="";}
}

function checkMail(){
    var mail = document.getElementById("email").value;
    var pattern = new RegExp("^[a-zA-Z0-9]+@[a-zA-Z]+\.[a-z]{2,3}$")
    if(!pattern.test(mail)){
        document.getElementById("emailerr").innerHTML="inserisci una email corretta";
    }
    else{document.getElementById("emailerr").innerHTML="";}
}

function checkRec(){
    var rec = document.getElementById("rec").value;
    var pattern = new RegExp("^([a-zA-Zèàéòù0-9]+[ ]*[ \.;,:!\-\?'&#]{0,1}[ ]*)+$");
    if(!pattern.test(rec)){
        document.getElementById("descerr").innerHTML="Scrivi una recensione sensata";
    }
    else{document.getElementById("descerr").innerHTML="";}
}

function checkDesc(){
    var desc = document.getElementById("descrizione").value;
    var pattern = new RegExp("^([a-zA-Zèàéòù]+[ ]*[ \.;,:!\-\?'&#]{0,1}[ ]*)+$");
    if(!pattern.test(desc)){
        document.getElementById("descerr").innerHTML="La descrizione non è corretta";
    }
    else{document.getElementById("descerr").innerHTML="";}
}

function checkNome(){
    var nome = document.getElementById("nome").value;
    var pattern = new RegExp("^[a-zA-Z0-9èòàì ]+$");
    if(!pattern.test(nome)){
        document.getElementById("nomeerr").innerHTML="Il nome può contenere solo lettere e valori numerici";
    }
    else{document.getElementById("nomeerr").innerHTML="";}
}

function checkPrezzo(){
    var prezzo = document.getElementById("prezzo").value;
    var pattern = new RegExp("^[0-9]+$");
    if(!pattern.test(prezzo)){
        document.getElementById("prezzoerr").innerHTML="Il prezzo dev'essere un valore numerico";
    }
    else{document.getElementById("prezzoerr").innerHTML="";}
}

function checkBundle(){
    var nome = document.getElementById("nome").value;
    var pattern = new RegExp("^[a-zA-Z]+$");
    if(!pattern.test(nome)){
        document.getElementById("nomeerr").innerHTML="il nome può contenere solo lettere e non può avere spazi";
    }
    else{document.getElementById("nomeerr").innerHTML="";}
}

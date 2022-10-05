function check_name_surname() {
    var name = document.getElementById("nome").value;
    var surname = document.getElementById("cognome").value;
    var ep = /^[A-Z][a-z]+$/;

    if (!ep.test(name)) {
        document.getElementById("err_name").innerHTML = "Nome non corretto. Ricordarsi di inserire la prima lettera maiuscola!";
        return false;
    }
    if (!ep.test(surname)) {
        document.getElementById("err_surname").innerHTML = "Cognome non corretto. Ricordarsi di inserire la prima lettera maiuscola!";
        return false;
    } else {
        document.getElementById("err_name").innerHTML = "";
        document.getElementById("err_surname").innerHTML = "";
    }
    return true;
}

function check_email() {
    var email = document.getElementById("e-mail").value;
    var ep = /^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})/;

    if (!ep.test(email)) {
        document.getElementById("err_email").innerHTML = "E-mail non corretta";
        return false;
    } else document.getElementById("err_email").innerHTML = "";
    return true;
}

function check_password() {
    var password = document.getElementById("password").value;
    var ep = /.{8,}/;

    if (!ep.test(password)) {
        document.getElementById("err_password").innerHTML = "Password non corretta";
        return false;
    } else document.getElementById("err_password").innerHTML = "";
    return true;
}

function check_confirm() {
    var confirm = document.getElementById("conferma-password").value;
    var password = document.getElementById("password").value;

    if (confirm != password) {
        document.getElementById("err_confirm").innerHTML = "Password e conferma password non sono uguali";
        return false;
    } else document.getElementById("err_confirm").innerHTML = "";
    return true;
}

function registration() {
    if (check_name_surname() && check_email() && check_password() && check_confirm()) {
        return true;
    } else return false;
}

function login() {
    if (check_email() && check_password()) {
        return true;
    } else
        return false;
}
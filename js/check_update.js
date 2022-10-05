function modify() {
    var name = document.getElementById("nome").value;
    var surname = document.getElementById("cognome").value;
    var email = document.getElementById("e-mail").value;
    var password = document.getElementById("password").value;

    var e = /^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})/;
    var ns = /[A-Z][a-z]+/;
    var p = /.{8,}/;

    if (name != "") {
        if (!ns.test(name)) {
            window.alert("Nome non corretto. Ricordarsi di inserire la prima lettera maiuscola!");
            return false;
        }
    }
    if (surname != "") {
        if (!ns.test(surname)) {
            window.alert("Cognome non corretto. Ricordarsi di inserire la prima lettera maiuscola!");
            return false;
        }
    }
    if (email != "") {
        if (!e.test(email)) {
            window.alert("E-mail non corretta");
            return false;
        }
    }
    if (password != "") {
        if (!ep.test(password)) {
            window.alert("Password non corretta");
            return false;
        }
    }
    return true;
}
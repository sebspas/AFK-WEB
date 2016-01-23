var lastid = 0;
//var instanceOn = false;

function getMessages(instanceOn) {
    if (instanceOn === false ) {
        instanceOn = true;
        $.ajax({
            url : "asset/traitement/tchat.php", // on donne l'URL du fichier de traitement
            type : "GET", 
            data : {action: "recup", lastid:lastid}, // et on envoie nos données
            dataType: 'json',
            success: function (data) { 
                if (data.erreur != "ok") {
                    alert(data.erreur);
                }
                else {
                    $('#messages').append(data.result);
                    lastid = data.lastid;
                }
                if(data.offline) {
                    clearInterval(timer);
                }
            }
        });
        instanceOn = false;
    }
}

function o() {
    this.instanceOn = false;
    this.get = getMessages(this.instanceOn);
}

var instance = new o();
var timer = setInterval(instance.get,2500);

$('#envoi').click(function(e){
    e.preventDefault(); // on empêche le bouton d'envoyer le formulaire
    clearInterval(timer);
    var message = $('#message').val();

    if(message != ""){ // on vérifie que les variables ne sont pas vides
        $.ajax({
            url : "asset/traitement/tchat.php", // on donne l'URL du fichier de traitement
            type : "GET", 
            data : {action: "send", message: message}, // et on envoie nos données
            dataType: 'json',
            success: function (data) { 
                if (data.erreur != "ok") {
                    alert(data.erreur);
                }
                $('#message').val('');
                instance.get;
            }
        });

    }
});



  

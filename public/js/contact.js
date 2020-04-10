$(document).ready(function(){
    $('#msg-envoi').delay(3000).slideUp(function(){
        $.ajax({
            url: '/public/ajax/unset.php', // appel ajax pour éviter les répétitions de notif dans l'admin
            type: 'GET',
            success: function(reponse) {
                console.log(reponse)
            }
        })
    })

    $('#msg-erreurs').delay(6000).slideUp(function(){
        $.ajax({
            url: '/public/ajax/unset.php', // appel ajax pour éviter les répétitions de notif dans l'admin
            type: 'GET',
            success: function(reponse) {
                console.log(reponse)
            }
        })
    })
})
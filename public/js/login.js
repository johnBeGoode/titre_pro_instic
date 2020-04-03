$(document).ready(function(){
    $('#msg-success').delay(3000).slideUp(function(){
        $.ajax({
            url: '/public/ajax/unset.php', // appel ajax pour éviter les répétitions de notif dans l'admin
            type: 'GET',
            success: function(reponse) {
                console.log(reponse)
            }
        })
    })

    $('#msg-error').delay(3000).slideUp(function(){
        $('form').show()
        $.ajax({
            url: '/public/ajax/unset.php', // appel ajax pour éviter les répétitions de notif dans l'admin
            type: 'GET',
            success: function(reponse) {
                console.log(reponse)
            }
        })
    })
})
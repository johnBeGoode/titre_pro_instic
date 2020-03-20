$(function(){

    $('.notif').slideDown(500,function(){
        $('.notif').first().delay(2000).fadeOut(2000, function suivante() {
            $(this).next('.notif').delay(2000).fadeOut(2000,suivante);
        })
        ajaxDeleteNotifsSession()
    }).css("display","flex");

    function ajaxDeleteNotifsSession(){
        $.ajax({
            url: 'public/ajax/unset.php',
            type: 'GET',
            success: function(reponse, statut) {
                console.log(reponse)
            },
            error: function (resultat, statut, erreur) {
                alert('appel ajax échoué')
            }
        })
    }

    
})
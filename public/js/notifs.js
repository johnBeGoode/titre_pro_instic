$(function(){
    /*
   $('.notif').delay(3000).slideUp(function(){
        $.ajax({
            url: 'public/ajax/unset.php', // ../../controllers/function
            type: 'GET',
            // dataType: 'script',
            success: function(reponse, statut) {
                console.log(reponse)
            },
            error: function (resultat, statut, erreur) {
                alert('appel ajax échoué')
            }
        })
    })
    */
    

   $('.notif').each(function(){
        $(this).slideDown(500,function(){
            $('.notif').first().delay(2000).fadeOut(2000, function suivante() {
                $(this).next('.notif').delay(2000).fadeOut(2000,suivante);
            })
        }).css("display","flex");
    });
    
})
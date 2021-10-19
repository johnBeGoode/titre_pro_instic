$(document).ready(function(){

    function hideNotifAjax(){
        $.ajax({
            url: '/public/ajax/unset.php',
            type: 'GET',
            success: function(reponse) {
                console.log(reponse)
            }
        })
    }

    $('#msg-success').delay(3000).slideUp(hideNotifAjax)
    $('#msg-erreurs').delay(6000).slideUp(hideNotifAjax)
    $('#msg-envoi').delay(3000).slideUp(hideNotifAjax)
    $('#msg-error').delay(3000).slideUp(function() {
        $('form').show()
        hideNotifAjax()
    })


    // $('#msg-success').delay(3000).slideUp(function(){
    //     $.ajax({
    //         url: '/public/ajax/unset.php',
    //         type: 'GET',
    //         success: function(reponse) {
    //             console.log(reponse)
    //         }
    //     })
    // })

    // $('#msg-erreurs').delay(6000).slideUp(function(){
    //     $.ajax({
    //         url: '/public/ajax/unset.php',
    //         type: 'GET',
    //         success: function(reponse) {
    //             console.log(reponse)
    //         }
    //     })
    // })

    // $('#msg-envoi').delay(3000).slideUp(function(){
    //     $.ajax({
    //         url: '/public/ajax/unset.php',
    //         type: 'GET',
    //         success: function(reponse) {
    //             console.log(reponse)
    //         }
    //     })
    // })

    // $('#msg-error').delay(3000).slideUp(function(){
    //     $('form').show()
    //     $.ajax({
    //         url: '/public/ajax/unset.php',
    //         type: 'GET',
    //         success: function(reponse) {
    //             console.log(reponse)
    //         }
    //     })
    // })
})
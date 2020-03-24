$(document).ready(function() {

    $('a.delete').click(function(e) {
        let valid = confirm('Voulez-vous vraiment supprimer l\'élément choisi?')
        if (!valid) {
            e.preventDefault()
        }
    })

    $('.button-add-content').click(function(e) {
        if ($('form').is(":hidden")) {
            $('form').slideDown(500);
        }
        else {
            $('form').slideUp(500);
        }
    })

    // windox.location renvoie les informations concernant l'url de la page
    // La propriété search renvoie le ? ainsi que les paramètres situés après le ? de l'url
    let pageParams = window.location.search
    // let regExp = new RegExp('(?:page=articles){1}[a-z 1-9 = &]*(?:update=[0-9]+)')
    // ?: signifie parenthèses non capturantes
    let regExp = new RegExp('(?:page=[a-z]+&){1}(?:action=update&)(?:id=[0-9]+)')
    // On compare l'url avec l'expression régulière et s'il y a page=articles et update = "un chiffre" alors on cache le bouton et on affiche le formulaire
    if (pageParams.match(regExp)) {
        $('button').hide()
        $('form').show(500)
    }

    $('input[type=reset]').click(function(e) {
        $('form').hide(500)
        $('button').show(500)
        // On enlève le paramètre update de l'url pour enlever les informations des champs
        let pageParams = window.location.search
        let regExp = new RegExp('&action=update&id=[0-9]+')
        let newUrl = pageParams.replace(regExp, '')
        document.location.href = newUrl
        $.ajax({
            url: '/public/ajax/unsetSessionInputsWithCancel.php',
            type: 'GET'
        })
   })

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
$(document).ready(function() {

    $('a.delete').click(function(e) {
        let valid = confirm('Voulez-vous vraiment supprimer l\'élément choisi?')
        if (!valid) {
            e.preventDefault()
        }
    })

    $('.button-add-content').click(function(e) {
        if ($('.bg-my-modal').is(":hidden")) {
            $('.bg-my-modal').fadeIn(600, function() {
                $('.my-modal').slideDown(500);
            });
        }
    })

    // windox.location renvoie les informations concernant l'url de la page
    // La propriété search renvoie le ? ainsi que les paramètres situés après le ? de l'url
    let pageParams = window.location.search
    // let regExp = new RegExp('(?:page=movies){1}[a-z 1-9 = &]*(?:update=[0-9]+)')
    // ?: signifie parenthèses non capturantes
    let regExp = new RegExp('(?:page=[a-z]+&){1}(?:action=update&)(?:id=[0-9]+)')
    // On compare l'url avec l'expression régulière et s'il y a page=movies et update = "un chiffre" alors on cache le bouton et on affiche le formulaire
    if (pageParams.match(regExp)) {
        // $('button').hide()
        // $('bg-my-modal').fadeIn(500)
        // Réexécute le clic de button-add-content (refait le code des lignes 10 à 16)
        $('.button-add-content').trigger('click')
    }

    $('input[type=reset]').click(function(e) {
        e.preventDefault()
        $('.my-modal').slideUp(500, function() {
            $('.bg-my-modal').fadeOut(600, function() {
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
        })
   })
})
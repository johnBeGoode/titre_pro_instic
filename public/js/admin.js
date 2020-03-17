$(document).ready(function() {

    $('a.delete').click(function(e) {
        let valid = confirm('Voulez-vous vraiment supprimer le film?')
        if (!valid) {
            e.preventDefault()
        }
    })

    $('#button-add-content').click(function(e) {
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
   let regExp = new RegExp('(?:page=articles){1}[a-z 1-9 = &]*(?:update=[0-9]+)')
    // On compare l'url avec l'expression régulière et s'il y a page=articles et update = "un chiffre" alors on cache le bouton et on affiche le formulaire
   if (pageParams.match(regExp)) {
       $('button').hide()
       $('form').show(500)
   }
})
$(document).ready(function() {
    $('a.delete').click(function(e) {
        let valid = confirm('Voulez-vous vraiment supprimer le film?')
        if (!valid) {
            e.preventDefault()
        }
    })
})
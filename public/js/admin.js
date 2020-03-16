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

    $('.update').click(function(e) {
        $('button').hide()
        $('form').show()
    })
})
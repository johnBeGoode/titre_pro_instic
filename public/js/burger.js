$(document).ready(function() {
    $('#menu-burger').click(function() {
        $('#menu').slideToggle(500)
    })

    $(window).resize(function(){
        if (window.matchMedia("(min-width: 780px)").matches) {
            $('#menu').show()
        } 
        else {
            $('#menu').hide()
        }
    })
})
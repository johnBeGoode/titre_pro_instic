$(document).ready(function() {

    $(".btn-trailer").click(function(e){
        // Pas nécessaire de stopper la propagation ici
        e.stopPropagation();
        $(this).parents("article").find(".trailer").slideDown(500);        
    });
    
    $("html").click(function(){
        $(".trailer").slideUp(500);
    });
    
})
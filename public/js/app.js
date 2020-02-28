$(document).ready(function() {

    $(".btn-trailer").click(function(e){
        e.stopPropagation();
        $(this).parents("article").find(".trailer").slideDown(500);        
    });
    
    $("html").click(function(){
        $(".trailer").slideUp(500);
    });
    
})
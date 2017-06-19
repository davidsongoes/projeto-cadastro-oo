window.setTimeout(function() {
    $("#alert-success").slideDown("slow");
    $("#alert-success").slideUp("slow", function(){
        $(this).remove();
    });
}, 3000);
window.setTimeout(function() {
    $("#alert-danger").slideDown("slow");
    $("#alert-danger").slideUp("slow", function(){
        $(this).remove();
    });
}, 3000);
window.setTimeout(function() {
    $("#alert-warning").slideDown("slow");
    $("#alert-warning").slideUp("slow", function(){
        $(this).remove();
    });
}, 3000);
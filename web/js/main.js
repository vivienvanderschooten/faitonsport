$( document ).ready(function() {
    console.log( "ready!" );
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
});
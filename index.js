$(document).ready(function(){
    $('.toggle').click(function(){
        $('.menu').toggleClass('active');
    });
    document.querySelector( "#nav-toggle" ).addEventListener( "click", function() {
        this.classList.toggle( "active" );
    });
});
$(document).ready(function(){
    $('.toggle').click(function(){
        $('.menu').toggleClass('active');
        $('.body').toggleClass('active');
        $('.html').toggleClass('active');
    });
    document.querySelector( "#nav-toggle" ).addEventListener( "click", function() {
        this.classList.toggle( "active" );
    });
    $('#link-menu1').click(function(){
        $('.menu').toggleClass('active');
        $('.body').toggleClass('active');
        $('.html').toggleClass('active');
    });
    $('#link-menu2').click(function(){
        $('.menu').toggleClass('active');
        $('.body').toggleClass('active');
        $('.html').toggleClass('active');
    });
    $('#link-menu3').click(function(){
        $('.menu').toggleClass('active');
        $('.body').toggleClass('active');
        $('.html').toggleClass('active');
    });
    $('#link-menu4').click(function(){
        $('.menu').toggleClass('active');
        $('.body').toggleClass('active');
        $('.html').toggleClass('active');
    });
    document.querySelector( "#link-menu1" ).addEventListener( "click", function() {
        $('#nav-toggle').toggleClass('active')
    });
    document.querySelector( "#link-menu2" ).addEventListener( "click", function() {
        $('#nav-toggle').toggleClass('active')
    });
    document.querySelector( "#link-menu3" ).addEventListener( "click", function() {
        $('#nav-toggle').toggleClass('active')
    });
    document.querySelector( "#link-menu4" ).addEventListener( "click", function() {
        $('#nav-toggle').toggleClass('active')
    });
});



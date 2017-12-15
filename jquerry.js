
$(document).ready(function(){
    $("#main").load("home.php");
    $("#account").click(function(){
        $("#main").load("account.php");
    });
    $("#home").click(function(){
        $("#main").load("home.php");
    });
    $("#history").click(function(){
        $("#main").load("history.php");
    });
    $("#news").click(function(){
        $("#main").load("news.php");
    });
    $("#browse").click(function(){

    });

    $('.navbar li').click(function() {
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });
});

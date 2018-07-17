var $ = require('wetfish-basic');

$(document).ready(function()
{

    $(".navbar-nav a").on("click", function()
    {
       $(".navbar-nav").find(".active");
       $(this).parent().addClass("active");
    });

    $('.hamburger').on('click', function()
    {
        if($('.navbar-collapse').hasClass('open'))
        {
            $('.navbar-collapse').removeClass('open');
        }
        else
        {
            $('.navbar-collapse').addClass('open');
        }
    });
});

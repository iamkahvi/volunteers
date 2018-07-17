const $ = require('wetfish-basic');
var moment = require('../moment/moment.js');
let m = moment();

$(document).ready(function()
{

    $('.filter-days').on('change', function()
    {
        var date = $(this).value();

        if(date == "all")
        {
            // Show all the days
            $('.days .day').removeClass('hidden');
        }
        else
        {
            // Hide all the days
            $('.days .day').addClass('hidden');

            // Show this one
            $('.days .day[data-date="' + date + '"]').removeClass('hidden');
            $(window).trigger('resize');
        }
    });

    $('.filter-departments').on('change', function()
    {
        var department = $(this).value();

        if(department == "all")
        {
            // Show all the departments
            $('.department-wrap .department').removeClass('hidden');
        }
        else
        {
            // Hide all the departments
            $('.department-wrap .department').addClass('hidden');

            // Show this one
            $('.department-wrap .department[data-id="' + department + '"]').removeClass('hidden');
            $(window).trigger('resize');
        }
    });

    $('.filter-weeks').on('change', function()
    {
        var date = $(this).value();

        if(date == "all")
        {
            // Show all the days
            $('.days .day').removeClass('hidden');
        }
        else
        {

            // Hide all the days
            $('.days .day').addClass('hidden');

            // Convert date to Moment format
            let m = moment();

            m = moment(date.toString());

            // Show this one

            // Loop through seven days
            for(var i = 0; i < 7; i++)
            {
                $('.days .day[data-date="' + m.format('Y-MM-DD') + '"]').removeClass('hidden');
                $(window).trigger('resize');
                m.add(1, 'days');
            }
        }
    });






});

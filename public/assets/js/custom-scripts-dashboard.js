/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU
            ------------------------------------*/
            //$('#main-menu').metisMenu();

            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            var sent_open_bar_chart = JSON.parse(document.getElementById('sent-open-bar-chart').value);

            /* MORRIS BAR CHART
			-----------------------------------------*/
            Morris.Bar({
                element: 'morris-bar-chart',
                data: sent_open_bar_chart,
                xkey: 'period',
                ykeys: ['emails', 'opens'],
                labels: ['Emails', 'Opens'],
                barColors: [
                    '#e96562', '#414e63',
                    '#A8E9DC'
                ],
                hideHover: 'auto',
                resize: true
            });

            var open_click_line_chart = JSON.parse(document.getElementById('open-click-line-chart').value);

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: open_click_line_chart,
                xkey: 'period',
                ykeys: ['opens', 'clicks'],
                labels: ['Opens', 'Clicks'],
                fillOpacity: 0.6,
                hideHover: 'auto',
                behaveLikeLine: true,
                resize: false,
                pointFillColors: ['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors: ['gray', '#414e63'],
            });
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        $(".dropdown-button").dropdown();
        $("#sideNav").click(function () {
            if ($(this).hasClass('closed')) {
                $('.navbar-side').animate({left: '0px'});
                $(this).removeClass('closed');
                $('#page-wrapper').animate({'margin-left': '260px'});

            } else {
                $(this).addClass('closed');
                $('.navbar-side').animate({left: '-260px'});
                $('#page-wrapper').animate({'margin-left': '0px'});
            }
        });

        mainApp.initFunction();

    });

    $('select').material_select();


    $("form").submit(function (e) {
        e.preventDefault();
        $('button[type=submit], input[type=submit]').prop('disabled', true);
        $("#dimmer").show();
        this.submit();
    });


}(jQuery));

/**
 * Admin page navigation function
 * 
 * Allows the tabs in the admin page to switch. 
 * 
 * */

jQuery(document).ready(function($) {
    $('.tab-content').hide();
    $('.tab-content:first').show();
    $('.nav-tab:first').addClass('nav-tab-active');

    $('.nav-tab').click(function(e) {
        e.preventDefault();
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        $('.tab-content').hide();

        var selected_tab = $(this).attr('href');
        $(selected_tab).show();
    });
});


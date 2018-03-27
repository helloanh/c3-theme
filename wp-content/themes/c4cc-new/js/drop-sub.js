jQuery(document).ready(function ($) {
    $("#mobile-activator").click(function () {
        if ($(this).data('name') == 'show') {
            $(".menu_dropdown").animate({
                height: '100%'
            },50);
            $(this).data('name', 'hide')
        } else {
            $(".menu_dropdown").animate({
                height: '0'
            },50);
            $(this).data('name', 'show')
        }
    });
});	

(function($) {
    $(document).ready(function() {
        $("input", "#acf-choice_a_media").click(function() {
            $("#acf-link, #acf-file, #acf-audio").hide();
            $("#acf-" + $(this).val()).show();
        });

        $("input", "#acf-choice_a_media").each(function() {
           if($(this).is(':checked')) {
               $("#acf-" + $(this).val()).show();
           }
        });

        $('.featured-post', '.wp-list-table').each(function() {
            $(this).parent().parent().parent().find('> strong')
                //.prepend('<span class="dashicons dashicons-star-filled"></span>')
                .append('<span class="featured-post-badge">Featured !</span>')
                .addClass('featured-post-title');
        });
    });
})(jQuery);

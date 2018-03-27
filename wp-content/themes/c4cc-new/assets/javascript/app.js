(function($) {
    var responsivePostContainer = function () {
        var post = $('.post:first-child');
        if (!post.hasClass('no-height-resize')) {
            var currentWidth = post.width();
            $('.post').height(currentWidth);
        }
    };

    window.onload = function () {
        if (window.jQuery) {
            $('.bloc').hover(function (e) {
                var blockText = $(this).data('id');
                $('.text-block').addClass('ele-hide');
                $('#' + blockText).removeClass('ele-hide');
            });
            responsivePostContainer();

            // ChangeWire menu
            var hubMenu = $('#menu-hub_menu');
            var filterBtn = $('#filter-container');
            $('li:last-child', hubMenu).on('click', function (e) {
                e.preventDefault();
                if (filterBtn.hasClass('open'))
                    filterBtn.removeClass('open');
                else
                    filterBtn.addClass('open');
            });
            $('#filter-close').on('click', function () {
                filterBtn.removeClass('open');
            });
            var formSearch = $('#searchform');
            $('#openSearch').parent().append(formSearch);
            $('#openSearch').click(function () {
                if (formSearch.hasClass('open')) {
                    formSearch.removeClass('open');
                } else {
                    formSearch.addClass('open');
                }
            });
            $('.radio > label input[type="radion"]:checked', '#filter-container').parent().addClass('label-checked');
            $('input[type="radio"]', '#filter-container').change(function () {
                var parentClass = $(this).parent().parent().parent().parent().hasClass('filter-tags') ? 'filter-tags' : 'filter-categories';
                $('.' + parentClass + ' .radio > label', '#filter-container').removeClass('label-checked');
                $(this).parent().addClass('label-checked');
            });
        }
    };
})(jQuery);
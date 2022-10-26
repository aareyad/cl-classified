;(function ($) {
    $(document).ready(function () {
        // Scroll Top Button
        $(".scrollToTop").on("click", function () {
            $("body,html").animate(
                {
                    scrollTop: 0,
                },
                360
            );
        });
        $(window).on("scroll", function () {
            var scrollBar = $(this).scrollTop();

            if (scrollBar > 200) {
                $(".scrollToTop").fadeIn();
            } else {
                $(".scrollToTop").fadeOut();
            }
        });
        // Sticky Menu
        if (CLClassified.hasStickyMenu == 1) {
            run_sticky_menu();
        }
    });

    function run_sticky_menu() {

        var wrapperHtml = $('<div class="main-header-sticky-wrapper"></div>');
        var wrapperClass = '.main-header-sticky-wrapper';

        $('.main-header').clone(true).appendTo(wrapperHtml);
        $('body').append(wrapperHtml);

        var height = $(wrapperClass).outerHeight() + 30;

        $(wrapperClass).css('margin-top', '-' + height + 'px');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 300) {
                $('body').addClass('rdthemeSticky');
            } else {
                $('body').removeClass('rdthemeSticky');
            }
        });
    }

}(jQuery));

(function() {

    // sidebar toggle

    $(function() {

        var $sidebar = $('#sidebar'),
            $container = $("#container"),
            $content = $('#main-content'),
            $menu = $sidebar.children('ul'),
            $window = $(window);

        $window.on('load resize', function() {
            if ($window.width() <= 768) {
                $container.addClass('sidebar-close');
                $menu.hide();
            } else {
                $container.removeClass('sidebar-close');
                $menu.show();
            }
        });

        $('.fa-bars').click(function () {
            if ($menu.is(":visible") === true) {
                $content.css('margin-left', '0px');
                $sidebar.css('margin-left', '-210px');
                $menu.hide();
                $container.addClass("sidebar-closed");
            } else {
                $content.css('margin-left', '210px');
                $sidebar.css('margin-left', '0px');
                $menu.show();
                $container.removeClass("sidebar-closed");
            }
        });
    });

    // popovers and tooltips
    $('.popovers').popover();
    $('.tooltips').tooltip();

})();
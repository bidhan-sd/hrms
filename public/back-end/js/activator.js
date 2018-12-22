jQuery(document).ready(function($){

    $('.sidbarMenu li').click(function() {
        $(this).siblings('li').addClass('collapsed');
        $('.sidbarMenu li ul').removeClass('show');
        $(this).siblings('li').removeClass('active');
        $(this).addClass('active');
    });
    $(".sidbarMenu li ul li a").click(function() {
        if($(this).attr("href")==window.location.href){
            $(this).attr("class","dropdown");
            $(".sidbarMenu li").addClass("dropdown");
        }
    });

    $(".back-end-header-menu li:last-child").click(function() {
        $(".back-end-header-menu li ul").toggle();
    });

    $('.back-end-header-menu li:last-child').click(function() {
        $(".back-end-header-menu li ul").css({
            'opacity' : '1',
            'visibility' : 'visible'
        });
    });
    $('#table_id').DataTable();
}(jQuery));

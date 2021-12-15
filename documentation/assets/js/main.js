$(document).ready(function() {
    $('.collapse').collapse({
        toggle: false
    });
    $(document).on('click','.a-to-top',function(e){
        e.preventDefault();
        var slideTo = $(this).attr('href');
        if($(slideTo).length) toTop = $(slideTo).position().top - 50;
        else toTop = 0;

        $("html, body").animate({ scrollTop: toTop }, 'slow');
    });
    $('.panel img').css('width','200px');
    $(document).on('click','.panel img',function(e) {
        e.preventDefault();
        if($(this).hasClass('enlarged')) {
            $(this).removeClass('enlarged').css('width','200px');
        }
        else {
            $(this).addClass('enlarged').css('width','auto');
        }
    })
    //sidebar
    $(document).on('click',"#nav-side ul li a",function(e) {
        e.preventDefault();
        $("#nav-side li.active").removeClass("active");
        var slideTo = $(this).attr('href');
        if(slideTo != '' && $(slideTo).length) {
            $("html, body").animate({ scrollTop: $(slideTo).position().top - 50 }, {
                duration: 'slow',
                complete: function() {
                    //$(slideTo).stop(true,true).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
                }
            });
        }
        var li = $(this).parent();
        li.addClass('active');
        var ul = li.children('ul');
        if(ul.length) {
            if(li.hasClass('toggled')) {
                li.removeClass('toggled');
                li.children('a').find('i.glyphicon').attr('class','glyphicon glyphicon-chevron-down');
                ul.slideUp();
            }
            else {
                if(li.parent().get(0) == $("ul.sidebar-nav").get(0)) {
                    $("#nav-side ul.sidebar-nav > li > ul").slideUp();
                    $("#nav-side ul.sidebar-nav > li.toggled").removeClass("toggled");
                    $("#nav-side .glyphicon.glyphicon-chevron-up").attr('class','glyphicon glyphicon-chevron-down');
                }
                li.addClass('toggled');
                li.children('a').find('i.glyphicon').attr('class','glyphicon glyphicon-chevron-up');
                ul.slideDown();
            }
        }
    });

    $("#nav-side ul.sidebar-nav li").each(function() {
        if($(this).children('ul').length) {
            $(this).children('a:eq(0)').append('<i class="glyphicon glyphicon-chevron-down"></i>');
        }
    })
});
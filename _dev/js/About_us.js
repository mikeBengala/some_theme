Main.About_us = {
    init:function(){
        Main.About_us.init_customers_carousel();
        Main.About_us.set_counters();
    },
    init_customers_carousel:function(){
        var owl = $('.olw-customers');
        owl.owlCarousel({

            loop:true,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1,
                    stagePadding:40,
                    margin:10
                },
                481:{
                    items:3,
                    margin:5
                },
                769:{
                    items:4,
                    margin:7
                }
            }
        });
    },
    set_counters:function(){
        var counter_wrap = $(".acomplishments_counter_wrap"),
            counter_wrap_top = counter_wrap.offset().top,
            counters_triggered = false;

        $(window).on("load", function(){
            go_counters();
        });
        $(window).on("scroll", function(){

            go_counters();

        });
        function go_counters(){
            if(counters_triggered == false){

                var $window = $(window),
                    window_top = $(window).scrollTop(),
                    window_height = $window.height(),
                    window_bottom = window_top + window_height;

                if(counter_wrap_top < window_bottom){
                    counters_triggered = true;
                    setTimeout(function(){
                        $(".acomplishments_counter li").each(function(){
                            var the_number = $(this).find(".number");
                            Main.About_us.auto_increment_to(the_number, 2500);
                        });
                    } ,700);
                }
            }
        }
    },
    auto_increment_to:function(the_number_object, time){
        var the_number = the_number_object.attr("data-number");

        the_number_object.prop('number', 0).animate({
            Counter: the_number
        }, {
            duration: time,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    }
}

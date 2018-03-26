var counters = false;
Main.Homepage = {
    init:function(){
        Main.Homepage.init_owl_carousel();
    },
    init_owl_carousel:function(){
        var owl = $('.owl-homepage-slider');

        //init owl carousel
        owl.owlCarousel({
            animateOut: 'fadeOut',
            autoplay:true,
            items:1,
            loop:true
        });


        //split dots width by total number of slides
        var owl_dot = $(".owl-homepage-slider .owl-dot"),
            owl_dot_length = owl_dot.length,
            owl_dot_width = 100 / owl_dot_length;
        owl_dot.css( "width" , owl_dot_width + "%");



        // stop carousel
        var owl_first_dot = owl.find(".owl-dot:first-child");
        owl.trigger('stop.owl.autoplay');
        owl_first_dot.removeClass("active");


        //play carousel on load and after intro
        $(window).on("load", function(){
            setTimeout(function(){
                owl.trigger('play.owl.autoplay');
                owl_first_dot.trigger("click");
                owl_first_dot.addClass("active");
                $(".carousel_caption").addClass("ready");
            }, 1750);
        });

    }
}

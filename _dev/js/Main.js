Main = {
    init:function(){
        Main.set_back_to_top_button_event();
        Main.init_parallax();
        Main.set_gallery_item_hover_and_click_event();
        Main.page_fade_out();
        Main.second_level_sub_menu_open_event();
        Main.input_click_event();
        Main.open_close_reply_form();
        Main.attr_childrens_tallest_height();
        Main.toggle_mobile_menu_events();
        Main.toggle_desktop_search_events();
        Main.header_bar_hover_event();
        Main.mobile_menu_set_open_sub_menus_trigger_elements();


        //trigger this if class exist
        if($(".open_comments_button").length > 0){
            var current_url = window.location.href,
                replytocom_ocurrence = (current_url.match(/replytocom/g) || []).length,
                hashtagrespond_ocurrence = (current_url.match(/#respond/g) || []).length;

            if(replytocom_ocurrence > 0 || hashtagrespond_ocurrence > 0){
                $(".open_comments_button").trigger("click");
            }
        }
        if($(".homepage_youtube_video").length > 0){
            Main.init_youtube_video();
        }
        if($(".quiet_form").length > 0){
            Main.Contact_form.init();
        }


        //check current page section data-page to trigger correct js
        var page = $('section').attr('data-page');
        switch(page){
            case 'homepage':
                Main.Homepage.init();
                break;
            case 'about_us':
                Main.About_us.init();
                break;
            case 'page':
                Main.Page_and_post.init();
                break;
            case 'single':
                Main.Page_and_post.init();
                break;
        }

    },
    page_fade_out:function(){
        $("a").not($(".children .page_item_has_children > a, .gallery-item a, .sub-menu .menu-item-has-children > a")).click(function(e){
            var $this = $(this),
                this_target = $this.attr("_target"),
                this_href = $this.attr("href");

            if(this_target == "_blank" || this_target == "_top" || this_target == "_parent"){

            }else{
                e.preventDefault();
                $("#out-curtain").addClass("active");
                setTimeout(function(){
                    window.location.href = this_href;
                }, 500);
            }
        });
    },
    page_fade_in:function(){
        var intro = $("#intro"),
            intro_width = $(window).width();


        setTimeout(function(){
            intro.animate({"width": intro_width},0 );
            $("#intro_wrap").addClass("over");
            $("body").addClass("ready");
            $("#wrapper").addClass("active");
        }, 1780);
    },
    quiet_pop_up:function(icon, title, message, exit_button, time){
        var animation_running = true;
        $("body").append('<div class="pop_up"><div class="inner_pop_up"><div class="pop_up_icon_wrap"> ' + icon + '</div><p class="pop_up_title">' + title + '</p><p class="pop_up_message">' + message + '</p><div class="more-button-wrap"><div class="edit_link_wrap no_margin margin_on_top white_edit_post"><p class="post-edit-link"> ' + exit_button + ' </p></div></div></div></div>');

        $("body").on("click", ".pop_up .post-edit-link", function(){
            animation_running = false;
            $("body").find(".pop_up").remove();
        });
        setTimeout(function(){
            $("body").find(".pop_up").addClass("animate_pop_up_in");
        }, 10);
        setTimeout(function(){
            $("body").find(".pop_up").removeClass("animate_pop_up_in").addClass("animate_pop_up_out");
        }, time + 10);
        setTimeout(function(){
            if(animation_running == true){
                $("body").find(".pop_up").remove();
            }
        }, time + 850);
    },
    second_level_sub_menu_open_event:function(){
        $(".children .page_item_has_children, .sub-menu .menu-item-has-children").click(function(e){
            e.preventDefault();
            $(this).find(".children, .sub-menu").toggleClass("open");
        });

        $(".children .page_item_has_children .children a, .sub-menu .menu-item-has-children .sub-menu a").click(function(e){
            e.stopPropagation();
        });
    },
    mobile_menu_set_open_sub_menus_trigger_elements:function(){
        var item_has_sub_menu = $("#mobile_menu .page_item_has_children, #mobile_menu .menu-item-has-children");

        if(item_has_sub_menu.length > 0){


            item_has_sub_menu.each(function(){
                $(this).append('<div class="open_sub_menu_toggle"></div>');
            });


        }



        $("#mobile_menu").on("click", ".open_sub_menu_toggle", function(){
            $(this).closest(".page_item_has_children, .menu-item-has-children").toggleClass("open");
        });
    },
    toggle_desktop_search_events:function(){
        var search_open = false,
            search_toggle = $(".search_toggle"),
            search_form = $("#desktop_search_menu_wrap"),
            header = $("#header");

        search_toggle.click(function(){
            if(search_open == true){
                header.removeClass("menu_open");
                search_form.removeClass("active");
                search_open = false;
            }else if(search_open == false){
                header.addClass("menu_open");
                search_form.addClass("active");
                setTimeout(function(){
                    $("#desktop_search_menu_wrap #s").trigger("focus");
                }, 1000);

                search_open = true;
            }
        });
    },
    toggle_mobile_menu_events:function(){
        var menu_open = false,
            menu_toggle = $(".menu_toggle"),
            mobile_menu_wrap = $("#mobile_menu"),
            header = $("#header");

        menu_toggle.click(function(){
            if(menu_open == true){
                menu_toggle.removeClass("active");
                mobile_menu_wrap.removeClass("active");
                header.removeClass("menu_open");
                menu_open = false;
            }else if(menu_open == false){
                menu_toggle.addClass("active");
                mobile_menu_wrap.addClass("active");
                header.addClass("menu_open");
                menu_open = true;
            }
        });
    },
    init_youtube_video:function(){
        //youtube video configuration goes here
        //check documentation here: http://rochestb.github.io/jQuery.YoutubeBackground/


        //the background video
        $(".youtube_background_video").each(function(){

            var background_video_container = $(this),
                video_id = background_video_container.attr("data-video-id");


            background_video_container.YTPlayer({
                fitToBackground: true,
                videoId: video_id
            });

        });

        //the full video
        $(".youtube_full_video").each(function(){
            var full_video = $(this),
                video_id = full_video.attr("data-video-id"),
                video_mute = false;

            full_video.YTPlayer({
                videoId: video_id,
                mute: false,
                callback: function(){
                    //console.log("player ready");

                    var player = full_video.data('ytPlayer').player;
                    player.pauseVideo();


                    //Start full video
                    $("#expand_video_button[data-video-id=" + video_id + "]").click(function(){
                        player.playVideo();
                        $(".youtube_full_video_wrap[data-video-id=" + video_id + "]").addClass("active");
                    });

                    //close full video
                    $("#close_video_button[data-video-id=" + video_id + "]").click(function(){
                        player.pauseVideo();
                        $(".youtube_full_video_wrap[data-video-id=" + video_id + "]").removeClass("active");
                    });


                    $("#mute_video_button[data-video-id=" + video_id + "]").click(function(){
                        if(video_mute == false){
                            player.mute();
                            video_mute = true;
                        }else{
                            player.unMute();
                            video_mute = false;
                        }

                        $(this).toggleClass("unactive");
                    });
                }
            });
        });



    },
    attr_childrens_tallest_height:function(){
        var the_parent = $(".attr_childrens_tallest_height");
        if(the_parent.length > 0){

            var the_tallest_child = 0;
            the_parent.find("*").each(function(){
                var $this = $(this);
                    $this_height = $this.height();

                if($this_height > the_tallest_child){
                    the_tallest_child = $this_height;
                }
            });


            the_parent.height(the_tallest_child);
        }
    },
    open_close_reply_form:function(){
        $(".open_comments_button").click(function(){
            $(".comment-respond").addClass("active");
        });

        $(".comment-form .exit").click(function(){
            $(".comment-respond").removeClass("active");
        });
    },
    input_click_event:function(){
        $(".comment-form input, .quiet_form input, .comment-form textarea, .quiet_form textarea, .comment-form label, .comment-form input").focusin(function(){
            var $this = $(this),
                this_id = $this.attr("id");

            $this.addClass("active");
            $("label[for=" + this_id + "]").addClass("active");
        });
        $(".comment-form input, .quiet_form input, .comment-form textarea, .quiet_form textarea, .comment-form label, .comment-form input").focusout(function(){
            var $this = $(this),
                this_id = $this.attr("id"),
                this_value = $this.val();

            if(this_value == ""){
                $this.removeClass("active");
                $("label[for=" + this_id + "]").removeClass("active filled");
            }else{
                $("label[for=" + this_id + "]").addClass("filled");
            }

        });
    },
    init_parallax:function(){
        $('.parallax').parallax();
    },
    set_gallery_item_hover_and_click_event:function(){
        $('.gallery-item, .wp-caption').hover(function(){
            var $this = $(this);
            if($this.find($(".wp-caption-text")).length){
                $this.addClass("hover");
            }
        }, function(){
            $(this).removeClass("hover");
        });
    },
    set_back_to_top_button_event:function(){
        $(".back_to_top").click(function(){
            $("body, html").animate({scrollTop : 0}, 1000);
        });
    },
    scroll_events:function(){

        var $window = $(window),
            windowTop = $window.scrollTop();
            windowBottom = windowTop + $window.height(),
            efct_elements = $(".efct");

        // trigger fadein on scroll elements

        if(efct_elements.length > 0){
            efct_elements.each(function(){
                var $this = $(this),
                    thisTop = $this.offset().top;

                if(thisTop <= windowBottom){
                    $this.addClass("active");
                }
            });
        }

    },
    header_bar_scroll_events:function(){
        var $window = $(window),
            windowTop = $window.scrollTop();
            windowBottom = windowTop + $window.height() + 200,
            header = $("#header"),
            header_on_top_background_color = header.attr("data-before-scroll-background"),
            header_after_scroll_background_color = header.attr("data-after-scroll-background"),
            transparent_on_top = header.attr("data-transparent-while-on-top"),
            transparent_class = " transparent";

        if(transparent_on_top == false){
            transparent_class = "";
        }
        // change header color
        if(windowTop == 0){
            header.removeClass("white black").addClass(header_on_top_background_color + transparent_class);
        }else{
            header.removeClass("black white" + transparent_class).addClass(header_after_scroll_background_color);
        }
    },
    header_bar_hover_event:function(){
        var header = $("#header"),
            header_on_top_background_color = header.attr("data-before-scroll-background"),
            header_after_scroll_background_color = header.attr("data-after-scroll-background"),
            transparent_on_top = header.attr("data-transparent-while-on-top");


        $("#desktop_menu .menu-item-has-children, #desktop_menu .page_item_has_children").hover(function(){
            var $window = $(window),
                windowTop = $window.scrollTop();

            if(transparent_on_top == true && windowTop == 0){
                header.removeClass(header_on_top_background_color + transparent_class);
                header.addClass(header_after_scroll_background_color);
            }
        }, function(){
            var $window = $(window),
                windowTop = $window.scrollTop();

            if(transparent_on_top == true && windowTop == 0){
                header.removeClass(header_after_scroll_background_color);
                header.addClass(header_on_top_background_color + transparent_class);
            }
        });
    }
}

var $ = jQuery;

$(function(){
    Main.init();
});

$(window).on('resize', function(){
    Main.scroll_events();
    Main.attr_childrens_tallest_height();
});

$(window).on('load', function(){
    Main.scroll_events();
    setTimeout(function(){
        Main.scroll_events();
    }, 350);
    Main.scroll_events();
    Main.header_bar_scroll_events();
    Main.page_fade_in();
});

$(window).on('scroll', function(){
    Main.scroll_events();
    Main.header_bar_scroll_events();
});

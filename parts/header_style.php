<style>
    body{
        background:#ffa34c;
    }
    #intro_wrap{
        width:100%;
        height:100%;
        position:fixed;
        overflow:hidden;
        transition:all 1.6s ease;
        z-index:20;
        opacity: 1;
    }
    #intro_wrap.over{
        width:0;
    }
    #intro{
        width:100%;
        height:100%;
        position:absolute;
        background:#ffa34c;
        opacity:1;
        top:0;
        left:0;
    }
    .inner_intro{
        overflow:hidden;
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        -ms-transform:translate(-50%, -50%);
        -webkit-transform:translate(-50%, -50%);
        overflow:hidden;
        background:#ffa34c;
    }
    .inner_intro:after{
        width:100%;
        height:100%;
        position:absolute;
        background:#ffa34c;
        left:0;
        content:"";
        animation-name: run_left;
        animation-duration: 0.7s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
        -webkit-animation-name: run_left;
        -webkit-animation-duration: 0.7s;
        -webkit-animation-fill-mode: forwards;
        -webkit-animation-timing-function: ease;
        padding:10px 0;
        top:-2px;
    }
    .inner_intro:before{
        width:100%;
        height:100%;
        right:0;
        background:#fff;
        position:absolute;
        content:"";
        animation-name: run_left;
        animation-duration: 0.7s;
        animation-delay: 1s;
        animation-fill-mode: forwards;
        animation-timing-function: ease;
        -webkit-animation-name: run_left;
        -webkit-animation-duration: 0.7s;
        -webkit-animation-delay: 1s;
        -webkit-animation-fill-mode: forwards;
        -webkit-animation-timing-function: ease;
    }
    #wrapper{
        z-index:0;
        position: relative;
        visibility:hidden;
    }
    #wrapper.active{
        visibility:visible !important;
    }
    .intro_title{
        font-family: 'Dosis', sans-serif;
        text-align:center;
        font-size:90px;
        text-transform:uppercase;
        padding: 20.5px 100px;
        color:#fff;
    }
    @media (max-width:768px){
        .intro_title{
            font-size:40px;
        }
    }
    @media (max-width:780px){
        .intro_title{
            font-size:30px;
        }
    }
    @keyframes run_left{
        0%{transform:translateX(0);}
        100%{transform:translateX(-100%);}
    }
    @-webkit-keyframes run_left{
        0%{transform:translateX(0);}
        100%{transform:translateX(-100%);}
    }

    <?php if(get_theme_mod("core_color")){?>
        <?php //Border color-------------------------------------->?>
        .edit_link_wrap.white_edit_post .post-edit-link,
        .owl-homepage-slider .owl-item .carousel_caption .more-button-wrap .more-button,
        .home_highligh_post .home_highligh_post_caption .more-button,
        .edit_link_wrap.black_edit_post .post-edit-link,
        .homepage-projects .homepage_project_caption .more-button-wrap .more-button{
            border-color: <?=get_theme_mod("core_color")?>;
        }

        <?php //Background-------------------------------------->?>
        body,
        .owl-homepage-slider .owl-item .carousel_caption .more-button-wrap .more-button:hover,
        #intro,
        .inner_intro:after,
        .inner_intro,
        .edit_link_wrap.white_edit_post .post-edit-link:hover,
        #header.black .menu li:hover:before,
        #header.menu_open .menu li:hover:before, #header.white .menu li:hover:before,
        #header #desktop_menu .search_toggle:after,
        .owl-homepage-slider .owl-dots .owl-dot.active span:after,
        .home_highligh_post .home_highligh_post_caption .more-button:hover,
        .edit_link_wrap.black_edit_post .post-edit-link:hover,
        .homepage-projects .homepage_project_caption .more-button-wrap .more-button:hover,
        #footer .footer_top .footer_title:before,
        .about_us_stage hr.about_us_line,
        .customers_carousel_wrap .customers_title_underline,
        .acomplishments_counter_wrap,
        #out-curtain,
        .gallery .gallery-item .gallery-icon a:after,
        input[type=submit], p.exit,
        .post hr,
        .navigation_bar .pagination .page-numbers.current, .navigation_bar .pagination .page-numbers:hover,
        section[data-page=contacts] .contact_page_contacts .footer_title:before,
        form.comment-form label.active, form.quiet_form label.active,
        form.comment-form label:before, form.quiet_form label:before,
        #nav-below.navigation .next a, #nav-below.navigation .prev a,
        .comment_section .comment-list .reply a{
            background: <?=get_theme_mod("core_color")?>;
        }

        <?php //color-------------------------------------->?>
        #header.black .menu li:hover a,
        #header.menu_open .menu li:hover a, #header.white .menu li:hover a,
        #header #desktop_menu .menu-item-has-children .menu-item-has-children:hover:after,
        #header #desktop_menu .menu-item-has-children .page_item_has_children:hover:after,
        #header #desktop_menu .page_item_has_children .menu-item-has-children:hover:after,
        #header #desktop_menu .page_item_has_children .page_item_has_children:hover:after,
        #header #desktop_menu .search_toggle:hover,
        .home_highligh_post .home_highligh_post_caption h3,
        .homepage_icons_wrap ul.homepage_icons li i,
        .homepage_team_loop_wrap .homepage_team_loop_title,
        .social_media_menu a:hover, .social_media_menu i:hover,
        #footer .footer_bottom .credits a:hover,
        #header #desktop_menu .menu .children a:hover, #header #desktop_menu .menu .sub-menu a:hover,
        #header #desktop_menu .menu .children:hover .children a:hover,
        #header #desktop_menu .menu .children:hover .sub-menu a:hover,
        #header #desktop_menu .menu .sub-menu:hover .children a:hover,
        #header #desktop_menu .menu .sub-menu:hover .sub-menu a:hover,
        .post .the_post_cat:hover,
        .post h1:hover,
        .post .the_post_buttons a:hover,
        .crumbs a:hover,
        .navigation_bar .pagination .page-numbers.next,
        .navigation_bar .pagination .page-numbers.prev,
        .page_content_container address a,
        .page_content_container h1 a,
        .page_content_container h2 a,
        .page_content_container h3 a,
        .page_content_container h4 a,
        .page_content_container h5 a,
        .page_content_container h6 a,
        .page_content_container li a,
        .page_content_container p a,
        .comment_section .comment-list a,
        .comment-form .logged-in-as a:nth-child(2),
        #mobile_menu .menu li.current_page_item a{
            color: <?=get_theme_mod("core_color")?> !important;
        }

        .comment_section .comment-list .reply a{
            color:#fff !important;
        }
        #header #desktop_menu .menu .children a, #header #desktop_menu .menu .sub-menu a{
            color:#666 !important;
        }
    <?php }?>
</style>

<?php
class bootstrapguru_import extends WP_Import
{
    function check(){
        wp_delete_post(2);


        // Use a static front page
        $homepage = get_page_by_title( 'Front Page' );
        update_option( 'page_on_front', $homepage->ID );
        update_option( 'show_on_front', 'page' );

        // Set the blog page
        $blog   = get_page_by_title( 'Blog' );
        update_option( 'page_for_posts', $blog->ID );

        // Set Number of posts in Blog page
        update_option( 'posts_per_page', 6 );

        // Check if the menu exists
        $menu_name = 'primary';
        $menu_exists = wp_get_nav_menu_object( $menu_name );

        // If it doesn't exist, let's create it.
        // Check if the menu exists
        $menu_name = 'gfn_quiet_primary';
        $menu_exists = wp_get_nav_menu_object( $menu_name );

        // If it doesn't exist, let's create it.
        if( !$menu_exists){
            $menu_id = wp_create_nav_menu($menu_name);

            // Set up default menu items
            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Front Page'),
                'menu-item-classes' => 'home',
                'menu-item-url' => home_url( '/' ),
                'menu-item-status' => 'publish'
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Page'),
                'menu-item-classes' => 'page',
                'menu-item-url' => home_url( '/page' ),
                'menu-item-status' => 'publish'
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Projects'),
                'menu-item-classes' => 'projects',
                'menu-item-url' => home_url( '/projects' ),
                'menu-item-status' => 'publish'
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Blog'),
                'menu-item-classes' => 'blog',
                'menu-item-url' => home_url( '/blog' ),
                'menu-item-status' => 'publish'
            ));

            wp_update_nav_menu_item($menu_id, 0, array(
                'menu-item-title' =>  __('Contacts'),
                'menu-item-classes' => 'contacts',
                'menu-item-url' => home_url( '/contacts' ),
                'menu-item-status' => 'publish'
            ));


            // sub menus
            $menus = wp_get_nav_menu_items( $menu_name );
            foreach($menus as $menu){

                // sub menus of page
                if($menu->post_name == "page"){


                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('About Us'),
                        'menu-item-classes' => 'about_us',
                        'menu-item-url' => home_url( '/page/about-us/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));

                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Page With Gallery'),
                        'menu-item-classes' => 'page_with_gallery',
                        'menu-item-url' => home_url( '/page/page-with-gallery/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));

                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Page with sidebar on the right side'),
                        'menu-item-classes' => 'page-with-sidebar-on-the-right-side',
                        'menu-item-url' => home_url( '/page/page-with-sidebar-on-the-right-side/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));

                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Page with comments'),
                        'menu-item-classes' => 'ppage-with-comments',
                        'menu-item-url' => home_url( '/page/page-with-comments/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));

                }

                // sub menus of projects
                if($menu->post_name == "projects"){


                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Architecture'),
                        'menu-item-classes' => 'architecture',
                        'menu-item-url' => home_url( '/projects_category/architecture/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));

                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' =>  __('Design'),
                        'menu-item-classes' => 'design',
                        'menu-item-url' => home_url( '/projects_category/design/' ),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $menu->ID
                    ));
                }
            }

        }
    }

    function change_color($the_color){
        set_theme_mod( 'core_color' , $the_color );
    }
}
?>

    <footer id="footer">
            <div class="footer_top efct fade-in">
                <div class="max_900">
                    <div class="footer_column">
                        <p class="footer_title">
                            <?= get_theme_mod('title_1', "Quiet Theme");?>
                        </p>
                        <p class="footer_content">
                            <?= get_theme_mod('content_1', "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.");?>
                        </p>
                        <?php get_template_part( "parts/social_menu" );?>
                    </div>
                    <div class="footer_column">
                        <p class="footer_title">
                            <?= get_theme_mod('title_2', "Contact us");?>
                        </p>
                        <p class="footer_content">
                            <?= get_theme_mod('content_2', "Gold Street, Lisbon<br />Phone: 920 000 000<br />Fax: 282 000 000<br />Email: support@example.com");?>
                        </p>
                    </div>

                    <?php if (user_can( wp_get_current_user(), 'administrator' )) {?>
                        <div class="regular_padding">
                            <div class="more-button-wrap align_right">
                                <div class="edit_link_wrap no_margin white_edit_post">
                                    <a class="post-edit-link" href="<?=get_site_url()?>/wp-admin/customize.php?autofocus[panel]=contacts_template">
                                        <?php _e("Edit Contacts", "quiet_theme");?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>

            </div>
            <div class="footer_bottom efct fade-in">
                <div class="max_900">
                    <p class="credits">
                        <?= get_theme_mod('credits', 'Quiet theme developed by gfn.pt')?>
                    </p>
                </div>
            </div>

            <div class="grid-100">
                <div class="max_900 position_relative back_to_top_wrap">
                    <div class="back_to_top"><div class="arrow_wrap"><i class="fa fa-arrow-up"></i><i class="fa fa-arrow-up"></i></div></div>
                </div>
            </div>


    </footer>
</div>
<div id="out-curtain">
</div>
<?php wp_footer(); ?>
</body>
</html>

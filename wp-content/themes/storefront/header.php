<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="hfeed site">
            <?php do_action('storefront_before_header'); ?>

            <header id="masthead" class="site-header" role="banner" <?php
            if (get_header_image() != '') {
              echo 'style="background-image: url(' . esc_url(get_header_image()) . ');"';
            }
            ?>>
                <div class="col-full">
                    <div class="topbar">
                        <div class="container"><div class="row">
                                <div class="col-xs-6 top-left">
                                    <div onclick="wpml_language_selector_click.toggle();" class="sel-lang lang_sel_click"><?php _e('Select language'); ?></div>
                                    <?php do_action('icl_language_selector'); ?>
                                </div>
                                <div class="col-xs-6 top-right">
                                    <?php wp_nav_menu(array('theme_location' => 'secondary', 'menu_id' => 'storefront')); ?>
                                    <div class="user-acc">
                                    <?php wp_loginout(); ?> 
                                    <?php if (!is_user_logged_in()) { ?>
                                    <a href="<?php echo wp_registration_url(); ?>" title="Register"><?php _e('Register'); ?></a>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div></div>
                    </div> <!-- end-topbar -->
                    <div class="topbar-clear"></div>
                    <?php
                    /**
                     * @hooked storefront_skip_links - 0
                     * @hooked storefront_social_icons - 10
                     * @hooked storefront_site_branding - 20
                     * @hooked storefront_secondary_navigation - 30
                     * @hooked storefront_product_search - 40
                     * @hooked storefront_primary_navigation - 50
                     * @hooked storefront_header_cart - 60
                     */
                    do_action('storefront_header');
                    ?>

                </div>
            </header><!-- #masthead -->

            <?php
            /**
             * @hooked storefront_header_widget_region - 10
             */
            do_action('storefront_before_content');
            ?>

            <div id="content" class="site-content" tabindex="-1">
                <div class="col-full">

                    <?php
                    /**
                     * @hooked woocommerce_breadcrumb - 10
                     */
                    do_action('storefront_content_top');
                    ?>

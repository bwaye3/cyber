<style class="customize">
<?php
    $customize = (array)json_decode($json, true);
    if($customize):
?>

    <?php //================= Font Body Typography ====================== ?>
    <?php if(isset($customize['font_family_primary'])  && $customize['font_family_primary'] != '---'){ ?>
        body,
        .event-full .event-info,.block.block-blocktabs .ui-widget,.block.block-blocktabs .ui-tabs-nav > li > a,.gva-mega-menu .block-blocktabs .ui-widget,.gva-mega-menu .block-blocktabs .ui-tabs-nav > li > a
        {
            font-family: <?php echo $customize['font_family_primary'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['font_family_second'])  && $customize['font_family_second'] != '---'){ ?>
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6,
        .pager ul.pager__items > li a,.topbar .topbar-right ul.gva_topbar_menu > li a,.gva-user-region .user-top .account-name,.gva-user-region .user-content,.quick-cart .cart-count,.quick-cart .cart-block-contents-links a,
        .gavias_sliderlayer .slide-style-1, #gavias_slider_single .slide-style-1,.gavias_sliderlayer .slide-style-2, #gavias_slider_single .slide-style-2,.gavias_sliderlayer .slide-style-3, #gavias_slider_single .slide-style-3,
        .gavias_sliderlayer .slide-style-4, #gavias_slider_single .slide-style-4,.gavias_sliderlayer .btn-slide, .gavias_sliderlayer .btn-slide-white, #gavias_slider_single .btn-slide, #gavias_slider_single .btn-slide-white,
        .gavias_sliderlayer .btn-slide.inner, .gavias_sliderlayer .btn-slide a, .gavias_sliderlayer .btn-slide-white.inner, .gavias_sliderlayer .btn-slide-white a, #gavias_slider_single .btn-slide.inner, #gavias_slider_single .btn-slide a, #gavias_slider_single .btn-slide-white.inner, #gavias_slider_single .btn-slide-white a,
        .post-block .post-title a,.post-block .post-meta,.post-block .post-action a,.post-slider.post-block .post-meta-wrap .post-title a,.post-slider.post-block .post-categories a,.portfolio-filter ul.nav-tabs > li > a,.portfolio-v1 .content-inner .title a,.portfolio-single .content-top .post-categories a,.portfolio-single .portfolio-informations .item-information span:first-child,
        .team-teaser-1 .team-name,.team-teaser-1 .team-job,.team-teaser-2 .team-name,.team-teaser-2 .team-job,.team-teaser-3 .team-content,.team-teaser-4 .team-content,.team-single-page .team-name .job,.team-single-page .heading,.team-single-page .team-quote,.testimonial-node-v1 .video .popup-video,.testimonial-node-v1 .content-top .quote,.testimonial-node-v1 .title,.testimonial-node-v1 .job,
        .testimonial-node-v2 .quote,.testimonial-node-v2 .job,.testimonial-node-v2 .title,.course-block .image .image-popup,.course-block .image .video-link,.course-block .course-content .content-inner .categories,.course-block .course-content .course-footer,.course-block .course-content .course-footer .left .course-price,.course-block .course-content .course-footer .left .course-price,
        .views-exposed-form .form-item select, .views-exposed-form .form-item input[type="text"], .views-exposed-form .form-item input[type="text"], .views-exposed-form .form-item input[type="tel"], .views-exposed-form .form-item input[type="password"], .views-exposed-form .form-item input[type="email"], .views-exposed-form .form-actions select, .views-exposed-form .form-actions input[type="text"],
        .views-exposed-form .form-actions input[type="text"], .views-exposed-form .form-actions input[type="tel"], .views-exposed-form .form-actions input[type="password"], .views-exposed-form .form-actions input[type="email"],
        .views-exposed-form .form-item label, .views-exposed-form .form-actions label,.views-exposed-form .form-actions input,.form-fullwidth #views-exposed-form-courses-course-filter .form-item select, .form-fullwidth #views-exposed-form-courses-course-filter .form-item input[type="text"], .form-fullwidth #views-exposed-form-courses-course-filter .form-item input[type="text"],
        .form-fullwidth #views-exposed-form-courses-course-filter .form-item input[type="tel"], .form-fullwidth #views-exposed-form-courses-course-filter .form-item input[type="password"], .form-fullwidth #views-exposed-form-courses-course-filter .form-item input[type="email"],.categories-course-list .view-content-wrap .item a,.course-block-heading-2 > div,.course-block-v2 > div.course-title,
        .course-block-v2 > div.course-category .field .field__item a, .course-block-v2 > div.course-teacher, .course-block-v2 > div.content-action,.featured-course-2 .image .image-popup,.featured-course-2 .image .video-link,.featured-course-2 .right .teacher a,.featured-course-2 .right .course-features .field__items .field__item,.view-courses-featured-2 .carousel-nav .content-inner .info .right,
        .single-course .block-course-title,.single-course .course-right .course-meta .meta-item .content .lab,.single-course .course-right .course-meta .meta-item .content .val,.single-course .course-right .course-meta .meta-item .content .val a,.single-course .course-right .add-to-cart-content-inner .field--name-price,.single-course .course-right .add-to-cart-content-inner .user-registered,.single-course .icon-expand,
        .single-course .video-link,.single-course .course-features .field__label,.single-course .course-features .field__items .field__item,.lesson-block .lesson-content .lesson-title,.lesson-single .lessons .back-to-course,.event-block .event-image .date,.event-block .event-content .event-info .title,.event-block-list .event-date span.day,.event-block-list .event-title a,.nav-tabs > li > a,input[type="button"], .btn, .btn-white, .btn-theme, .btn-black, input.js-form-submit, a.button-action,
        .progress-label,.pricing-table .plan-name .title,.pricing-table .content-wrap .plan-price .price-value,.pricing-table .content-wrap .plan-price .price-value .value,.user-form .form-item:not(.js-form-type-checkbox) label,.user-form details summary,.company-presentation .title,.most-search-block ul > li,.navigation .gva_menu > li > a,.navigation .gva_menu .megamenu > .sub-menu > li > a,.navigation .gva_menu .sub-menu > li > a,ul[data-drupal-views-infinite-scroll-pager].pager a,.category-list .item-list ul li a,
        .tags-list .item-list > ul > li a,.widget.gsc-video-box.style-1 .video-content .left,.widget.gsc-video-box.style-2 .video-content .link-video strong,.widget.gsc-video-box.style-2 .video-content .button-review a,.widget.milestone-block .milestone-number,.widget.milestone-block .milestone-text,.widget.milestone-block.position-icon-left .milestone-number,.gsc-box-hover .backend .box-title,.gsc-box-hover .backend .link-action a,.gsc-box-hover .box-title,.gsc-carousel-content.style-1 .content-box .content-inner .title,
        .gsc-carousel-content.style-2 .content-box .content-inner .title,.gsc-countdown .gva-countdown .countdown-times > div,.gsc-countdown .gva-countdown .countdown-times > div b,.gsc-call-to-action .title,.gsc-chart .easyPieChart span,.gsc-chart .content .title,.gsc-our-gallery .item .content-inner .title,.gsc-heading .sub-title,.gsc-icon-box .highlight_content .title,.gsc-image-content.skin-v2 .box-content .read-more a,.gsc-image-content.skin-v3 .box-content .title,.gsc-instagram .widget-heading .title,.gva-job-box .content-inner .job-type,
        .gva-job-box .content-inner .box-title .title,.gsc-our-partners .content-inner .title,.gsc-our-partners .content-inner .info,.gsc-quotes-rotator .cbp-qtrotator .cbp-qtcontent .content-title,.gsc-services-box .item-service-box .content-inner .title,.gsc-tab-views.style-2 .list-links-tabs .nav-tabs > li a,.gsc-tabs .tabs_wrapper.tabs_horizontal .nav-tabs > li a,.gsc-tabs .tabs_wrapper.tabs_vertical .nav-tabs > li a,.gva-offcanvas-mobile .gva-navigation .gva_menu > li > a,.gva-offcanvas-mobile .gva-navigation .gva_menu > li ul.menu.sub-menu li a
        {
            font-family: <?php echo $customize['font_family_second'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['font_body_size'])  && $customize['font_body_size']){ ?>
        body{
            font-size: <?php echo ($customize['font_body_size'] . 'px'); ?>;
        }
    <?php } ?>    

    <?php if(isset($customize['font_body_weight'])  && $customize['font_body_weight']){ ?>
        body{
            font-weight: <?php echo $customize['font_body_weight'] ?>;
        }
    <?php } ?>    

    <?php //================= Body ================== ?>

    <?php if(isset($customize['body_bg_image'])  && $customize['body_bg_image']){ ?>
        body{
            background-image:url('<?php echo drupal_get_path('theme', 'gavias_edupia') .'/images/patterns/'. $customize['body_bg_image']; ?>');
        }
    <?php } ?> 
    <?php if(isset($customize['body_bg_color'])  && $customize['body_bg_color']){ ?>
        body{
            background-color: <?php echo $customize['body_bg_color'] ?>!important;
        }
    <?php } ?> 
    <?php if(isset($customize['body_bg_position'])  && $customize['body_bg_position']){ ?>
        body{
            background-position:<?php echo $customize['body_bg_position'] ?>;
        }
    <?php } ?> 
    <?php if(isset($customize['body_bg_repeat'])  && $customize['body_bg_repeat']){ ?>
        body{
            background-repeat: <?php echo $customize['body_bg_repeat'] ?>;
        }
    <?php } ?> 

    <?php //================= Body page ===================== ?>
    <?php if(isset($customize['text_color'])  && $customize['text_color']){ ?>
        body .body-page{
            color: <?php echo $customize['text_color'] ?>;
        }
    <?php } ?>

    <?php if(isset($customize['link_color'])  && $customize['link_color']){ ?>
        body .body-page a{
            color: <?php echo $customize['link_color'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['link_hover_color'])  && $customize['link_hover_color']){ ?>
        body .body-page a:hover{
            color: <?php echo $customize['link_hover_color'] ?>!important;
        }
    <?php } ?>

    <?php //===================Topbar=================== ?>
    <?php if(isset($customize['topbar_bg'])  && $customize['topbar_bg']){ ?>
        .topbar{
            background: <?php echo $customize['topbar_bg'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['topbar_color'])  && $customize['topbar_color']){ ?>
        .topbar{
            color: <?php echo $customize['topbar_color'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['topbar_color_link'])  && $customize['topbar_color_link']){ ?>
        .topbar a{
            color: <?php echo $customize['topbar_color_link'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['topbar_color_link_hover'])  && $customize['topbar_color_link_hover']){ ?>
        .topbar a:hover{
            color: <?php echo $customize['topbar_color_link_hover'] ?>!important;
        }
    <?php } ?>

    <?php //===================Header=================== ?>
    <?php if(isset($customize['header_bg'])  && $customize['header_bg']){ ?>
        header .header-main{
            background: <?php echo $customize['header_bg'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['header_color'])  && $customize['header_color']){ ?>
        header .header-main{
            color: <?php echo $customize['header_color'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['header_color_link'])  && $customize['header_color_link']){ ?>
        header .header-main a{
            color: <?php echo $customize['header_color_link'] ?>!important;
        }
    <?php } ?>

    <?php if(isset($customize['header_color_link_hover'])  && $customize['header_color_link_hover']){ ?>
        header .header-main a:hover{
            color: <?php echo $customize['header_color_link_hover'] ?>!important;
        }
    <?php } ?>

   <?php //===================Menu=================== ?>
    <?php if(isset($customize['menu_bg']) && $customize['menu_bg']){ ?>
        .main-menu, ul.gva_menu{
            background: <?php echo $customize['menu_bg'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['menu_color_link']) && $customize['menu_color_link']){ ?>
        .main-menu ul.gva_menu > li > a{
            color: <?php echo $customize['menu_color_link'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['menu_color_link_hover']) && $customize['menu_color_link_hover']){ ?>
        .main-menu ul.gva_menu > li > a:hover{
            color: <?php echo $customize['menu_color_link_hover'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['submenu_background']) && $customize['submenu_background']){ ?>
        .main-menu .sub-menu{
            background: <?php echo $customize['submenu_background'] ?>!important;
            color: <?php echo $customize['submenu_color'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['submenu_color']) && $customize['submenu_color']){ ?>
        .main-menu .sub-menu{
            color: <?php echo $customize['submenu_color'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['submenu_color_link']) && $customize['submenu_color_link']){ ?>
        .main-menu .sub-menu a{
            color: <?php echo $customize['submenu_color_link'] ?>!important;
        }
    <?php } ?> 

    <?php if(isset($customize['submenu_color_link_hover']) && $customize['submenu_color_link_hover']){ ?>
        .main-menu .sub-menu a:hover{
            color: <?php echo $customize['submenu_color_link_hover'] ?>!important;
        }
    <?php } ?> 

    <?php //===================Footer=================== ?>
    <?php if(isset($customize['footer_bg']) && $customize['footer_bg'] ){ ?>
        #footer .footer-center{
            background: <?php echo $customize['footer_bg'] ?>!important;
        }
    <?php } ?>

     <?php if(isset($customize['footer_color'])  && $customize['footer_color']){ ?>
        #footer .footer-center{
            color: <?php echo $customize['footer_color'] ?> !important;
        }
    <?php } ?>

    <?php if(isset($customize['footer_color_link'])  && $customize['footer_color_link']){ ?>
        #footer .footer-center ul.menu > li a::after, .footer a{
            color: <?php echo $customize['footer_color_link'] ?>!important;
        }
    <?php } ?>    

    <?php if(isset($customize['footer_color_link_hover'])  && $customize['footer_color_link_hover']){ ?>
        #footer .footer-center a:hover{
            color: <?php echo $customize['footer_color_link_hover'] ?> !important;
        }
    <?php } ?>    

    <?php //===================Copyright======================= ?>
    <?php if(isset($customize['copyright_bg'])  && $customize['copyright_bg']){ ?>
        .copyright{
            background: <?php echo $customize['copyright_bg'] ?> !important;
        }
    <?php } ?>

     <?php if(isset($customize['copyright_color'])  && $customize['copyright_color']){ ?>
        .copyright{
            color: <?php echo $customize['copyright_color'] ?> !important;
        }
    <?php } ?>

    <?php if(isset($customize['copyright_color_link'])  && $customize['copyright_color_link']){ ?>
        .copyright a{
            color: $customize['copyright_color_link'] ?>!important;
        }
    <?php } ?>    

    <?php if(isset($customize['copyright_color_link_hover'])  && $customize['copyright_color_link_hover']){ ?>
        .copyright a:hover{
            color: <?php echo $customize['copyright_color_link_hover'] ?> !important;
        }
    <?php } ?>    
<?php endif; ?>    
</style>

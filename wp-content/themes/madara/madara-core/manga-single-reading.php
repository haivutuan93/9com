<?php
/** Manga paged * */
$chapters_url = get_query_var('chapter');
$chapters_arr = explode('-', $chapters_url);
$chapter_id = $chapters_arr[0];
$chapter_post_id = $chapters_arr[1];

$global_wp_manga_functions = madara_get_global_wp_manga_functions();

if ($chapter_id == '') {
    get_template_part(404);
    exit();
}
$wp_manga_chapter = madara_get_global_wp_manga_chapter();

$global_chapter_by_slug = $wp_manga_chapter->get_chapter_by_chapter_id($chapter_id);
$c_name = '';
if (!empty($chapter_id)) {
//    $chapter_json = $wp_manga->get_chapter(get_the_ID());
    $c_name = isset($global_chapter_by_slug['chapter_name']) ? $global_chapter_by_slug['chapter_name'] : '';
}

add_filter('pre_get_document_title', function( $title ) {
    global $global_wp_manga_functions, $global_chapter_by_slug;
    $cur_chap_name = $global_chapter_by_slug['chapter_name'];
    $title = get_the_title() . ' - ' . $cur_chap_name . ' - Truyện tranh';
    
    return $title;
}, 999, 1);

function custom_add_meta_description_tag() {
    $description = $description . 'Đọc truyện tranh ' . get_the_title() . ' tiếng Việt mới nhất tại 9comics.net. Kho truyện tranh, truyện chữ lớn nhất Việt Nam';
    ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta http-equiv="content-language" content="vi" />
    <?php
}

add_action('wp_head', 'custom_add_meta_description_tag', 999, 1);

get_header();

use App\Madara;

$wp_manga = madara_get_global_wp_manga();
$post_id = get_the_ID();
//$paged = !empty($_GET['manga-paged']) ? $_GET['manga-paged'] : 1;
//$style = !empty($_GET['style']) ? $_GET['style'] : 'paged';

//$chapters = $wp_manga->get_chapter(get_the_ID());

$wp_manga_settings = get_option('wp_manga_settings');
$related_manga = isset($wp_manga_settings['related_manga']['state']) ? $wp_manga_settings['related_manga']['state'] : null;

$madara_single_sidebar = madara_get_theme_sidebar_setting();
$madara_breadcrumb = Madara::getOption('manga_single_breadcrumb', 'on');
$manga_reading_discussion = Madara::getOption('manga_reading_discussion', 'on');

if ($madara_single_sidebar == 'full') {
    $main_col_class = 'sidebar-hidden col-xs-12 col-sm-12 col-md-12 col-lg-12';
} else {
    $main_col_class = 'main-col col-xs-12 col-sm-8 col-md-8 col-lg-8';
}
?>

<div class="c-page-content style-1">
    <div class="content-area" >
        <div class="container">
            <div class="row">
                <div class="main-col col-md-12 col-sm-12 sidebar-hidden">
                    <!-- container & no-sidebar-->
                    <div class="main-col-inner">
                        <div class="c-blog-post">
                            <div class="entry-header" id="manga-nav-header" name="<?php echo get_the_ID()?>" data-value="<?php echo get_query_var( 'chapter' )?>">
                                <div class="wp-manga-nav">
					<div class="entry-header_wrap">
						<?php   global $wp_manga_template;
                                                $wp_manga_template->load_template( 'manga', 'breadcrumb', true ); ?>
					</div>
                                </div>
                            </div>
                            <h1><?php echo the_title() . ': ' . $c_name; ?></h1>
                            <div class="entry-content">
                                <div class="entry-content_wrap">
                                    <div class="">

                                        <?php
                                        if ($wp_manga->is_content_manga(get_the_ID())) {
                                            $GLOBALS['wp_manga_template']->load_template('reading-content/content', 'reading-content', true);
                                        } else {
                                            $GLOBALS['wp_manga_template']->load_template('reading-content/content', 'reading-' . $style, true);
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <h1><?php echo the_title() . ': ' . $c_name; ?></h1>
                        </div>
                        <div class="c-select-bottom" >
						<div id="manga-nav-footer"></div>
						<div style="float: right; margin-top: 40px">
<?php
if (function_exists("kk_star_ratings")) : echo kk_star_ratings($pid);
endif;
?>
                        </div>

                        <?php if ($manga_reading_discussion == 'on') { ?>
                            <div class="row <?php echo ( $madara_single_sidebar == 'left' ) ? 'sidebar-left' : ''; ?>">
                                <div class="<?php echo esc_attr($main_col_class); ?>">
                                    <!-- comments-area -->
                                    <?php do_action('wp_manga_discusion'); ?>
                                    <!-- END comments-area -->
                                </div>

                                <?php
                                if ($madara_single_sidebar != 'full') {
                                    ?>
                                    <div class="sidebar-col col-md-4 col-sm-4">
                                        <?php get_sidebar(); ?>
                                    </div>
                                <?php }
                                ?>

                            </div>
                        <?php } ?>

                        <?php
                        if ($related_manga == 1) {
                            get_template_part('/madara-core/manga', 'related');
                        }

                        if (class_exists('WP_Manga')) {
                            $GLOBALS['wp_manga']->wp_manga_get_tags();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

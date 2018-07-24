<?php
	/** Manga Reading Content - Text type **/

	use App\Madara;

?>

<?php

	$name         = get_query_var('chapter');
	$chapter_type = get_post_meta( get_the_ID(), '_wp_manga_chapter_type', true );
	if( $name == '' ){
		get_template_part( 404 );
		exit();
	}

//	$this_chapter = madara_get_global_wp_manga_chapter()->get_chapter_by_slug( get_the_ID(), $name );
        global $global_chapter_by_slug;
        $this_chapter  = $global_chapter_by_slug;
        $chapter_post_id = $this_chapter['chapter_post_id'];
        
	if ( ! $this_chapter ) {
		return;
	}
        
        global $wpdb;
        $sql = "SELECT post_content FROM " . $wpdb->posts ." WHERE id = ".$chapter_post_id;
        $result = $wpdb->get_results ( $sql);
        $post_content = "";      
        foreach ( $result as $page )
        {
           $post_content = $page->post_content;
        }

		?>
			<?php if( $chapter_type == 'text' ){ ?>
				<div class="text-left">
					<?php echo $post_content; ?>
				</div>
			<?php }elseif( $chapter_type == 'video'){
			
			?>
				<div class="chapter-video-frame row">
					<?php echo $post_content; ?>
				</div>
			<?php } ?>

		<?php


	wp_reset_postdata();

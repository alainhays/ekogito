<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ekogito_Theme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="frontpage-grid" data-uk-grid>
        <?php
        if ( has_post_thumbnail() ) { 
        $thumb_id = get_post_thumbnail_id(get_the_ID());
        $small_screen = wp_get_attachment_image_src($thumb_id,'large-screen', true);
        $image_url = $small_screen[0];
        ?>
        <figure class="uk-width-small-1-1 uk-width-medium-1-1 uk-overlay uk-overlay-hover" style="height:170px">
            <img class="uk-overlay-scale" src="<?php echo($image_url) ?>" alt="Image">
            <div class="uk-overlay-panel uk-overlay-fade uk-overlay-background uk-text-middle">
                <div class="uk-overlay-panel uk-overlay-icon"></div>
            </div>
            <a class="uk-position-cover" href="<?php echo(get_permalink())  ?>"></a>
        </figure>
        <?php } ?>
        <div class="uk-panel uk-panel-box uk-width-small-1-1 uk-width-medium-1-1 uk-article uk-text-left">

            <?php
    			if ( is_single() ) {
    				the_title( '<h2 class="title entry-title uk-h2">', '</h2>' );
    			} else {
    				the_title( '<h2 class="title entry-title uk-h2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    			}
    		?>
    		<hr class="small-hr">
            <p class="uk-article-meta">
            <?php 
    		$categories_list = get_the_category_list( esc_html__( ', ', 'ekogito' ) );
    		if ( $categories_list && ekogito_categorized_blog()) {
    			printf( '<h6>' . esc_html__( ' %1$s - ', 'ekogito' ) . '', $categories_list ); // WPCS: XSS OK.
    		}
    		the_date( 'l, F j', '', '</h6>' ); 
    		?>
            </p>
            
            <p class="uk-article-lead">
            <?php
            if(has_excerpt()) {
    		    the_excerpt();   
    		} 
    		echo do_shortcode( '[jpshare]' );
    		?>
    		
            </p>
        </div>
    </div>
</article><!-- #post-## -->


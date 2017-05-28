<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
?>
   <div id="catch"><?php the_post_thumbnail();?></div>
    <header>
        <div class="title">f lutterone</div>
        <div class="sub">フロントエンドエンジニアしながらITコンサルのような</div>
    </header>

   
    <div id="headtitle">
       <a href="<?php the_permalink(); ?>">
        <div class="date"><?php the_time('y/m/d'); ?></div>
        <div class="title"><?php the_title(); ?></div>
        <div class="writer">written by Shoichi Sakai</div>
        </a>
    </div>        
<?php
			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );


			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->



</div><!-- .content-area -->

<?php get_sidebar(); ?>

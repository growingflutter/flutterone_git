<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1
  );
  $st_query = new WP_Query( $args );
?>
<?php if ( $st_query->have_posts() ): ?>
  <?php while ( $st_query->have_posts() ) : $st_query->the_post(); ?>

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
<?php endwhile; ?>
<?php endif; ?>   
   
    <div id="mainBody">
        <div class="flex-container">
            
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        <div style="clear:both"></div>
        </div>
    </div>


<?php get_sidebar(); ?>

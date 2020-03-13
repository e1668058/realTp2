<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */
// The Query

        //Utiliser ca pour afficher la description : term_description( $category );
        $args = array(
            "category_name" => "evenement",
            "posts_per_page"=> 3,
            "orderby"=>'date',
            'order' => 'ASC'
            
        );
        $query1 = new WP_Query( $args );


        /* The 2nd Query (without global var) */
        $args2 = array(
            "category_name" => "nouvelle",
            'posts_per_page' => 3,
            "orderby"=>'date',
            'order' => 'DESC'
        );
        $query2 = new WP_Query( $args2 );
       
get_header();
?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main">
    
		<?php
        
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
        ?>

        </div>
        

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

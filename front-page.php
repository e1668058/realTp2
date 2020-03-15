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
        
        <div class="content-Nouvelle">
            <?php 
            echo '<h2>Nos 3 derniers articles</h2>';
            echo '<div class="nouvelle">';
            while ($query2->have_posts()) {
                $query2->the_post();
                    echo '<div class="infoNouvelle">';
                    $link = get_permalink();
                    $title = get_the_title();
                    echo '<div class="titleNouvelle">';
                        echo '<h4><a href='.$link.'>'.$title.'</a></h4>';
                    echo '</div>';

                    echo '<div class="imgNouvelle">';
                        echo get_the_post_thumbnail($post, 'thumbnail');
                    echo '</div>';
                    echo '</div>';
            }
            echo '</div>';
            ?>
        </div>

        <div class="content-Evenement">
            <?php 
            echo '<h2>Voici les 3 prochains événements à venir</h2>';
            while ($query1->have_posts()) {
                $query1->the_post();
                echo '<div class="evenement">';
                echo '<p><i>Survoler l\'image!</i></p>';
                    echo '<div class="imgEvenement">';
                        echo get_the_post_thumbnail($post, 'thumbnail');
                    echo '</div>';

                    $link = get_permalink();
                    $title = get_the_title();
                    echo '<div class="infoEvenement">';
                        echo '<h4><a href='.$link.'>'.$title.' - '.get_the_date('d/m/Y').'</a></h4>';
                        echo '<p>'.substr(get_the_excerpt(),0,200) .'.</p>';
                        echo '<div class=pathSquare></div>';
                    echo '</div>';
                echo '</div>';
            }
            wp_reset_postdata();
            ?>
        </div>

        </div>
        

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Boom_Festive
 */

 get_header();
 ?>
		 <div class="content-area">
			 <main>
				 <div class="container">
					 <div class="row">
					 <div class="col-lg-9 col-md-8 col-12">
						 <h1><?php esc_html_e('Search results for:','boom-festive');?><?php echo get_search_query(); ?></h1>
 
						 <?php 
						 // Include the search form once again
						 get_search_form();
 
							 // If there are any posts
							 if( have_posts() ):
 
								 // Load posts loop
								 while( have_posts() ): the_post();
								 get_template_part('template-parts/content','search');
								 endwhile;
 
								 // We're using numeric page navigation here.
								 the_posts_pagination( array(
									 'prev_text'		=> esc_html__('Previous','boom-festive'),
									 'next_text'		=> esc_html__('Next','boom-festive'),
								 ));
							  // If no content, display the following message	
							 else:
						 ?>
							 <p><?php esc_html_e('Nothing to display.','boom-festive');?></p>
						 <?php endif; 
						 ?>
					 </div>
					 <?php 
			 // Display the main sidebar
			 get_sidebar(); 
			 ?>
				 </div>
			 </div>
			 </main>
		 </div>
 <?php get_footer(); ?>
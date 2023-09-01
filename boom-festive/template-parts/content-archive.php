<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Boom_Festive
 */
?>
<article>
<div class="the-post">   
    <h2 class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
<div class="post-thumbnail">
    <?php 
    if( has_post_thumbnail() ):
        the_post_thumbnail( 'ibs-blog', array( 'class' => 'img-fluid' ) );
    endif;
    ?>
</div>
<p>
    <?php esc_html_e( 'Published by', 'boom-festive' ); ?> <?php the_author_posts_link(); ?>
    <?php esc_html_e('on', 'boom-festive'  ); ?> <a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
    <br />
    <?php esc_html_e( 'Categories', 'boom-festive' ); ?>: <span><?php the_category( ' ' ); ?></span>
</p>
<?php if( has_excerpt() ): ?>
        <div class="content"><?php the_excerpt(); ?></div>
    <?php elseif( strpos( $post->post_content, '<!--more-->' ) ): ?>
	   <div class="content"><?php the_content( 'More' ); ?></div>
    <?php else: ?>
         <div class="content"><?php the_excerpt(); ?></div>
    <?php endif; ?>
    </div>
</article>
<?php 
get_header(); ?>

<div class="band page">
	<div class="container">	
		<div class="row">	
			<article class="col-sm-3">
				<div class="sidebar">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('product') ) :  endif; ?>	
				</div>
			</article>
			<div class="col-sm-9">	
				<article class="post">
				
				<?php if( have_posts()) : while ( have_posts() ) : the_post();?>
				
					<article class="post-content">
						<?php the_title(); ?>
						<?php the_content(); ?>
					</article>					
				
				<?php  endwhile; endif;?>
				<div class="comments" id="comments">
					<!--<h3>comments here</h3>-->
				</div>
			</article><!-- .post -->						
			</div>		
			
			
		</div><!-- .8 -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
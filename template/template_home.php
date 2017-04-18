<?php /* Template Name: Home*/
get_header(); ?>
<div class="band pagehome">		
	<div class="containers">	
		<div class="row">	
			<div class="col-md-12"> 				
				<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
		
				<?php the_content(); ?>
					
				<?php  endwhile; endif;?>
				
			</div><!-- .col8 -->			
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .band.page -->

<?php get_footer(); ?>
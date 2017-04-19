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
				<div class="container">
				
				<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
				
					<div class="col-md-3">
						<div class="room-post">
							<?php if(has_post_thumbnail()){ ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('small'); ?>
								</a>
							<?php }  else { 
								echo '<a href="'.get_the_permalink().'"><img src="http://placehold.it/255x255"></a>';
							} ?>
								
							
							<div class="inner text-center">
								<h4 class="">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<p class="">
									<?php 
										$price = rwmb_meta( 'product_price' , true );
										if( $price ) {
											echo "Rp" . number_format( $price ); 
										} else {
											echo "&nbsp";
										}
									?>
								</p>
								
							</div>					
						</div>
					</div>					
				
				<?php  endwhile; endif;?>
				<div class="comments" id="comments">
					<!--<h3>comments here</h3>-->
				</div>
			</div><!-- .post -->						
			</div>		
			
			
		</div><!-- .8 -->
	</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
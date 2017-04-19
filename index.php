<?php 
get_header(); ?>
<?php 
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) ) {
	if (siteorigin_panels_render( get_the_ID())){
		$so_active_status ="so_active";
		$so_col = 12;
		$so_sidebar = 'hidden';
	} else {
		$so_active_status ="";
		$so_col = 9;
		$so_sidebar = '';
	}
} else {
	$so_active_status ="";
	$so_col = 9;
	$so_sidebar = '';
}
?>
<div class="band page <?php echo $so_active_status; ?>">
	<div class="container">	
		<div class="row">	
			<article class="col-sm-3 <?php echo $so_sidebar; ?>">
				<div class="sidebar">
				<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single') ) :  endif; ?>	
				</div>
			</article>
			<div class="col-sm-<?php echo $so_col; ?>">	
				<article class="post">
				
				<?php if(have_posts()) : while ( have_posts() ) : the_post();?>
				
					<article class="post-content">
						
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
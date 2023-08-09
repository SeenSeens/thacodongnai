<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thacodongnai
 */

get_header();
?>
	<div name="Breadcrumb">
	    <div class="list-breadcrumb">
	        <div class="container">
	            <ul class="nav-breadcrumb">
	                <li class="Roboto-Regular">
	                    <a href="/" class="nuxt-link-active">
	                    Trang chủ
	                    </a> 
	                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-angle-right">
	                        <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path>
	                    </svg>
	                </li>
	                <li class="Roboto-Regular">
	                    <a href="/news" class="">
	                    Tin tức
	                    </a> 
	                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-angle-right">
	                        <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path>
	                    </svg>
	                </li>
	                <li class="Roboto-Regular">
	                    <span> THACO FRONTIER TF2800 - MẪU XE TẢI NHẸ MÁY DẦU HOÀN TOÀN MỚI </span> 
	                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-angle-right">
	                        <path fill="currentColor" d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" class=""></path>
	                    </svg>
	                </li>
	            </ul>
	        </div>
	    </div>
	</div>

	<div class="post">
		<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'thacodongnai' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'thacodongnai' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
	</div>

<?php
get_sidebar();
get_footer();

<?php get_header(); ?>
<?php
$query = new WP_Query( [
	'post_type' => 'xe-tai',
	'post_status' => 'publish',
	'posts_per_page' => -1,
] );
$tai_trong = get_field('tai_trong', get_the_ID());
$chieu_dai_thung = get_field('chieu_dai_thung', get_the_ID());
$thung_ben = get_field('thung_ben', get_the_ID());
$dich_vu_247 = get_field('dich_vu_247', get_the_ID());
?>
<div class="container-fluid">
	<div class="item-car">
		<div class="row">
			<?php
			if( $query->have_posts()) :
				while( $query->have_posts() ) :
					$query->the_post();
			?>
			<div class="col-xs-12 col-sm-12 col-md-3 mt-3">
				<div class="list-item-car text-center">
					<h4>
						<a class="post-title" href="<?php the_permalink() ?>">
							<span class="blog-thumb">
								<?php the_post_thumbnail( '', [ 'class' => 'img-responsive center-block wp-post-image' ] ); ?>
								<span class="hover"></span>
							</span>
							<span class="post-title"><?php the_title(); ?></span>
						</a>
					</h4>
					<div class="info-specification">
                        <?php if (!empty($tai_trong)) { ?>
                        <div class="specification">
                            <span class="specification-left Roboto-Regular">Tải trọng:</sapn>
                            <span class="specification-right Roboto-Bold"><?= $tai_trong; ?></span>
                        </div>
                        <?php } ?>
                        <?php if (!empty($chieu_dai_thung)) { ?>
                        <div class="specification">
                            <span class="specification-left Roboto-Regular">Chiều dài thùng:</span>
                            <span class="specification-right Roboto-Bold"><?= $chieu_dai_thung; ?></span>
                        </div>
                        <?php } ?>
                        <?php if (!empty($thung_ben)) { ?>
                        <div class="specification">
                            <span class="specification-left Roboto-Regular">Thùng ben:</span>
                            <span class="specification-right Roboto-Bold"><?= $thung_ben; ?></span>
                        </div>
                        <?php } ?>
                        <?php if (!empty($dich_vu_247)) { ?>
                        <div class="specification">
                            <span class="specification-left Roboto-Regular">Dịch vụ 24/7:</span>
                            <span class="specification-right Roboto-Bold"><?= $dich_vu_247; ?></span>
                        </div>
                        <?php } ?>
                    </div>
					<a href="<?php the_permalink(); ?>" class="readmore btn btn-success">Xem tiếp</a>
				</div>
			</div>
			<?php
				endwhile;
			endif;
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
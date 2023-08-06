<?php
get_header();

$cates = get_categories([
    'hide_empty' => 0,
    'taxonomy' => 'category',
    'post_type' => 'post',
    'parent' => 0
]);
?>
<div class="margin-header">
	<div class="news-list-tab">
	    <div class="container">
	        <ul role="tablist" class="news-list-tab__wapper nav nav-tab" id="newstab">
	            <?php foreach ($cates as $index => $cate) { ?>
	            <li class="nav-item news-list-tab__wapper-item">
	            	<a href="#<?= $cate->slug; ?>" class="news-list-tab__wapper-text nav-link c-text-base Roboto-Bold <?= ($index === 0) ? 'active' : ''; ?>">
	                <?= $cate->name; ?>
	                </a>
	            </li>
	        	<?php } ?>
	        </ul>
	    </div>
	</div>
	<div class="news">
		<div class="container-customize">
			<div class="tab-content">
				<?php foreach( $cates as $index => $cate ) { ?>
				<div class="news-content tab-pane fade show <?= ($index === 0) ? 'active' : ''; ?>" id="<?= $cate->slug; ?>">
					<div class="tab-new-content">
					    <div class="list-post">
					    	<?php
					    	$query = new WP_Query( [
								'cat' => $cate->term_id,
								'post_type' => 'post',
								'posts_per_page' => 3,
							] );
							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
					    	?>
					        <div class="list-post__item aos-init aos-animate">
					            <div class="list-post__item-image">
					            	<a href="<?php the_permalink() ?>" class="scale-image image">
					            		<?php the_post_thumbnail( '', [ 'class' => 'w-100' ] ) ?>
					            	</a>
					            </div>
					            <div class="list-post__item-wrapper">
					                <div class="date-post c-text-base">
					                    <?php the_modified_date('d/m/Y'); ?>
					                </div>
					                <h3 class="list-post__item-title">
					                	<a href="<?php the_permalink(); ?>" class="c-text-lg Roboto-Bold">
					                    <?php the_title(); ?>
					                    </a>
					                </h3>
					            </div>
					            <div class="list-post__item-action c-text-base">
					                <div class="list-post__item-desc">
					                    <?php the_excerpt(); ?>
					                </div>
					                <a href="<?php the_permalink(); ?>" class="list-post__item-btn">
					                    <span>Xem chi tiết</span>
					                    <i class="fa-solid fa-chevron-right fa-shake"></i>
					                </a>
					            </div>
					        </div>
					        <?php
					    		}
					    	}
					        ?>
					    </div>
					</div>
					<div class="display-list-news">
					    <div class="display-list-news-left">
					    	<?php
					    	$posts = $query->get_posts();
							$excluded_post_ids = array();
							foreach ($posts as $post) {
							    $excluded_post_ids[] = $post->ID;
							}
					    	$query = new WP_Query( [
								'cat' => $cate->term_id,
								'post_type' => 'post',
								'posts_per_page' => -1,
								'post__not_in' => $excluded_post_ids,
							] );
							if( $query->have_posts() ) {
								while( $query->have_posts() ) {
									$query->the_post();
					    	?>
					        <div class="item-new-display">
					            <div class="left">
					                <div class="img-list-new">
					                	<a href="<?php the_permalink(); ?>">
					                		<?php the_post_thumbnail( '', [ 'class' => 'w-100' ] ); ?>
					                	</a>
					                </div>
					            </div>
					            <div class="right">
					                <div class="content-list-new">
					                    <a href="<?php the_permalink(); ?>" class="">
					                        <div class="c-text-lg Roboto-Bold">
					                            <p><?php the_title(); ?></p>
					                        </div>
					                    </a>
					                    <div class="date-time">
					                    	<span class="date">
					                    		<i class="far fa-calendar-alt"></i> <span><?php the_modified_date('d/m/Y'); ?></span>
					                    	</span>
					                    </div>
					                    <div class="content-display c-text-base VN-KiaSignature-Light">
					                        <p><?php the_excerpt(); ?></p>
					                    </div>
					                </div>
					            </div>
					        </div>
					        <?php
					        	}
					    	}
					        ?>
					    </div>
					</div>
					<?php pagination(); ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
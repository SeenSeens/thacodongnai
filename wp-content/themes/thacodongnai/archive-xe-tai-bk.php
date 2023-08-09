<?php
get_header();
$post_type = 'xe-tai';
$cates = get_categories([
    'hide_empty' => 0,
    'taxonomy' => 'tax-thuong-hieu',
    'post_type' => $post_type,
    'parent' => 0
]);
$taxonomies = get_object_taxonomies( $post_type, 'objects' );
?>
	<div class="product">
		<div class="navbar__logo">
    		<ul id="myTab" role="tablist" class="navbar__logo--wapper nav nav-tab">
    			<?php
    			foreach ($cates as $index => $cate) { 
    				$taxonomy_image = get_field('anh_dai_dien_thuong_hieu', 'tax-thuong-hieu_' . $cate->term_id);
    			?>
        		<li class="nav-item navbar__logo--wapper-item">
        			<a href="#<?= $cate->slug; ?>" class="navbar__logo--wapper-image nav-link nuxt-link-exact-active nuxt-link-active <?= ($index === 0) ? ' active' : ''; ?>">
        				<?php if ($taxonomy_image) { ?>
        					<img src="<?= esc_url($taxonomy_image['url']); ?>">
        				<?php } ?>
        			</a>
        		</li>
        		<?php } ?>
    		</ul>
		</div>
		<div class="product__wapper">
			<div class="container-customize">
				<div class="product__wapper-block">
					<div class="product__wapper-left">
						<div class="product__wapper-left-filter">
							<div class="product-filter btn-info c-text-base Roboto-Bold">Bộ lọc</div>
							<div class="accordion">
								<div class="card product__wapper-left-filter-card">
								    <div class="card collapsed btn-looking-info product__wapper-left-filter-header">
								        <div class="card-body">
								        	<?php foreach ($taxonomies as $taxonomy) { ?>
								            <button type="button" class="btn w-100 c-text-base Roboto-Bold product__wapper-left-filter-title text-start btn-info not-collapsed" id="<?php echo $taxonomy->name; ?>">
								                <?php echo $taxonomy->labels->name; ?>
								            </button>
								        	<?php } ?>
								        </div>
								    </div>
								    <?php
								    foreach ($taxonomies as $taxonomy) {
								    	if ($taxonomy->hierarchical) {
									    	$cates = get_terms( [
											    'hide_empty' => 0,
											    'taxonomy' => $taxonomy->name,
											    'post_type' => $post_type,
											    'parent' => 0
											] );
											if (!empty($cates) && !is_wp_error($cates)) {
								    ?>
								    <div class="product__wapper-left-filter-list collapse" id="<?php echo $taxonomy->name; ?>">
							            <div class="card-body">
							                <ul>
							                    <li>
							                    	<?php foreach ($cates as $i => $cate) { ?>
							                        <fieldset class="form-group">
							                        	<input id="<?php echo $cate->slug; ?>" type="radio" class="checkbox brand__check" value="<?php echo $cate->name; ?>">
							                        	<label for=""><?php echo $cate->name; ?></label>
							                        </fieldset>
							                    	<?php } ?>
							                    </li>
							                </ul>
							            </div>
								    </div>
								    <?php
								    		}
								    	}
									}
								    ?>
								</div>
							</div>
						</div>
					</div>
					<div class="product__wapper-right"></div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	


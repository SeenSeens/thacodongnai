<?php get_header(); ?>
    <?php custom_post_type_breadcrumb(); ?>
    <?php
    $query = new WP_Query( [
        'post_type' => 'dich-vu',
        'post_status' => 'publish',
    ] );
    ?>
    <div class="service-content tab-pane fade show active">
        <div class="card">
            <div class="tabs">
                <div class="card-header">
                    <ul role="tablist" class="nav nav-tabs card-header-tabs">
                        <?php
                        if( $query->have_posts()) {
                            $index = 0; // Đánh số tab bắt đầu từ 0
                            while( $query->have_posts() ) {
                                $query->the_post();
                        ?>
                        <li class="nav-item">
                            <a class="nav-link<?php echo ($index === 0) ? ' active' : ''; ?>" data-toggle="tab" href="#tab-<?php echo $index; ?>"><?php the_title(); ?></a>
                        </li>
                        <?php
                                $index++; // Tăng số tab lên 1 sau mỗi lần lặp
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php
                    // Reset lại query để lặp lại từ đầu
                    rewind_posts();
                    $index = 0; // Đánh số tab bắt đầu từ 0
                    while( $query->have_posts() ) {
                        $query->the_post();
                    ?>
                    <div class="tab-pane<?php echo ($index === 0) ? ' active' : ''; ?>" id="tab-<?php echo $index; ?>">
                        <div class="container">
                            <div class="introduction">
                                <div class="introduction-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $index++; // Tăng số tab lên 1 sau mỗi lần lặp
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

<?php get_header(); ?>

<div class="page__contents">
  <section class="update">
    <h2 class="update__title">RECENT UPDATE</h2>
    <div class="update__list">
      <?php query_posts('posts_per_page=5'); ?>
      <ul class="updateList">
        <?php while (have_posts()) : the_post(); ?>
          <li class="updateList__item">
            <a class="updateList__link" href="<?php the_permalink(); ?>">
              <div class="updateList__imgWrapper" style="background-image:url(<?php echo catch_that_image(); ?>)"></div>
              <div class="updateList__titleWrapper">
                <h3 class="updateList__title"><?php the_title(); ?></h3>
                <p class="updateList__date"><date><?php the_time('Y/m/d H:i'); ?></date></p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div><!-- /.update__list -->
    <a class="update__more" href="#">MORE</a>
  </section>
</div><!-- /.page__contents -->

<?php get_footer(); ?>

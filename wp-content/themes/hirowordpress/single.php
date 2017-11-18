<?php get_header(); ?>

<div class="page__contents">
  <article id="post-<?php the_ID(); ?>" class="article">
    <?php while (have_posts()) : the_post(); ?>
      <h1 class="article__title"><a class="article__permalink" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><h1>
      <date class="article__date"><?php the_date(); ?></date>
      <div class="article__content">
        <div class="theContent">
          <?php the_content(); ?>
        </div>
      </div>
    <?php endwhile; ?>
  </article>
</div><!-- /.page__contents -->

<?php get_footer(); ?>

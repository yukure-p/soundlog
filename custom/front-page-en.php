<?php get_header(); ?>

    <div class="l-entry">
      <div class="mvimg"><img src="<?php echo get_template_directory_uri()?>/img/mv.svg" alt="soundlog"></div>
      <div class="mvtype"></div>
    </div>


    <div class="l-container">
      <article>
        <div class="l-contents" id="result">
          <?php get_template_part( 'search' ); ?>
        </div>
      </article>
    </div>

<?php get_footer(); ?>


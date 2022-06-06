<?php get_header(); ?>







    <div class="l-entry">
      <?php breadcrumb(); ?>
      <section>
        <div class="entry-box">
          <h1 class="list-tit"><span>MUSIC</span></h1>
        </div>
      </section>
    </div>
    <!-- /.l-entry -->

    <div class="l-container">
      <article>
        <div class="l-contents" id="result">
          <?php get_template_part( 'search' ); ?>
        </div>
      </article>
    </div>


<?php get_footer(); ?>

<?php get_header(); ?>


    <div class="l-entry">
        <?php breadcrumb(); ?>
      <section>
        <div class="entry-box">
          <h1 class="list-tit"><?php single_term_title(); ?></h1>
        </div>
      </section>
    </div>

    <div class="l-container">
      <article>
        <div class="l-contents" id="result">

          <?php
          $term = get_the_terms($post->ID, 'genre');
          if (have_posts()) : while (have_posts()) : the_post(); ?>
          <div class="l-box">
            <section>
              <div class="contents-list">
                <div class="date">
                  <time datetime="<?php echo get_the_date('Y.n.d'); ?>"><?php echo get_the_date('Y.n.d'); ?></time>
                </div>
                <div class="box-img">
                  <a href="<?php echo get_permalink($post->ID); ?>" class="linkBl01">
                    <?php
                      $thumbnail_id = get_post_thumbnail_id($post->ID);
                      $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'music-list');
                      if (get_post_thumbnail_id($post->ID)) {
                        echo '<img src="' . $thumb_url[0] . '" alt="">';
                      } else {
                        echo '<img src="' . get_template_directory_uri() . '/img/img-default.png" alt="">';
                      }
                    ?>      
                  </a>

                  <h1 class="list-title">
                    <a href="<?php echo get_permalink($post->ID); ?>" class="link03"><?php echo get_the_title($post->ID); ?></a>
                  </h1>
                  
                </div>

                <?php
                  $terms = get_the_terms($post->ID, 'genre');
                  if($terms):
                    echo '<ul class="category-tag" arial-label="タグ">';

                    foreach($terms as $term):
                      $term_name = $term->name;
                      $term_link = get_term_link( $term );
                      echo '<li><a href="'.$term_link.'" class="link01">'.$term_name.'</a></li>';
                    endforeach;
                    echo '</ul>';
                  endif;
                ?>
                <?php
                  $terms = get_the_terms($post->ID, 'type');
                  if($terms):
                    echo '<ul class="type-tag" arial-label="タグ">';
                    foreach($terms as $term):
                      $term_name = $term->name;
                      $term_link = get_term_link( $term );
                      echo '<li><a href="'.$term_link.'" class="link02">'.$term_name.'</a></li>';
                    endforeach;
                    echo '</ul>';
                  endif;
                ?>
              </div>
            </section>
          </div>
          <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
      </article> 
    </div>
    
<?php get_footer(); ?>

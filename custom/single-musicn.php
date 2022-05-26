<?php get_header(); ?>
<?php if(have_posts()):?>
<?php while (have_posts()): the_post(); ?>

  <div class="l-entry">
    <?php breadcrumb(); ?>
    <section>
      <div class="entry-box">
        <div class="inner-entry-box">
          <div class="date">
            <time datetime="<?php echo get_the_date('Y.n.d'); ?>"><?php echo get_the_date('Y.n.d'); ?></time>
          </div>
          <h1 class="detail-title"><?php the_title(); ?></h1>
        </div>
      </div>
    </section>
  </div>
  <!-- /.l-entry -->


  <div class="l-container">
    <article>
      <div class="l-contents">
        <div class="detail-content">
          <div class="detail-box">
            <section>
              <?php the_content(); ?>
              <div class="detain-innerbox">
                <h1 class="box-tit01">h1 テキスト</h1>
                <p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                <p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
              </div>
              
              <div class="detain-innerbox">
              <h2 class="box-tit02">テキスト</h1>
                <p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
              </div>

              <div class="detain-innerbox">
                <h3 class="box-tit03">テキスト</h1>
                <p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                <p class="txt">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
                <p class="txt">テキスト</p>
                <p class="txt">テキスト</p>
                <p class="txt">テキストp</p>
              </div>

              <div class="content-movie">
                <div class="movie">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/s37fF9SLN6Q" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <p class="txt-cap">textテキストアイウエpあいうえお</p>
              </div>

              <div class="detain-innerbox">
                <p class="txt">テキスト</p>
                <p class="txt">テキスト</p>
              </div>
              </section>
          </div>
          
          <div class="detail-aside">
            <section class="detail-box-inner">
              <div class="detail-img">
                <?php
                  // アイキャッチ画像を取得
                  $thumbnail_id = get_post_thumbnail_id($post->ID);
                  $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'music-list');
                  if (get_post_thumbnail_id($post->ID)) {
                    echo '<img src="' . $thumb_url[0] . '" alt="">';
                  } else {
                    // アイキャッチ画像が登録されていなかったときの画像
                    echo '<img src="' . get_template_directory_uri() . '/img/img-default.png" alt="">';
                  }
                ?>   
              </div>
              <ul class="detail-info">
                <li><span class="agenda">ARTIST</span><a href="" class="link01"><?php the_field('artist'); ?></a></li>
                <li><span class="agenda">TITLE</span><?php the_field('title'); ?></li>
                <li><span class="agenda"><?php the_field('format'); ?></span><?php the_field('content-tit'); ?></li>
                <li><span class="agenda">RELEASE</span><?php the_field('release'); ?></li>
              </ul>

              <div class="detail-tag">
                <!-- <h1 class="tag-tit">Category</h1> -->
                <?php
                  $terms = get_the_terms($post->ID, 'genre');
                  if($terms):
                    echo '<ul class="category-tag" arial-label="タグ">';

                    foreach($terms as $term):
                      $term_name = $term->name;
                      $term_link = get_term_link( $term );    //$termはオブジェクトなので第二引数は省略可
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
                      $term_link = get_term_link( $term );    //$termはオブジェクトなので第二引数は省略可
                      echo '<li><a href="'.$term_link.'" class="link02">'.$term_name.'</a></li>';
                    endforeach;

                    echo '</ul>';
                  endif;
                ?>
              </div>

            </section>
          </div>
        </div>
       
      </div>
      <!-- /.l-contents -->
    </article> 
  </div>
  <!-- /.l-container -->
</div>
<!-- /.l-flame -->
<?php endwhile; ?>
<?php endif; ?>

        <?php get_template_part('template-parts/similar'); ?>
        

<div class="l-frame">
  <div class="l-container">
    <article> 
      <div class="l-contents">
        <h1 class="list-tit">TECHNO</h1>

        <div class="l-list space-topXL" id="result">
          <?php get_template_part( 'search' ); // 検索フォームを読み込み. ?>

        </div>

      </div>
      <!-- /.l-contents -->
    </article> 
  </div>
  <!-- /.l-container -->
















<?php get_footer(); ?>

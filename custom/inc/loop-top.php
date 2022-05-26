
<?php
$args = array(
  'post_type' => 'music',// 投稿タイプを指定
  'posts_per_page' => -1,// 表示する記事数
  'orderby' => 'date', //日付で並び替え
  'order' => 'DESC' // 降順 or 昇順
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ): 
  while ( $the_query->have_posts() ): 
    $the_query->the_post(); 
?>



          <div class="l-box ss">
            <section>
              <div class="contents-list">
                <div class="date">
                  <time datetime="<?php echo get_the_date('Y.n.d'); ?>"><?php echo get_the_date('Y.n.d'); ?></time>
                </div>
                <div class="box-img">
                  <a href="<?php echo get_permalink($post->ID); ?>" class="linkBl01">
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
          <!-- /.l-box -->


<?php endwhile;
endif;

?>
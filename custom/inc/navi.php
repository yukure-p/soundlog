    <nav>
      <div class="l-gnav">

        <div class="gnav-botton gnav-btn">
         <span class="gnav-line"></span><span class="gnav-line"></span><span class="gnav-line"></span>
        </div>

        <div class="gnav-menu gnav-inputbox">

          <div class="gnav-inner">
            <form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="fetchForms" method="POST" name="f">
            <h1>CATEGORY</h1>
            <ul>

                <!-- <input type="hidden" name="search_type" value="echo ( $form_type ) "> -->
                <?php
                $genre = get_terms( 'genre' );
                if ( ! empty( $genre ) ) :?>
                <?php foreach ( $genre as $item ) : ?>
    
              <li>
                <label class="check-box">
                  <input class="check-input" type="checkbox" name="genre[]" id="<?php echo esc_attr( $item->slug ); ?>" value="<?php echo esc_attr( $item->slug ); ?>"
                  <?php
                  if ( ! empty( $selected_genre ) ) {
                    echo in_array( $item->slug, $selected_genre, true ) ? 'checked' : '';
                    }
                  ?>
                  >

                  <span class="check-label">
                    <span class="check-text"><?php echo esc_attr( $item->name ); ?></span>
                  </span>
                </label>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="gnav-inner">
            <h1>TYPE</h1>
            <ul>
              <?php
                $type = get_terms( 'type' );
                if ( ! empty( $type ) ) :
                  ?>
                  <?php foreach ( $type as $item ) : ?>
              <li>
                <label class="check-box">
                  <input class="check-input" type="checkbox" name="type[]" id="<?php echo esc_attr( $item->slug ); ?>" value="<?php echo esc_attr( $item->slug ); ?>"
                  <?php
                  if ( ! empty( $selected_type ) ) {
                    echo in_array( $item->slug, $selected_type, true ) ? 'checked' : '';
                  }
                  ?>
                  >
                  <span class="check-label">
                    <span class="check-text"><?php echo esc_attr( $item->name ); ?></span>
                  </span>
                </label>
              </li>
              <?php endforeach; ?>
              <?php endif; ?>
            </ul>
            <input type="hidden" name="s" value="" />
            <input lang="en" type="hidden" id="searchsubmits">
            </form>
          </div>

          <div class="gnav-inner">
            <div class="result-box">
              
              <div class="result-inner">
                <div class="result-tit">件数 /</div>
                <div class="result-num"> 
                  <div class="num">
                    <?php
                      $args = array(
                        'post_type' => 'music',// 投稿タイプを指定
                        'posts_per_page' => -1,// 表示する記事数
                        'orderby' => 'date', //日付で並び替え
                        'order' => 'DESC' // 降順 or 昇順
                      );
                    $the_query = new WP_Query( $args );?>
                    <?php if ( is_front_page() ) {
                      echo $the_query->found_posts;
                    }else if( is_tax() ) {
                      echo $wp_query->post_count;
                    }else if( is_single() ) {
                      echo $the_query->found_posts;
                    }else if( is_archive() ) {
                      echo $wp_query->post_count;
                    }?></div>
                  <div class="spin-box spin">
                    <div class="spin-core"></div>
                  </div> 
                </div>
              </div>
              <div class="gnav-btn">SHOW RESULT</div>
            </div>
          </div>

          <div class="gnav-inner">
            <ul>
              <li><a class="link01">ARTIST LIST</a></li>
              <li><a class="link01">ABOUT</a></li>
              <li><a class="link01">CONTACT</a></li>
              <!-- <li><a class="link01"><img src="/img/common/logotw.svg"></a></li> -->
            </ul>
          </div>

        </div>
      </div>
    </nav>

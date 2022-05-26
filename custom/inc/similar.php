        <?php
        $posts = get_field('similar');
        if( $posts ):
        ?>
        <div class="l-contents">
          <section>
            <div class="similar-box">
              <h1 class="sim-tit">同じタイプの曲</h1>
              <div class="similar-box-inner">

                <?php foreach( $posts as $post ): ?>
                <div class="l-box">
                  <section>
                    <div class="contents-list">
                      <div class="box-img">
                        <a href="<?php echo get_permalink( $post->ID ); ?>" class="linkBl01">
                          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>">
                        </a>
                          <h1 class="list-title"><a href="<?php echo get_permalink( $post->ID ); ?>" class="link03"><?php echo get_the_title( $post->ID ); ?></a></h1>
                        
                      </div>
                    </div>
                  </section>
                </div>
                <!-- /.l-box -->

                <?php endforeach; ?>

              </div>
            </div>
          </section>
        </div>
        <!-- /.l-contents -->
        <?php endif; ?>
          <div class="nav-inner">
            <h1 class="nav-title">CATEGORY</h1>
            <ul>

              <form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="fetchForm" method="POST" id="searchform">
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

          <div class="nav-inner">
            <h1 class="nav-title">TYPE</h1>
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
            <input lang="en" type="hidden" id="searchsubmit">
            <?php wp_nonce_field( 'my_nonce' ); ?>  
            </form>
          </div>



        
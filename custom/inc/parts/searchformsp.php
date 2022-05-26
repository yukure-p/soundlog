          <div class="nav-inner">
            <h1 class="nav-title">CATEGORY</h1>
            <ul>
            
              <form role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="fetchForms" method="POST" name="f">
                
              
            </ul>
          </div>

          <div class="nav-inner">
            <h1 class="nav-title">TYPE</h1>
            <ul>
              <?php
                $typee = get_terms( 'type' );
                if ( ! empty( $typee ) ) :
                  ?>
                  <?php foreach ( $typee as $item ) : ?>
              <li>
                <label class="check-boxs">
                  <input class="check-input" type="checkbox" name="type[]" id="<?php echo esc_attr( $item->slug ); ?>" value="<?php echo esc_attr( $item->slug ); ?>"
                  <?php
                  if ( ! empty( $selected_typee ) ) {
                    echo in_array( $item->slug, $selected_typee, true ) ? 'checked' : '';
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



        
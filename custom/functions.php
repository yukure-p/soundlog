<?php
/**
 * テーマのセットアップ
 */
function yukury_theme_setup() {
  // タイトルタグ（<title>）の出力.
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_image_size( 'page_eyecatch', 1100, 610, true );
  add_image_size( 'archive_thumbnail', 432, 332, true );
  add_image_size('music-list', 500, 338, true);
  // add_image_size('new-articles', 150, 112, true);
}
//テーマが呼び出された後に、yukuryのテーマをセットアップする.
add_action( 'after_setup_theme', 'yukury_theme_setup' );


function yukury_enqueue_scripts(){
  wp_enqueue_script(
    '',
    get_template_directory_uri() . '/js/common.min.js',
    array(),
    '1.0.0',
    //trueを設定すると、wp_footerに出力。初期値はwp_header。
    true
  );


  wp_enqueue_style(
    '',
    get_template_directory_uri() . '/css/style.css',
    array(),
  );
}
add_action( 'wp_enqueue_scripts', 'yukury_enqueue_scripts' );

//カスタム投稿
add_action( 'init', 'create_post_type_music' );
function create_post_type_music() {
  register_post_type( 'music', // post-type
    array(
      'labels' => array(
      'name' => __( 'Music' ),
      'add_new' => _x('新規追加', 'music'),
      'add_new_item' => __('musicを追加'),
      'singular_name' => __( 'music' )
      ),
      'public' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ,'comments' ),
      'menu_position' =>200,
      'show_in_rest' => true,
      'has_archive' => true,
      // 'rewrite' => array( 'with_front' => false ),
      // 'rest_base' => 'music',
    )
  );
  //カスタムタクソノミー、カテゴリタイプ*
  register_taxonomy(
    'genre',
    'music',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'musicカテゴリー',
      'singular_label' => 'musicカテゴリー',
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      // 'rewrite' => array( 'slug' => 'music' ), //変更後のスラッグ
    )
  );
  //カスタムタクソノミー、タグタイプ*
  register_taxonomy(
    'type',
    'music',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'musicタイプ',
      'singular_label' => 'musicタイプ',
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      // 'rewrite' => array( 'slug' => 'music' ), //変更後のスラッグ
    )
  );       
}

// カスタム投稿musicのURL変更ページネーション２ページ目以降の404させない設定
// function add_custom_rewrite_rules() {
//     add_rewrite_rule('music/genre/([^/]+)/page/([0-9]+)/?$', 'index.php?genre=$matches[1]&paged=$matches[2]', 'top');
//     add_rewrite_rule('music/type/([^/]+)/page/([0-9]+)/?$', 'index.php?type=$matches[1]&paged=$matches[2]', 'top');
//   }
// add_action('init', 'add_custom_rewrite_rules');


// // カスタム投稿musicのスラッグのリンク変更設定
// function rewrite_term_links($termlink, $term, $taxonomy) {
//   return ($taxonomy === 'genre' ? home_url('/music/'. $term->slug) : $termlink);
//   return ($taxonomy === 'type' ? home_url('/music/'. $term->slug) : $termlink);
// }
// add_filter( 'term_link', 'rewrite_term_links', 10, 3 );

// function my_custom_post_type_permalinks_set($termlink, $term, $post_type){
//  return str_replace('/'.$post_type.'/', '/', $termlink);
// }
// add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);


//カスタム投稿タイプ名、タクソノミー名部分に該当するタイプ名・タクソノミー名を入力する
// add_rewrite_rule('カスタム投稿タイプ名/([^/]+)/?$', 'index.php?タクソノミー名=$matches[1]', 'top');
// add_rewrite_rule('カスタム投稿タイプ名/([^/]+)/page/([0-9]+)/?$', 'index.php?タクソノミー名=$matches[1]&paged=$matches[2]', 'top');


// function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
//     return str_replace('/'.$taxonomy.'/', '/', $termlink);
// }
// add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);


// function custom_rewrite_basic() {
//   add_rewrite_rule('^leaf/([0-9]+)/?', 'index.php?page_id=$matches[1]', 'top');
// }
// add_action('init', 'custom_rewrite_basic');

function yukury_block_setup(){
  add_theme_support('wp-block-style');
  add_theme_support(
    'editor-font-size',
    array(
      array(
        'name' => 'キャプション',
        'size' => '',
        'slug' => '',
      )
    ),
  );
}
add_action('after_setuptheme','yukury_block_setup');



// パンくずリスト
function breadcrumb() {
  $home = '<li><a href="'.get_bloginfo('url').'">HOME</a></li>';
  $arch = '<li><a href="'.get_bloginfo('url').'">MUSIC</a></li>';
  echo '<ul class="breadcrumb">';

  // トップページの場合
  if ( is_front_page() ) {


  // アーカイブページの場合
  } else if ( is_archive() ) {
  echo $home;
  the_archive_title('<li class"bg">', '</li>');

  // 投稿ページの場合
  // } else if ( is_single() ) {
  // $cat = get_the_category();
  // if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
  // $cat_list = array();
  // while( $cat_id != 0 ) {
  //   $cat = get_category( $cat_id );
  //   $cat_link = get_category_link( $cat_id );
  //   array_unshift( $cat_list, '<li><a href="'.$cat_link.'">'.$cat->name.'</a></li>' );
  //   $cat_id = $cat->parent;
  // }
  // echo $home;
  // echo $arch;
  // foreach($cat_list as $value) {
  //   echo $value;
  // }
  // the_title('<li>', '</li>');

  // 固定ページの場合
  } else if ( is_page() ) {
  echo $home;
  the_title('<li>', '</li>');

  // 検索結果の場合
  } else if ( is_search() ) {
  echo $home;
  echo '<li>「'.get_search_query().'」の検索結果</li>';

  // 404ページの場合
  } else if ( is_404() ) {
  echo $home;
  echo '<li>ページが見つかりません</li>';
  }
  echo '</ul>';

add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
  } elseif (is_tax()) {
      $title = single_term_title('',false);
  } elseif (is_archive() ){
      $title = the_archive_title('',false);    
  } elseif (is_search()) {
      $title = '検索結果：'.esc_html( get_search_query(false) );
  } elseif (is_404()) {
      $title = '「404」ページが見つかりません';
  } else {

  }
    return $title;
});  
}


function custom_archive_title($title){
    $titleParts=explode(': ',$title);
    if($titleParts[1]){
        return $titleParts[1];
    }
    return $title;
}
add_filter('get_the_archive_title','custom_archive_title');


// 列の内容を追加
function my_add_columns($columns){
    $columns['my_column_name'] = 'アーティスト';

    // 日付を列の最後に移動
    $date = $columns['date'];
    unset($columns['date']);
    $columns['date'] = $date;

    return $columns;
}

add_filter('manage_edit-music_columns', 'my_add_columns');

// カスタムフィールド　アーティスト名表示
function my_add_columns_content($column_name, $post_id){
    if ($column_name == 'my_column_name') {
        // カスタムフィールドを表示
        $stitle = get_post_meta($post_id, 'artist', true);
    }

    if (isset($stitle) && $stitle) {
        echo esc_attr($stitle);
    }
}

add_action('manage_music_posts_custom_column', 'my_add_columns_content', 10, 2);

// カスタムフィールド　ID表示
function add_posts_columns_postid($columns) { 
  $columns['postid'] = 'ID'; 
  return $columns; 
} 
// カスタムフィールド　ID表示項目
function add_posts_columns_postid_row($column_name, $post_id) { 
  if( 'postid' == $column_name ) { 
    echo $post_id; } 
  } 
  add_filter( 'manage_posts_columns', 'add_posts_columns_postid' ); 
  add_action( 'manage_posts_custom_column', 'add_posts_columns_postid_row', 10, 2 );

// korekore
// function theme_query_vars( $vars ) {
//   // $vars[] = 'genre'; // 必要に応じて追加.
//   // $vars[] = 'type'; // 必要に応じて追加.
//   return $vars;
// }
// add_filter( 'query_vars', 'theme_query_vars' );


function sample_function(){
if (!check_ajax_referer( 'my_nonce' )){
wp_die();
}
  $genre = $_POST['genre'];
  $type = $_POST['type'];


// $args = array(
//   'post_type'      => 'music', // 絞り込み検索をする投稿タイプ.
//   // 'paged'          => $now_page, // 何ページ目の記事を取得するか.
//   'posts_per_page' => -1, // 1ページに表示する記事数.
//   'tax_query'      => array( // 検索条件.
//     'relation' => 'AND',
//   ),
// );

// // 検索条件を追加.
// if ( ! empty( $genre ) ) {
//   $args['tax_query'][] = array(
//     'taxonomy' => 'genre',
//     'field'    => 'slug',
//     'terms'    => $genre,
//     'operator' => 'IN',
//   );
// }
// if ( ! empty( $type ) ) {
//   $args['tax_query'][] = array(
//     'taxonomy' => 'type',
//     'field'    => 'slug',
//     'terms'    => $type,
//     'operator' => 'IN',
//   );
// }
// // $args = array();
// $the_query = new WP_Query( $args );
// $html = '';
// if ( $the_query->have_posts() ): while ( $the_query->have_posts() ): $the_query->the_post();
//           $html .= '<div class="l-box">';
//             $html .= '<section>';
//               $html .= '<div class="contents-list">';
//                 $html .= '<div class="date">';
//                   $html .= '<time datetime="'.get_the_date('Y.n.d').'">'.get_the_date('Y.n.d').'</time>';
//                 $html .= '</div>';
//                 $html .= '<div class="box-img">';
//                   $html .= '<a href="'.get_permalink($post->ID).'" class="linkBl01">';
                  
//                       // アイキャッチ画像を取得
//                       $thumbnail_id = get_post_thumbnail_id($post->ID);
//                       $thumb_url = wp_get_attachment_image_src($thumbnail_id, 'music-list');
//                       if (get_post_thumbnail_id($post->ID)) {
//                         $html .= '<img src="' . $thumb_url[0] . '" alt="">';
//                       } else {
//                         // アイキャッチ画像が登録されていなかったときの画像
//                         $html .= '<img src="' . get_template_directory_uri() . '/img/img-default.png" alt="">';
//                       }
                      
//                   $html .= '</a>';

//                     $html .= '<h1 class="list-title">';
//                       $html .= '<a href="'.get_permalink($post->ID).'" class="link03">'.get_the_title($post->ID).'</a>';
//                     $html .= '</h1>';
                  
//                 $html .= '</div>';

                
//                   $terms = get_the_terms($post->ID, 'genre');
//                   if($terms):
//                     $html .= '<ul class="category-tag" arial-label="タグ">';

//                     foreach($terms as $term):
//                       $term_name = $term->name;
//                       $term_link = get_term_link( $term );    //$termはオブジェクトなので第二引数は省略可
//                       $html .= '<li><a href="'.$term_link.'" class="link01">'.$term_name.'</a></li>';
//                     endforeach;

//                     $html .= '</ul>';
//                   endif;
                
                 

                
                
//                   $terms = get_the_terms($post->ID, 'type');
//                   if($terms):
//                     $html .= '<ul class="type-tag" arial-label="タグ">';

//                     foreach($terms as $term):
//                       $term_name = $term->name;
//                       $term_link = get_term_link( $term );    //$termはオブジェクトなので第二引数は省略可
//                       $html .= '<li><a href="'.$term_link.'" class="link02">'.$term_name.'</a></li>';
//                     endforeach;

//                     $html .= '</ul>';
//                   endif;
              
                  
                
//               $html .= '</div>';
//             $html .= '</section>';
//           $html .= '</div>';
//           endwhile;
//         endif;



//         // header("Content-type: application/json; charset=UTF-8");
//     echo $html;
    die();

}
// //ログインしているユーザー向け関数
add_action( 'wp_ajax_sample_function', 'ajax_func' );
//非ログインユーザー用関数
add_action( 'wp_ajax_nopriv_sample_function', 'ajax_func' );








function my_ajax_search(){
    // 「ad_url.ajax_url」のようにしてURLを指定できるようになる
  wp_enqueue_script(
   'script-ajax', 
   get_template_directory_uri().'/js/async.js', 
   array(), 
   null, 
   true );

    wp_localize_script( 'script-ajax', 'async',array( 
      'url' => admin_url( 'admin-ajax.php')
      ));
}
add_action( 'wp_enqueue_scripts', 'my_ajax_search' );


function music_post_type_link( $link, $post ){
  if ( $post->post_type === 'music' ) {
    return home_url( '/music/' . $post->ID );
  } else {
    return $link;
  }
}
add_filter( 'post_type_link', 'music_post_type_link', 1, 2 );

function music_rewrite_rules_array( $rules ) {
  $new_rewrite_rules = array( 
    'music/([0-9]+)/?$' => 'index.php?post_type=music&p=$matches[1]',
  );
  return $new_rewrite_rules + $rules;
}
add_filter( 'rewrite_rules_array', 'music_rewrite_rules_array' );




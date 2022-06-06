<?php $locale = get_locale();
if ('ja' == $locale  ) { ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="<?php bloginfo("charset"); ?> | ">
<?php
  if(is_front_page()){ ?>
    <meta name="description" content="SoundLog(サウンドログ)　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
    <?php }else{ ?>
    <meta name="description" content="<?php the_title(); ?>　|　 SoundLog(サウンドログ)　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
    <?php } ?>
  <meta name="keywords" content="SoundLog,サウンドログ,Blog DJ,Techno,House,Electro,IDM,Electronica,DeepHouse,テクノ,ハウス,エレクトロニカ,ディープハウス">
  <meta name="viewport" content="">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css">
  <link rel="stylesheet" media="print" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/print.css">
 <!--  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/common/js/custom.css"> -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/webclip.png" />
  <meta property="og:site_name" content="SoundLog サウンドログ エレクトロニックな音楽(Techno・House・Electro・IDM等々)を紹介しています。Blog DJ SoundLog" />
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
  <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/img_ogp01.jpg" />
  <meta property="og:description" content="" />
  <meta itemprop="name" content="<?php the_title(); ?>">
  <meta itemprop="description" content="SoundLog(サウンドログ)　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
  <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/img_ogp01.jpg">
  <script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'ja'}
  </script>
  <!-- /Google plus -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-221460689-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-221460689-1');
</script>

<script>
  (function(d) {
    var config = {
      kitId: 'jco3hgw',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php wp_head(); ?>
</head>



<?php
  if ( is_front_page() ) {
    $my_body_class = 'l-top';
  } else if ( is_single() ) {
    $my_body_class = 'l-local';
  } else if ( is_archive() ) {
    $my_body_class = 'l-list';
  }
?>
<body<?php echo ( $my_body_class ) ? ' class="jp l-grid ' . $my_body_class . '"' : ''; ?>>

<header>
  <div class="l-header">
    <h1 class="logo">
      <a href="<?php echo esc_url (home_url()); ?>">
        <img src="<?php echo get_template_directory_uri()?>/img/common/logo.svg" alt="SOUNDLOG">
      </a>
    </h1>

    <div class="lang-btn">
      <!-- <span class="lang-tit">Lang</span> -->
        <?php echo do_shortcode( '[bogo]' ); ?>
    </div>
    
    <div class="gnav-botton gnav-btn">
      <div class="gnav-botton-inner">
         <span class="gnav-line">
      </div>    
      <div class="gnav-botton-inner">     
         </span><span class="gnav-line"></span>
      </div>
      <div class="gnav-botton-inner">
         <span class="gnav-line"></span>
       </div>
    </div>
  
  </div>

  <!-- /.l-header -->
</header>
<?php get_template_part('inc/nav'); ?>
<!-- get_template_part('inc/sidebar');  -->

<main>
  <div class="l-frame">






    
<?php } else { ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="<?php bloginfo("charset"); ?> | ">
<?php
  if(is_front_page()){ ?>
    <meta name="description" content="SoundLog　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
    <?php }else{ ?>
    <meta name="description" content="<?php the_title(); ?>　|　 SoundLog(サウンドログ)　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
    <?php } ?>
  <meta name="keywords" content="SoundLog,サウンドログ,Blog DJ,Techno,House,Electro,IDM,Electronica,DeepHouse,テクノ,ハウス,エレクトロニカ,ディープハウス">
  <meta name="viewport" content="">
  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css">
  <link rel="stylesheet" media="print" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/print.css">
 <!--  <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/common/js/custom.css"> -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/webclip.png" />
  <meta property="og:site_name" content="SoundLog サウンドログ エレクトロニックな音楽(Techno・House・Electro・IDM等々)を紹介しています。Blog DJ SoundLog" />
  <meta property="og:title" content="<?php the_title(); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
  <meta property="og:image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/img_ogp01.jpg" />
  <meta property="og:description" content="" />
  <meta itemprop="name" content="<?php the_title(); ?>">
  <meta itemprop="description" content="SoundLog(サウンドログ)　|　 Electronicな音楽(Techno・House・Electro・IDM等々)を雰囲気で紹介しています。">
  <meta itemprop="image" content="<?php echo esc_url( get_template_directory_uri() ); ?>/img/common/img_ogp01.jpg">
  <script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'ja'}
  </script>
  <!-- /Google plus -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-221460689-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-221460689-1');
</script>

<script>
  (function(d) {
    var config = {
      kitId: 'jco3hgw',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php wp_head(); ?>
</head>



<?php
  if ( is_front_page() ) {
    $my_body_class = 'l-top';
  } else if ( is_single() ) {
    $my_body_class = 'l-local';
  } else if ( is_archive() ) {
    $my_body_class = 'l-list';
  }
?>
<body<?php echo ( $my_body_class ) ? ' class="l-grid ' . $my_body_class . '"' : ''; ?>>

<header>
  <div class="l-header">
    <h1 class="logo">
      <a href="<?php echo esc_url (home_url()); ?>">
        <img src="<?php echo get_template_directory_uri()?>/img/common/logo.svg" alt="SOUNDLOG">
      </a>
    </h1>

    <div class="lang-btn">
      <!-- <span class="lang-tit">Lang</span> -->
        <?php echo do_shortcode( '[bogo]' ); ?>
    </div>
    
    <div class="gnav-botton gnav-btn">
      <div class="gnav-botton-inner">
         <span class="gnav-line">
      </div>    
      <div class="gnav-botton-inner">     
         </span><span class="gnav-line"></span>
      </div>
      <div class="gnav-botton-inner">
         <span class="gnav-line"></span>
       </div>
    </div>
  
  </div>

  <!-- /.l-header -->
</header>
<?php get_template_part('inc/nav'); ?>
<!-- get_template_part('inc/sidebar');  -->

<main>
  <div class="l-frame">
<?php } ?>



<!doctype html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?><?php echo get_bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<?php wp_head() ?>
</head>
<body>
    <div class="top"><span style="background:#0C7561"></span><span style="background:#25B097"></span><span style="background:#0E927D"></span><span style="background:#53B9A7"></span></div>
     <section id="sidebar">
        <span class="logo"></span>
        <h2>Sem Schilder</h2>
        <a href="#" class="menu-icon">☰</a>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </section>
    
    <section id="content">
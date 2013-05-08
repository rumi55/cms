<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ADMIN</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/normalize.min.css">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/main.css">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo asset_url(); ?>css/global.css">
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

        <script src="<?php echo asset_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="sidebar">
                <nav class="navigation">
                    <ul>
                        <li><a href="<?php echo base_url();?>admin/" <?php if($page == 'home'){echo 'class="active"';} ?>><span class="icon-home icon-white icon"></span>Home</a></li>
                        <li><a href="<?php echo base_url();?>admin/pages" <?php if($page == 'pages'){echo 'class="active"';} ?>><span class="icon-file icon-white icon"></span>Pages</a></li>
                        <li><a href="#" <?php if($page == 'blog'){echo 'class="active"';} ?>><span class="icon-pencil icon-white icon"></span>Blog Posts</a></li>
                        <li><a href="#" <?php if($page == 'themes'){echo 'class="active"';} ?>><span class="icon-th-list icon-white icon"></span>Themes</a></li>
                        <li><a href="#" <?php if($page == 'settings'){echo 'class="active"';} ?>><span class="icon-wrench icon-white icon"></span>Settings</a></li>
                    </ul>
            </div>
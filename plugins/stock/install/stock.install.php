<?php defined('MONSTRA_ACCESS') or die('No direct script access.');

// Set start album options
    Option::add('st_w', 500); 
    Option::add('st_h', 300);
    Option::add('st_wmax', 1000); 
    Option::add('st_hmax', 600);
    Option::add('st_resize', 'crop');
    
// Creat stock base
    Table::create('stock', array('name', 'lihp', 'title0', 'title1', 'title2', 'title3', 'title4', 'title5', 'title6', 'title7', 'title8', 'title9', 'title10', 'title11', 'title12', 'title13', 'title14', 'title15', 'title16', 'title17', 'title18', 'title19', 'title20','title21','title22','title23','title24','title25','title26','title27','title28','title29', 'title30', 'title31', 'title32', 'title33', 'title34', 'title35', 'title36', 'title37', 'title38', 'title39', 'title40', 'w', 'h', 'wmax', 'hmax', 'resize')); 
    
// Creat stock dir 
    $dirstock = ROOT . DS . 'public' . DS . 'stock' . DS;  
    if(!is_dir($dirstock)) mkdir($dirstock, 0755);
	
// Theme path   
	$themeload = Option::get('theme_site_name');
		
// Creat css dir // Creat css dir // Creat css dir // Creat css dir // Creat css dir // Creat css dir // Creat css dir
	$dirscss = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS;
    if(!is_dir($dirscss)) mkdir($dirscss, 0755);
	
// Creat stock css
	$plugdircss = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'css' . DS . 'stock-style.css';
	$themedircss = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'stock-style.css';
	if(!is_dir($themedircss)) copy($plugdircss, $themedircss);

// Light Box	
	// Creat Light Box css
	$plugdircsslb = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'css' . DS . 'lightbox-stock.css';
	$themedircsslb = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'lightbox-stock.css';
	if(!is_dir($themedircsslb)) copy($plugdircsslb, $themedircsslb);
	
// Mobily Slider			
	// Creat Mobily Slider css
	$plugdircssms = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'css' . DS . 'mobilyslider-stock.css';
	$themedircssms = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'mobilyslider-stock.css';
	if(!is_dir($themedircssms)) copy($plugdircssms, $themedircssms);
		
// Zoom		
	// Creat Zoom css
	$plugdircsszm = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'css' . DS . 'zoom-stock.css';
	$themedircsszm = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'zoom-stock.css';
	if(!is_dir($themedircsszm)) copy($plugdircsszm, $themedircsszm);

// Paginate	
	// Creat Paginate css
	$plugdircsslp = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'css' . DS . 'paginate-stock.css';
	$themedircsslp = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'paginate-stock.css';
	if(!is_dir($themedircsslp)) copy($plugdircsslp, $themedircsslp);
	
// Creat stock js dir // Creat stock js dir // Creat stock js dir // Creat stock js dir // Creat stock js dir
	$dirsjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS;
    if(!is_dir($dirsjs)) mkdir($dirsjs, 0755);
	
	// Creat jQuery js
	$plugdirjsjq = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'stock-jquery.js';
	$themedirjsjq = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'stock-jquery.js';
	if(!is_dir($themedirjsjq)) copy($plugdirjsjq, $themedirjsjq);

// Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box
	// Creat Light Box js
	$plugdirlbjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'lightbox-stock.js';
	$themedirlbjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'lightbox-stock.js';
	if(!is_dir($themedirlbjs)) copy($plugdirlbjs, $themedirlbjs);
	
// Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider
	// Creat Mobily Slider js
	$plugdirmsjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'mobilyslider-stock.js';
	$themedirmsjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'mobilyslider-stock.js';
	if(!is_dir($themedirmsjs)) copy($plugdirmsjs, $themedirmsjs);
	
	// Creat Mobily Slider init js
	$plugdirimsjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'int-mobilyslider-stock.js';
	$themedirimsjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'int-mobilyslider-stock.js';
	if(!is_dir($themedirimsjs)) copy($plugdirimsjs, $themedirimsjs);

// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	
	// Creat Zoom js
	$plugdirzmjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'zoom-stock.js';
	$themedirzmjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'zoom-stock.js';
	if(!is_dir($themedirzmjs)) copy($plugdirzmjs, $themedirzmjs);

// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	
	// Creat Paginate js
	$plugdirlpjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'paginate-stock.js';
	$themedirlpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'paginate-stock.js';
	if(!is_dir($themedirzmjs)) copy($plugdirlpjs, $themedirlpjs);
	
	// Creat Paginate js int
	$plugdirilpjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'int-paginate-stock.js';
	$themedirilpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'int-paginate-stock.js';
	if(!is_dir($themedirilpjs)) copy($plugdirilpjs, $themedirilpjs);
	
	// Creat Paginate add js
	$plugdiralpjs = ROOT . DS . 'plugins' . DS . 'stock' . DS . 'js' . DS . 'stock-jquery-easing.js';
	$themediralpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'stock-jquery-easing.js';
	if(!is_dir($themediralpjs)) copy($plugdiralpjs, $themediralpjs);
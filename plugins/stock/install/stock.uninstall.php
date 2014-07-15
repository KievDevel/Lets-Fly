<?php defined('MONSTRA_ACCESS') or die('No direct script access.');
    
// Drop start album options
    Option::delete('st_w');
    Option::delete('st_h');
    Option::delete('st_wmax');
    Option::delete('st_hmax');
    Option::delete('st_resize');
    
// Drop table stock
    Table::drop('stock');
	
// Theme path   
	$themeload = Option::get('theme_site_name');
	
// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	// Drop css	
	// Drop stock css
	$themedircss = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'stock-style.css';
	if(!is_dir($themedircss)) unlink($themedircss);

// Light Box	
	// Drop Light Box css
	$themedircsslb = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'lightbox-stock.css';
	if(!is_dir($themedircsslb)) unlink($themedircsslb);
	
// Mobily Slider			
	// Drop Mobily Slider css
	$themedircssms = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'mobilyslider-stock.css';
	if(!is_dir($themedircssms)) unlink($themedircssms);

// Zoom		
	// Drop Zoom  css
	$themedircsszm = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'zoom-stock.css';
	if(!is_dir($themedircsszm)) unlink($themedircsszm);
	
// Paginate	
	// Drop Paginate css
	$themedircsslp = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'css' . DS . 'paginate-stock.css';
	if(!is_dir($themedircsslp)) unlink($themedircsslp);
	
// Drop js // Drop js // Drop js // Drop js // Drop js // Drop js // Drop js // Drop js // Drop js // Drop js // Drop js
	// Drop jQuery js
	$themedirjsjq = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'stock-jquery.js';
	if(!is_dir($themedirjsjq)) unlink($themedirjsjq);

// Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box // Light Box
	// Drop Light Box js
	$themedirlbjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'lightbox-stock.js';
	if(!is_dir($themedirlbjs)) unlink($themedirlbjs);
	
// Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider // Mobily Slider
	// Drop Mobily Slider js
	$themedirmsjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'mobilyslider-stock.js';
	if(!is_dir($themedirmsjs)) unlink($themedirmsjs);
	
	// Drop Mobily Slider init js
	$themedirimsjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'int-mobilyslider-stock.js';
	if(!is_dir($themedirimsjs)) unlink($themedirimsjs);
	
// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	// Zoom	
	// Drop Zoom js
	$themedirzmjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'zoom-stock.js';
	if(!is_dir($themedirzmjs)) unlink($themedirzmjs);
	
// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	// Paginate	
	// Drop Paginate js
	$themedirlpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'paginate-stock.js';
	if(!is_dir($themedirzmjs)) unlink($themedirlpjs);
	
	// Drop Paginate js int
	$themedirilpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'int-paginate-stock.js';
	if(!is_dir($themedirilpjs)) unlink($themedirilpjs);
	
	// Drop Paginate add js
	$themediralpjs = ROOT . DS . 'public' . DS . 'themes' . DS . $themeload . DS . 'js' . DS . 'stock-jquery-easing.js';
	if(!is_dir($themediralpjs)) unlink($themediralpjs);
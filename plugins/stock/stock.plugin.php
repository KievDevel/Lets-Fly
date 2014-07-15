<?php

    /**
     *  Stock plugin
     *
     *  @package Monstra
     *  @subpackage Plugins
     *  @author Yudin Evgeniy / JINN
     *  @copyright 2012 Yudin Evgeniy / JINN
     *  @version 1.3.2
     *	@Faust*modification
     */


    // Register plugin
    Plugin::register( __FILE__,                    
                    __('Stock', 'stock'),
                    __('Stock plugin for Monstra', 'stock'),  
                    '1.3.2',
                    'JINN F*mod',                 
                    'http://monstra.promo360.ru/');


    // Load Stock Admin for Editor and Admin
    if (Session::exists('user_role') && in_array(Session::get('user_role'), array('admin', 'editor'))) {        
        Plugin::admin('stock');
    }
	
	// Load theme dir
    $loadthemedir = Option::get('theme_site_name');
	// Load frontend css
    if (!BACKEND) 
	Stylesheet::add('public/themes/'.$loadthemedir.'/css/stock-style.css', 'frontend', 11);
	Stylesheet::add('public/themes/'.$loadthemedir.'/css/lightbox-stock.css', 'frontend', 12);
	Stylesheet::add('public/themes/'.$loadthemedir.'/css/mobilyslider-stock.css', 'frontend', 13);
	Stylesheet::add('public/themes/'.$loadthemedir.'/css/zoom-stock.css', 'frontend', 14);
	Stylesheet::add('public/themes/'.$loadthemedir.'/css/paginate-stock.css', 'frontend', 15);
	// Load frontend JS
	Javascript::add('public/themes/'.$loadthemedir.'/js/stock-jquery.js', 'frontend', 16);
	// Load frontend Light Box JS
	Javascript::add('public/themes/'.$loadthemedir.'/js/lightbox-stock.js', 'frontend', 17);
	Javascript::add('public/themes/'.$loadthemedir.'/js/int-lightbox-stock.js', 'frontend', 18);
	// Load frontend Mobility Slider JS
	Javascript::add('public/themes/'.$loadthemedir.'/js/mobilyslider-stock.js', 'frontend', 19);
	Javascript::add('public/themes/'.$loadthemedir.'/js/int-mobilyslider-stock.js', 'frontend', 20);
	// Load frontend Zoom JS
	Javascript::add('public/themes/'.$loadthemedir.'/js/zoom-stock.js', 'frontend', 21);
	// Load frontend Paginate
	Javascript::add('public/themes/'.$loadthemedir.'/js/stock-jquery-easing.js', 'frontend', 22);
	Javascript::add('public/themes/'.$loadthemedir.'/js/paginate-stock.js', 'frontend', 23);
	Javascript::add('public/themes/'.$loadthemedir.'/js/int-paginate-stock.js', 'frontend', 24);
	
    Shortcode::add('stock', 'Stock::show');
	Shortcode::add('mstock', 'mStock::show');
	Shortcode::add('zstock', 'zStock::show');
	Shortcode::add('pstock', 'pStock::show');
	
    class Stock {
        
        public static function show($attributes){
            extract($attributes);
            
            $album_id = (int)$album;
            $siteurl = Option::get('siteurl');
            
            $original = $siteurl.'public/stock/'.$album_id.'/original/';
            $thumbs = $siteurl.'public/stock/'.$album_id.'/thumbs/';
            
            if(isset($img)) {
                // current img
                return '<a href="'.$original.$img.'" rel="lightbox" class="stock_current"><img src="'.$thumbs.$img.'" alt=""/></a>';
            } else {
			
				// Get title
				$stock = new Table('stock');
				$album = $stock->select('[id='.$album_id.']', 1);
				$album = $album[0];              
				
			
                // show album
                $files = File::scan(ROOT . DS . 'public' . DS . 'stock' . DS . $album_id . DS . 'thumbs' . DS, 'jpg');                
                $count = count($files);
                
                $html = '<div id="stock">';
                for($i=0;$i<$count;$i++) $html.= '<a href="'.$original.$files[$i].'" rel="lightbox['.$album_id.']" title="'.$album['title'.$i.''].'"><img src="'.$thumbs.$files[$i].'" alt="'.$album['title'.$i.''].'"/></a>';
                $html.= '</div>';
                return $html;
            }
        }
    }
	
	class mStock {
        
        public static function show($attributes){
            extract($attributes);
            
            $album_id = (int)$album;
            $siteurl = Option::get('siteurl');
            
            $original = $siteurl.'public/stock/'.$album_id.'/original/';
            $thumbs = $siteurl.'public/stock/'.$album_id.'/thumbs/';
			if(isset($img)) {
                // current img
                return '<a href="'.$original.$img.'" rel="lightbox" class="stock_current"><img src="'.$thumbs.$img.'" alt=""/></a>';
            } else {
			// Get width and height
			$stock = new Table('stock');
			$album = $stock->select('[id='.$album_id.']', 1);
            $album = $album[0];              
            $w   = (int)$album['w'];
            $h   = (int)$album['h'];
					
            // show album
            $files = File::scan(ROOT . DS . 'public' . DS . 'stock' . DS . $album_id . DS . 'thumbs' . DS, 'jpg');                
            $count = count($files);
            $html = '<div class="mstockslider mstockslider'.$album_id.'"><div style="width:'.$w.'px; height:'.$h.'px;" class="mstocksliderContent" id="mstockslide-'.$album_id.'">';
            for($i=0;$i<$count;$i++) $html.= '<div class="mstockitem"><a href="#" ><img src="'.$thumbs.$files[$i].'" alt="'.$album['title'.$i.''].'" title="'.$album['title'.$i.''].'"/></a></div>';
            $html.= '</div></div><div style="clear:both;"></div>';
            return $html;
			}
        }
    }
	
    class zStock {
        
        public static function show($attributes){
            extract($attributes);
            
            $album_id = (int)$album;
            $siteurl = Option::get('siteurl');
            
            $original = $siteurl.'public/stock/'.$album_id.'/original/';
            $thumbs = $siteurl.'public/stock/'.$album_id.'/thumbs/';
			         
			// current img
             if(isset($img)) { 
			 return '<a class="cloud-zoom" href="'.$original.$img.'" rel=""><img src="'.$thumbs.$img.'" alt=""/></a>';
			 }
			 else {
                // show album
                $files = File::scan(ROOT . DS . 'public' . DS . 'stock' . DS . $album_id . DS . 'thumbs' . DS, 'jpg');                
                $count = count($files);
                
                $html = '<div id="stock">';
                for($i=0;$i<$count;$i++) $html.= '<a href="'.$original.$files[$i].'" rel="lightbox['.$album_id.']"><img src="'.$thumbs.$files[$i].'" alt=""/></a>';
                $html.= '</div>';
                return $html;
            }
        }
    }
	
	class pStock {
        
        public static function show($attributes){
            extract($attributes);
            
            $album_id = (int)$album;
            $siteurl = Option::get('siteurl');
            
            $original = $siteurl.'public/stock/'.$album_id.'/original/';
            $thumbs = $siteurl.'public/stock/'.$album_id.'/thumbs/';
            
            if(isset($img)) {
                // current img
                return '<a href="'.$original.$img.'" rel="lightbox" class="stock_current"><img src="'.$thumbs.$img.'" alt=""/></a>';
            } else {
			
				// Get title
				$stock = new Table('stock');
				$album = $stock->select('[id='.$album_id.']', 1);
				$album = $album[0];              
				$cou = $album[0];
				
                // show album
                $files = File::scan(ROOT . DS . 'public' . DS . 'stock' . DS . $album_id . DS . 'thumbs' . DS, 'jpg');                
                $count = count($files);		
				
                $html = '<div class="liPaginate"><p>';
                for($i=1;$i<$count;$i++) $html.= ''.($i % $album['lihp'] == 1 ? '<p>' : '').'<a href="'.$original.$files[$i].'" rel="lightbox['.$album_id.']" title="'.$album['title'.$i.''].'"><img style="padding:3px;" src="'.$thumbs.$files[$i].'" alt="'.$album['title'.$i.''].'"/></a>'.($i % $album['lihp'] == 0 ? '</p>' : '');
                $html.= '</p></div>';
                return $html;
            }
        }
    }
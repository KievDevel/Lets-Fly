<?php 

    // Admin Navigation: add new item
    Navigation::add(__('Stock', 'stock'), 'content', 'stock', 10);
    

    // Add actions
    Action::add('admin_pre_render','StockAdmin::ajaxSave');
    Stylesheet::add('plugins/stock/css/lightbox-stock.css', 'backend', 11);
    Javascript::add('plugins/stock/stock/stock-admin.js', 'backend', 12);
	Javascript::add('plugins/stock/js/stock-jquery.js', 'backend', 13);
	Javascript::add('plugins/stock/stock/lightbox-stock.js', 'backend', 14);
	
    /**
     * Stock admin class
     */
    class StockAdmin extends Backend {
        
	    public static function main() {  
            
            $resize_way = array(
                'width'   => __('Respect to the width', 'stock'),
                'height'  => __('Respect to the height', 'stock'),
                'crop'    => __('Similarly, cutting unnecessary', 'stock'),
                'stretch' => __('Similarly with the expansion', 'stock'), 
            );
            
            $dir = ROOT . DS . 'public' . DS . 'stock' . DS;            
            $stock = new Table('stock');
            $siteurl = Option::get('siteurl');
            
            /**
             * Delete photo
             */
            if(Request::get('delete_img') and Request::get('album_id')) {
                if (Security::check(Request::get('token'))) {
                    $thumbs = $dir . Request::get('album_id') . DS . 'thumbs' . DS;
                    $original = $dir . Request::get('album_id') . DS . 'original' . DS;
                    unlink($thumbs . Request::get('delete_img'));
                    unlink($original . Request::get('delete_img'));
                    Request::redirect('index.php?id=stock&album_id='.Request::get('album_id'));
                }
            }
            
            /**
             * Delete album
             */
            if(Request::get('delete_album')) {
                if (Security::check(Request::get('token'))) {
                    $album_id = (int)Request::get('delete_album');
                    
                    $stock->delete($album_id);
                    
                    $album = $dir . $album_id . DS;
                    $thumbs = $album . 'thumbs' . DS;
                    $original = $album . 'original' . DS;
                
                    if ($objs = glob($thumbs."*"))   foreach($objs as $obj) unlink($obj);
                    if ($objs = glob($original."*")) foreach($objs as $obj) unlink($obj);
                    
                    rmdir($thumbs);
                    rmdir($original);
                    rmdir($album);
                    
                    Request::redirect('index.php?id=stock');
                }
            }
            
            /**
             * Add album
             */
            if (Request::post('submit_album_add')) {
                if (Security::check(Request::post('csrf'))) {
                    $w = (int)Request::post('width_thumb');
                    $h = (int)Request::post('height_thumb');
                    $wmax = (int)Request::post('width_orig');
                    $hmax = (int)Request::post('height_orig');
                    $resize = (string)Request::post('resize_way');
                    $name = (string)Request::post('name');
                    $lihp = (string)Request::post('lihp');
					
                    if(empty($name)) $name = __('No title', 'stock');
                    
                    $stock->insert(array('name'=>$name, 'lihp'=>$lihp, 'w'=>$w, 'h'=>$h, 'wmax'=>$wmax, 'hmax'=>$hmax, 'resize'=>$resize));
                    
                    $lastid = $stock->lastId();
                    
                    $album_dir = $dir . $lastid . DS;
                    $album_dir_thumbs = $album_dir . 'thumbs' . DS;
                    $album_dir_original = $album_dir . 'original' . DS;
                    
                    if(!is_dir($album_dir)) mkdir($album_dir, 0755);
                    if(!is_dir($album_dir_thumbs)) mkdir($album_dir_thumbs, 0755);
                    if(!is_dir($album_dir_original)) mkdir($album_dir_original, 0755);
                    
                    Request::redirect('index.php?id=stock&album_id='.$lastid);
                } else { die('csrf detected!'); }
            }
            
            /**
             *  Upload image
             */   
            if (Request::post('upload_file')) {
                if (Security::check(Request::post('csrf'))) { 
                    if ($_FILES['file']) {
                        if($_FILES['file']['type'] == 'image/jpeg' ||
                            $_FILES['file']['type'] == 'image/png' ||
                            $_FILES['file']['type'] == 'image/gif') {
                   
                            $name = Text::random('alnum', 10).'.jpg';
                            $img  = Image::factory($_FILES['file']['tmp_name']);
                            $album_id = (int)Request::post('album_id');
                            
                            $album = $stock->select('[id='.$album_id.']', 1);
                            $album = $album[0];
                            
                            $wmax   = (int)$album['wmax'];
                            $hmax   = (int)$album['hmax'];
                            $width  = (int)$album['w'];
                            $height = (int)$album['h'];
                            $resize = $album['resize'];
                            
                            $original = $dir . $album_id . DS . 'original' . DS;
                            $thumbs = $dir . $album_id . DS . 'thumbs' . DS;
                            
                            $ratio = $width/$height;
                            
                            if ($img->width > $wmax or $img->height > $hmax) {
                                if ($img->height > $img->width) {
                                    $img->resize($wmax, $hmax, Image::HEIGHT);
                                } else {
                                    $img->resize($wmax, $hmax, Image::WIDTH);
                                }
                            }
                            $img->save($original . $name);
                            
                            switch ($resize) {
                                case 'width' :   $img->resize($width, $height, Image::WIDTH);  break;
                                case 'height' :  $img->resize($width, $height, Image::HEIGHT); break;
                                case 'stretch' : $img->resize($width, $height); break;
                                default : 
                                    // crop
                                    if (($img->width/$img->height) > $ratio) {
                                        $img->resize($width, $height, Image::HEIGHT)->crop($width, $height, round(($img->width-$width)/2),0);
                                    } else {
                                        $img->resize($width, $height, Image::WIDTH)->crop($width, $height, 0, 0);
                                    }
                                    break;
                            }
                            $img->save($thumbs . $name);
                        }
                    }
                    Request::redirect('index.php?id=stock&album_id='.$album_id);
                } else { die('csrf detected!'); }
            }
            
            /**
             * Actions
             */
            if (Request::get('action')) {
                switch (Request::get('action')) {
                    case 'addalbum': View::factory('stock/views/backend/album_add')->assign('resize_way', $resize_way)->display(); break;
                    case 'settings': View::factory('stock/views/backend/settings')->assign('resize_way', $resize_way)->display(); break;
                }
            } else {
                if(Request::get('album_id')) {
                    $album = $stock->select('[id='.(int)Request::get('album_id').']');
                    $album = $album[0];
                    Notification::setNow('upload', 'upload!');
                    
                    $files = File::scan($dir . $album['id'] . DS . 'thumbs' . DS , 'jpg');

                    View::factory('stock/views/backend/album')
                        ->assign('album', $album)
                        ->assign('resize_way', $resize_way)
                        ->assign('files', $files)
                        ->assign('path_orig', $siteurl.'public/stock/'.$album['id'].'/original/')
                        ->assign('path_thumb', $siteurl.'public/stock/'.$album['id'].'/thumbs/')
                        ->display();
                } else {
                    $records = $stock->select(null, 'all');
                    View::factory('stock/views/backend/index')->assign('records', $records)->display();
                }
            }
	    }
        
        /**
         *  Ajax save
         */ 
        public static function ajaxSave() {
        
            // save settings
            if (Request::post('stock_submit_settings')) {
                if (Security::check(Request::post('csrf'))) {
                    Option::update(array(
                        'st_w' => (int)Request::post('width_thumb'), 
                        'st_h' => (int)Request::post('height_thumb'),
                        'st_wmax'   => (int)Request::post('width_orig'),
                        'st_hmax'   => (int)Request::post('height_orig'),
                        'st_resize' => (string)Request::post('resize_way')
                    ));
                    exit('<b>'.__('Resize success!', 'stock').'</b>');
                } else { die('csrf detected!'); }
            }
            
            // save album edit
            if (Request::post('stock_submit_album_edit')) {
                if (Security::check(Request::post('csrf'))) {
                    
                    $w = (int)Request::post('width_thumb');
                    $h = (int)Request::post('height_thumb');
                    $wmax = (int)Request::post('width_orig');
                    $hmax = (int)Request::post('height_orig');
                    $resize = (string)Request::post('resize_way');
                    $name = (string)Request::post('name');
					$lihp = (string)Request::post('lihp');
					$title0 = (string)Request::post('title0');
					$title1 = (string)Request::post('title1');
					$title2 = (string)Request::post('title2');
					$title3 = (string)Request::post('title3');
					$title4 = (string)Request::post('title4');
					$title5 = (string)Request::post('title5');
					$title6 = (string)Request::post('title6');
					$title7 = (string)Request::post('title7');
					$title8 = (string)Request::post('title8');
					$title9 = (string)Request::post('title9');
					$title10 = (string)Request::post('title10');
					$title11 = (string)Request::post('title11');
					$title12 = (string)Request::post('title12');
					$title13 = (string)Request::post('title13');
					$title14 = (string)Request::post('title14');
					$title15 = (string)Request::post('title15');
					$title16 = (string)Request::post('title16');
					$title17 = (string)Request::post('title17');
					$title18 = (string)Request::post('title18');
					$title19 = (string)Request::post('title19');
					$title20 = (string)Request::post('title20');
					$title21 = (string)Request::post('title21');
					$title22 = (string)Request::post('title22');
					$title23 = (string)Request::post('title23');
					$title24 = (string)Request::post('title24');
					$title25 = (string)Request::post('title25');
					$title26 = (string)Request::post('title26');
					$title27 = (string)Request::post('title27');
					$title28 = (string)Request::post('title28');
					$title29 = (string)Request::post('title29');
					$title30 = (string)Request::post('title30');
					$title31 = (string)Request::post('title31');
					$title32 = (string)Request::post('title32');
					$title33 = (string)Request::post('title33');
					$title34 = (string)Request::post('title34');
					$title35 = (string)Request::post('title35');
					$title36 = (string)Request::post('title36');
					$title37 = (string)Request::post('title37');
					$title38 = (string)Request::post('title38');
					$title39 = (string)Request::post('title39');
					$title40 = (string)Request::post('title40');
                    $album_id = (int)Request::post('album_id');
                    
                    if(empty($name)) $name = __('No title', 'stock');
                    
                    $stock = new Table('stock');
                    $stock->update($album_id, array('name'=>$name, 'lihp'=>$lihp, 'title0'=>$title0, 'title1'=>$title1, 'title2'=>$title2, 'title3'=>$title3, 'title4'=>$title4, 'title5'=>$title5, 'title6'=>$title6, 'title7'=>$title7, 'title8'=>$title8, 'title9'=>$title9, 'title10'=>$title10, 'title11'=>$title11, 'title12'=>$title12, 'title13'=>$title13, 'title14'=>$title14, 'title15'=>$title15, 'title16'=>$title16, 'title17'=>$title17, 'title18'=>$title18, 'title19'=>$title19, 'title20'=>$title20, 'title21'=>$title21, 'title22'=>$title22, 'title23'=>$title23, 'title24'=>$title24, 'title25'=>$title25, 'title26'=>$title26, 'title27'=>$title27, 'title28'=>$title28, 'title29'=>$title29, 'title30'=>$title30, 'title31'=>$title31, 'title32'=>$title32, 'title33'=>$title33, 'title34'=>$title34, 'title35'=>$title35, 'title36'=>$title36, 'title37'=>$title37, 'title38'=>$title38, 'title39'=>$title39, 'title40'=>$title40, 'w'=>$w, 'h'=>$h, 'wmax'=>$wmax, 'hmax'=>$hmax, 'resize'=>$resize));
                    
                    exit('<b>'.__('Resize success!', 'stock').'</b>');
                } else { die('csrf detected!'); }
            }
            
            // photos resize
            if(Request::post('st_resize') and (int)Request::post('album_id')>0) {
                
                $id = (int)Request::post('album_id');
                
                $dir = ROOT . DS . 'public' . DS . 'stock' . DS;  
                $thumbs   = $dir . $id . DS . 'thumbs' . DS;
                $original = $dir . $id . DS . 'original' . DS;
            
                $files = File::scan($thumbs, 'jpg');
                if ($files > 0) {
                    
                    $stock = new Table('stock');
                    $album = $stock->select('[id='.$id.']');
                    $album = $album[0];
                
                    $width  = $album['w'];
                    $height = $album['h'];
                    $resize_way = $album['resize'];
                    $ratio = $width/$height;
                       
                    foreach ($files as $name) {
                        $img = Image::factory($original.$name);
                            
                        switch ($resize_way) {
                            case 'width' : $img->resize($width, $height, Image::WIDTH); break;
                            case 'height' : $img->resize($width, $height, Image::HEIGHT); break;
                            case 'stretch' : $img->resize($width, $height); break;
                            default : 
                                // crop                                    
                                if (($img->width/$img->height) > $ratio) {
                                    $img->resize($width, $height, Image::HEIGHT)->crop($width, $height, round(($img->width-$width)/2),0);
                                } else {
                                    $img->resize($width, $height, Image::WIDTH)->crop($width, $height, 0, 0);
                                }
                                break;
                        }
                        $img->save($thumbs . $name);
                    }
                }
                exit('<b>'.__('Resize success!', 'stock').'</b>');
            }
        }
	}
    
    
<h2><?php echo __('Album', 'stock').': "'.$album['name'].'"';?></h2>

<ul class="breadcrumb">
    <li><a href="index.php?id=stock"><?php echo __('Stock', 'stock');?></a> <span class="divider">/</span></li>
    <li class="active"><?php echo $album['name'];?></li>
</ul>

<ul class="nav nav-tabs">
    <li <?php if (Notification::get('upload')) { ?>class="active"<?php } ?>><a href="#upload" data-toggle="tab"><?php echo __('Upload photo', 'stock'); ?></a></li>
    <li <?php if (Notification::get('edit')) { ?>class="active"<?php } ?>><a href="#edit" data-toggle="tab"><?php echo __('Edit', 'stock'); ?></a></li>
    <li <?php if (Notification::get('resize')) { ?>class="active"<?php } ?>><a href="#resize" data-toggle="tab"><?php echo __('Resize', 'stock'); ?></a></li>
    <li <?php if (Notification::get('delete')) { ?>class="active"<?php } ?>><a href="#delete" data-toggle="tab"><?php echo __('Delete', 'stock'); ?></a></li>
</ul>

<div class="tab-content tab-page">
    <div class="tab-pane <?php if (Notification::get('upload')) { ?>active<?php } ?>" id="upload">
        <?php
        echo (
            Form::open(null, array('enctype' => 'multipart/form-data')).
            Form::hidden('csrf', Security::token()).
            Form::hidden('album_id', $album['id']).
            Form::input('file', null, array('type' => 'file', 'size' => '25')).Html::br().
            Form::submit('upload_file', __('Upload', 'stock'), array('class' => 'btn default btn-small')).
            Form::close()
        );
        ?>        
    </div>
    <div class="tab-pane <?php if (Notification::get('edit')) { ?>active<?php } ?>" id="edit">
        <?php 
        
        echo (
            '<form onSubmit="return stAlbumEditSave(this);" method="post">'.
            '<div style="overflow:hidden">'.
            Form::label('name', __('The album title', 'stock')).
            Form::input('name', $album['name'], array('style'=>'width:445px;')).
            '</div>'.
            '<div style="float:left; margin-right:20px;">'.
            Form::label('width_thumb', __('Width thumbnails (px)', 'stock')).
            Form::input('width_thumb', $album['w']).
            '</div><div style="float:left;">'.
            Form::label('height_thumb', __('Height thumbnails (px)', 'stock')).
            Form::input('height_thumb', $album['h']).
            '</div><br clear="both"/>'.
            '<div style="float:left; margin-right:20px;">'.
            Form::label('width_orig', __('Original width (px, max)', 'stock')).
            Form::input('width_orig', $album['wmax']).
            '</div><div style="float:left;">'.
            Form::label('height_orig', __('Original height (px, max)', 'stock')).
            Form::input('height_orig', $album['hmax']).
            '</div><br clear="both"/>'.	
            '<div style="float:left; margin-right:20px;">'.
            Form::label('resize_way', __('Resize way', 'stock')).
            Form::select('resize_way', $resize_way, $album['resize']).Html::Br().
            '</div>'.
			'<div style="float:left; margin-top:2px;">'.
            Form::hidden('csrf', Security::token()).
            Form::hidden('album_id', $album['id']).
            Form::hidden('stock_submit_album_edit', true).
            Form::hidden('siteurl',Option::get('siteurl')).
            Form::label('submit_settings', __('&nbsp;')).
            Form::submit('submit_settings', __('Save', 'stock'), array('class' => 'btn')).
            '</div><br clear="both"/><div id="st-edit-result"></div>'.
			'<div style="overflow:hidden">'.
			'<div>'.
			Form::label('lihp',  __('lihp', 'stock')).
            Form::input('lihp', $album['lihp'], array('style'=>'width:200px;')).
			'</div>'.
			Form::label('title0',  __('Title', 'stock')).
            Form::input('title0', $album['title0'], array('style'=>'width:445px;')).
			
            Form::label('title1', __('Title', 'stock')).
            Form::input('title1', $album['title1'], array('style'=>'width:445px;')).
			
			Form::label('title2', __('Title', 'stock')).
            Form::input('title2', $album['title2'], array('style'=>'width:445px;')).
			
			Form::label('title3', __('Title', 'stock')).
            Form::input('title3', $album['title3'], array('style'=>'width:445px;')).
			
			Form::label('title4', __('Title', 'stock')).
            Form::input('title4', $album['title4'], array('style'=>'width:445px;')).
			
			Form::label('title5', __('Title', 'stock')).
            Form::input('title5', $album['title5'], array('style'=>'width:445px;')).
			
			Form::label('title6', __('Title', 'stock')).
            Form::input('title6', $album['title6'], array('style'=>'width:445px;')).
			
			Form::label('title7', __('Title', 'stock')).
            Form::input('title7', $album['title7'], array('style'=>'width:445px;')).
			
			Form::label('title8', __('Title', 'stock')).
            Form::input('title8', $album['title8'], array('style'=>'width:445px;')).
			
			Form::label('title9', __('Title', 'stock')).
            Form::input('title9', $album['title9'], array('style'=>'width:445px;')).
			
			Form::label('title10', __('Title', 'stock')).
            Form::input('title10', $album['title10'], array('style'=>'width:445px;')).
			
			Form::label('title11', __('Title', 'stock')).
            Form::input('title11', $album['title11'], array('style'=>'width:445px;')).
			
			Form::label('title12', __('Title', 'stock')).
            Form::input('title12', $album['title12'], array('style'=>'width:445px;')).
			
			Form::label('title13', __('Title', 'stock')).
            Form::input('title13', $album['title13'], array('style'=>'width:445px;')).
			
			Form::label('title14', __('Title', 'stock')).
            Form::input('title14', $album['title14'], array('style'=>'width:445px;')).
			
			Form::label('title15', __('Title', 'stock')).
            Form::input('title15', $album['title15'], array('style'=>'width:445px;')).
			
			Form::label('title16', __('Title', 'stock')).
            Form::input('title16', $album['title16'], array('style'=>'width:445px;')).
			
			Form::label('title17', __('Title', 'stock')).
            Form::input('title17', $album['title17'], array('style'=>'width:445px;')).
			
			Form::label('title18', __('Title', 'stock')).
            Form::input('title18', $album['title18'], array('style'=>'width:445px;')).
			
			Form::label('title19', __('Title', 'stock')).
            Form::input('title19', $album['title19'], array('style'=>'width:445px;')).
			
			Form::label('title20', __('Title', 'stock')).
            Form::input('title20', $album['title20'], array('style'=>'width:445px;')).

			Form::label('title21', __('Title', 'stock')).
            Form::input('title21', $album['title21'], array('style'=>'width:445px;')).
			
			Form::label('title22', __('Title', 'stock')).
            Form::input('title22', $album['title22'], array('style'=>'width:445px;')).
			
			Form::label('title23', __('Title', 'stock')).
            Form::input('title23', $album['title23'], array('style'=>'width:445px;')).
			
			Form::label('title24', __('Title', 'stock')).
            Form::input('title24', $album['title24'], array('style'=>'width:445px;')).
			
			Form::label('title25', __('Title', 'stock')).
            Form::input('title25', $album['title25'], array('style'=>'width:445px;')).
			
			Form::label('title26', __('Title', 'stock')).
            Form::input('title26', $album['title26'], array('style'=>'width:445px;')).
			
			Form::label('title27', __('Title', 'stock')).
            Form::input('title27', $album['title27'], array('style'=>'width:445px;')).
			
			Form::label('title28', __('Title', 'stock')).
            Form::input('title28', $album['title28'], array('style'=>'width:445px;')).
			
			Form::label('title29', __('Title', 'stock')).
            Form::input('title29', $album['title29'], array('style'=>'width:445px;')).
			
			Form::label('title30', __('Title', 'stock')).
            Form::input('title30', $album['title30'], array('style'=>'width:445px;')).
			
			Form::label('title31', __('Title', 'stock')).
            Form::input('title31', $album['title31'], array('style'=>'width:445px;')).
			
			Form::label('title32', __('Title', 'stock')).
            Form::input('title32', $album['title32'], array('style'=>'width:445px;')).
			
			Form::label('title33', __('Title', 'stock')).
            Form::input('title33', $album['title33'], array('style'=>'width:445px;')).
			
			Form::label('title34', __('Title', 'stock')).
            Form::input('title34', $album['title34'], array('style'=>'width:445px;')).
			
			Form::label('title35', __('Title', 'stock')).
            Form::input('title35', $album['title35'], array('style'=>'width:445px;')).
			
			Form::label('title36', __('Title', 'stock')).
            Form::input('title36', $album['title36'], array('style'=>'width:445px;')).
			
			Form::label('title37', __('Title', 'stock')).
            Form::input('title37', $album['title37'], array('style'=>'width:445px;')).
			
			Form::label('title38', __('Title', 'stock')).
            Form::input('title38', $album['title38'], array('style'=>'width:445px;')).
			
			Form::label('title39', __('Title', 'stock')).
            Form::input('title39', $album['title39'], array('style'=>'width:445px;')).
			
			Form::label('title40', __('Title', 'stock')).
            Form::input('title40', $album['title40'], array('style'=>'width:445px;')).
			'</div>'.
			

            Form::close()
        );
        ?>  
    </div>
    <div class="tab-pane <?php if (Notification::get('resize')) { ?>active<?php } ?>" id="resize">
        <?php 
            echo __('Resize content', 'stock').Html::Br(2);
            echo Html::anchor(__('Resize start', 'stock'), '#',
           array('class' => 'btn btn-actions', 'onclick' => "return stResize(".$album['id'].", '".Option::get('siteurl')."');"));
        ?> 
        <div id="st_result"></div>
    </div>
    <div class="tab-pane <?php if (Notification::get('delete')) { ?>active<?php } ?>" id="delete">
        <?php echo __('sure album', 'stock');?><br/><br/>
        <a class="btn btn-actions" href="index.php?id=stock&delete_album=<?php echo $album['id'];?>&token=<?php echo Security::token();?>"><?php echo __('Delete album', 'stock');?></a>
        <br clear="both"/>
    </div>
</div>
<br/>
<table class="table table-bordered">
    <thead>
        <tr>
            <td><?php echo __('Photos', 'stock'); ?></td>
            <td><?php echo __('Shortcode', 'stock'); ?></td>
            <td width="30%"><?php echo __('Actions', 'stock'); ?></td>
        </tr>
    </thead>
    <tbody>
    <?php if (count($files) > 0) foreach ($files as $name) { ?>
    <tr>
        <td><a href="<?php echo $path_orig.$name;?>" rel="lightbox"><img src="<?php echo $path_thumb.$name;?>" style="max-width:100px; max-height:50px;" alt=""/></a></td>
        <td>{stock album="<?php echo $album['id'];?>" img="<?php echo $name; ?>"}<br>
		{zstock album="<?php echo $album['id'];?>" img="<?php echo $name; ?>"}</td>
        <td><?php echo Html::anchor(__('Delete', 'stock'), 'index.php?id=stock&album_id='.$album['id'].'&delete_img='.$name.'&token='.Security::token(), array('class' => 'btn btn-actions', 'onClick'=>'return confirmDelete(\''.__('sure', 'stock').'\')')); ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
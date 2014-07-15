<h2><?php echo __('Stock', 'stock');?></h2>

	
<a class="btn btn-small" href="index.php?id=stock&action=addalbum"><?php echo __('Add album', 'stock');?></a> 
<a class="btn btn-small" href="index.php?id=stock&action=settings"><?php echo __('Settings', 'stock');?></a>
<br clear="both"/><br/>

<table class="table table-bordered">
    <thead>
        <tr>
            <td><?php echo __('Albums', 'stock'); ?></td>
            <td><?php echo __('Shortcode', 'stock'); ?></td>
            <td><?php echo __('Size', 'stock'); ?></td>
            <td width="30%"><?php echo __('Actions', 'stock'); ?></td>
        </tr>
    </thead>
    <tbody>
    <?php if (count($records) > 0) foreach ($records as $row) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td>{stock album="<?php echo $row['id']; ?>"}
		<br>{mstock album="<?php echo $row['id']; ?>"}
		<br>{pstock album="<?php echo $row['id']; ?>"}
		</td>
        <td><?php echo $row['w'].'x'.$row['h']; ?></td>        
        <td><?php echo Html::anchor(__('Show', 'stock'), 'index.php?id=stock&album_id='.$row['id'], array('class' => 'btn btn-actions')); ?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<ul class="nav nav-tabs">
    <li <?php if (Notification::get('t-manual')) { ?>class="active"<?php } ?>><a href="#t-manual" data-toggle="tab"><?php echo __('Stock t-manual', 'stock'); ?></a></li>
	<li <?php if (Notification::get('t-needs')) { ?>class="active"<?php } ?>><a href="#t-needs" data-toggle="tab"><?php echo __('Stock t-needs', 'stock'); ?></a></li>
	<li <?php if (Notification::get('t-lightbox')) { ?>class="active"<?php } ?>><a href="#t-lightbox" data-toggle="tab"><?php echo __('Stock t-lightbox', 'stock'); ?></a></li>
	<li <?php if (Notification::get('t-mslider')) { ?>class="active"<?php } ?>><a href="#t-mslider" data-toggle="tab"><?php echo __('Stock t-mslider', 'stock'); ?></a></li>
	<li <?php if (Notification::get('t-czoom')) { ?>class="active"<?php } ?>><a href="#t-czoom" data-toggle="tab"><?php echo __('Stock t-czoom', 'stock'); ?></a></li>
	<li <?php if (Notification::get('t-lipag')) { ?>class="active"<?php } ?>><a href="#t-lipag" data-toggle="tab"><?php echo __('Stock t-lipag', 'stock'); ?></a></li>
</ul>

<div class="tab-content tab-page">

<div class="tab-pane <?php if (Notification::get('t-manual')) { ?>active<?php } ?>" id="t-manual">
<?php echo __('Stock b-manual', 'stock'); ?>
    </div>
	
<div class="tab-pane <?php if (Notification::get('t-needs')) { ?>active<?php } ?>" id="t-needs">
<?php echo __('Stock b-needs', 'stock'); ?>
</div>
	
<div class="tab-pane <?php if (Notification::get('t-lightbox')) { ?>active<?php } ?>" id="t-lightbox">
<?php echo __('Stock b-lightbox', 'stock'); ?>
</div>
	
<div class="tab-pane <?php if (Notification::get('t-mslider')) { ?>active<?php } ?>" id="t-mslider">
<?php echo __('Stock b-mslider', 'stock'); ?>
</div>
	
<div class="tab-pane <?php if (Notification::get('t-czoom')) { ?>active<?php } ?>" id="t-czoom">
<?php echo __('Stock b-czoom', 'stock'); ?>
</div>

<div class="tab-pane <?php if (Notification::get('t-lipag')) { ?>active<?php } ?>" id="t-lipag">
<?php echo __('Stock b-lipag', 'stock'); ?>
</div>

	
</div>


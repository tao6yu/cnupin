<?php if (!defined('THINK_PATH')) exit();?>var str = "";
<?php if($ad['type'] == 'code'): ?>str += '<?php echo ($ad["code"]); ?>';
<?php else: ?>
str += "<a href='<?php echo u('advert/click',array('id'=>$ad['id']));?>' target='_blank'>";
<?php if($ad['type'] == 'text'):?>
    str += '<?php echo ($ad["code"]); ?>';
<?php elseif($ad['type'] == 'image'): ?>
    str += "<img title='' class='ad_img' src='__ROOT__/data/advert/<?php echo ($ad["code"]); ?>' width='<?php echo ($board_info['width']-2); ?>' height='<?php echo ($board_info['height']-2); ?>'>";
<?php elseif($ad['type'] == 'flash'): ?>
    str += "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='<?php echo ($board_info["width"]); ?>' height='<?php echo ($board_info["height"]); ?>' id='FlashAD_"+this.ADID+"' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0'>";
    str += "<param name='movie' value='data/advert/<?php echo ($ad["code"]); ?>' />";
    str += "<param name='quality' value='autohigh' />";
    str += "<param name='wmode' value='opaque'/>";
    str += "<embed src='data/advert/<?php echo ($ad["code"]); ?>' quality='autohigh' wmode='opaque' name='flashad' swliveconnect='TRUE' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='<?php echo ($board_info["width"]); ?>' height='<?php echo ($board_info["height"]); ?>'></embed>";
    str += "</object>";
<?php endif;?>
str += "</a>";<?php endif; ?>
document.write(str);
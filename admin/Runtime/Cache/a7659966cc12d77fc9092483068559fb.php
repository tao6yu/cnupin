<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=7" /><link href="__ROOT__/statics/admin/css/style.css" rel="stylesheet" type="text/css"/><link href="__ROOT__/statics/css/dialog.css" rel="stylesheet" type="text/css" /><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidator.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/formvalidatorregex.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/admin/js/admin_common.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/dialog.js"></script><script language="javascript" type="text/javascript" src="__ROOT__/statics/js/iColorPicker.js"></script><script language="javascript">var URL = '__URL__';
var ROOT_PATH = '__ROOT__';
var APP	 =	 '__APP__';
var lang_please_select = "<?php echo (L("please_select")); ?>";
var def=<?php echo ($def); ?>;
$(function($){
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
});

</script><title><?php echo (L("website_manage")); ?></title></head><body><div id="ajax_loading">提交请求中，请稍候...</div><?php if($show_header != false): if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content-menu ib-a blue line-x"><?php if(!empty($big_menu)): ?><a class="add fb" href="<?php echo ($big_menu["0"]); ?>"><em><?php echo ($big_menu["1"]); ?></em></a>　<?php endif; ?></div></div><?php endif; endif; ?><link rel="stylesheet" type="text/css" href="__ROOT__/statics/js/calendar/calendar-blue.css"/><script type="text/javascript" src="__ROOT__/statics/js/calendar/calendar.js"></script><style type="text/css">td,th{ 
	height:30px;
}
</style><form action="<?php echo u('items/delete_search');?>" method="post" name="myform" id="myform"><div class="pad-10"><div class="col-tab"><div id="div_setting_1" class="contentList pad-10"><table width="100%" cellspacing="0" class="search-form"><tr><th width=120 align=right>发布时间：</th><td><input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($time_start); ?>"><script language="javascript" type="text/javascript">	                        Calendar.setup({
	                            inputField     :    "time_start",
	                            ifFormat       :    "%Y-%m-%d",
	                            showsTime      :    'true',
	                            timeFormat     :    "24"
	                        });
	                    </script>	                    -
	                    <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($time_end); ?>"><script language="javascript" type="text/javascript">	                        Calendar.setup({
	                            inputField     :    "time_end",
	                            ifFormat       :    "%Y-%m-%d",
	                            showsTime      :    'true',
	                            timeFormat     :    "24"
	                        });
	                    </script></td></tr><tr><th align=right>商品分类：</th><td><select name="cate_id" style="width:250px;"><option value="">--所有分类--</option><?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" level="<?php echo ($val["level"]); ?>" <?php if($cate_id == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$val['level']); echo trim($val['name']);?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></td></tr><tr><th align=right>审核状态：</th><td><select name="status" style="width:250px;"><option value="" selected>-所有状态-</option><option value="1">已审核</option><option value="0">未审核</option></select></td></tr><tr><th align=right>价格范围：</th><td><input type="text" name="min_price" size="5" value="<?php echo ($min_price); ?>" />&nbsp;-&nbsp;<input type="text" name="max_price" size="5" value="<?php echo ($max_price); ?>" /></td></tr><tr><th align=right>关 键 字：</th><td><input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($keyword); ?>" /></td></tr><tr><th align=right>确认删除：</th><td><input name="isok" type="checkbox" class="input-text" value="1" />&nbsp;&nbsp;<font color=red>(注：确认是否要删除，删除的数据不可恢复！)</font></td></tr></table></div><div class="btn"><input type="submit" name="dosubmit" value="删除" class="button" id="dosubmit"　/></div></div></div></form></body></html>
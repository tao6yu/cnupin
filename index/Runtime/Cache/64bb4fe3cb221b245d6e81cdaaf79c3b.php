<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo ($seo["seo_title"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["seo_keys"]); ?>" />
<meta name="description" content="<?php echo ($seo["seo_desc"]); ?>" />
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/style.css" />
<script type="text/javascript">
var def=<?php echo ($def); ?>;
</script> 
<script type="text/javascript" src="__ROOT__/statics/js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/pinphp.js"></script>
<script type="text/javascript" src="__TMPL__public/js/common.js"></script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="__TMPL__public/css/ie.css" />
<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.corner.js"></script>
<script type="text/javascript">
$(function(){ 
	$('.jq_corner').corner();
});
</script>
<![endif]-->
<script type="text/javascript">
    $(document).ready(function(){
                var topMain=$("#topHeader").height()+20;//是头部的高度加头部与nav导航之间的距离。
                var nav=$("#navHeader");
                $(window).scroll(function(){
                    if ($(window).scrollTop()>topMain){
                    //如果滚动条顶部的距离大于topMain则就nav导航就添加类.nav_scroll，否则就移除。
                        nav.addClass("nav_fixed");
                    }
                    else{
                        nav.removeClass("nav_fixed");
                    }
                });
     
        })
</script>
</head>
<body>
<div class="header">
    <div class="mbox clearfix" id="topHeader">
        <span class="logo"> 
        	<a title="<?php echo ($site_name); ?>" href="__APP__/"> 
            	<img alt="<?php echo ($site_name); ?>" src="__TMPL__/public/images/logo.png"> 
         	</a> 
     	</span>
        <div class="right">
            <ol class="homelogin login_list">
            <?php if(isset($user)): ?><li><a href="<?php echo u('uc/index');?>">我的空间</a></li>
				<li><a href="<?php echo u('uc/account_basic');?>">帐号设置</a></li>
				<li><div id="share_goods" class="left top_share"><div class="button">分享宝贝</div></div></li>
                <li><a href="<?php echo u('uc/logout');?>">退出</a></li>
			<?php else: ?>
	            <li><a class="nav-link-item sep url_cookie red" href="<?php echo u('uc/login');?>">登录</a></li>
                <li><a class="nav-link-item sep url_cookie red" href="<?php echo u('uc/register');?>">注册</a></li>
                <!-- <li><a class="m_sina" href="<?php echo u('uc/sina_login');?>" target="_blank">微博登录</a></li>
                <li><a class="m_qq" href="<?php echo u('uc/qq_login');?>" target="_blank">QQ登录</a></li> --><?php endif; ?>
            <li><a class="sep nav-link-item" onClick="return SetHome(this,'<?php echo ($site_domain); ?>');">设为首页</a></li>
            <li><a class="sep nav-link-item" onClick="return addBookmark('<?php echo ($site_name); ?>','<?php echo ($site_domain); ?>');">加入收藏</a></li>   
            </ol>
        </div>
    </div>
    <div class="main_nav_wrapper" id="navHeader">
        <div class="main_nav">
            <ul class="nav_left">
                <li><a href="__APP__/">首 页</a></li>
                <?php if(is_array($nav_list['main'])): $i = 0; $__LIST__ = $nav_list['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                    <?php if($val['in_site'] == '0'): ?><a href="<?php echo ($val["url"]); ?>" title="<?php echo ($val["name"]); ?>" <?php if($val['system'] == 0): ?>class="f12 fnormal"<?php endif; ?>>
                    <?php else: ?>
                    <a href="__APP__<?php echo ($val["url"]); ?>" title="<?php echo ($val["name"]); ?>" <?php if($val['system'] == 0): ?>class="f12 fnormal"<?php endif; ?>><?php endif; ?>
                    <?php echo ($val["name"]); ?></a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="nav_search">
                <form method="post" action="<?php echo u('search/index');?>" onsubmit="return check_search(this);">
                    <input type="text" value="<?php echo ($default_kw); ?>" autocomplete="off" name="keywords" class="kw_ipt f12 gray">
                    <input type="submit" value="" id="fm_hd_btm_shbx_bttn" class="do_ipt">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var default_kw = "<?php echo ($default_kw); ?>";
$(function(){
	$(".kw_ipt").focus(function(){
		$(this).val($(this).val()==default_kw ? '' : $(this).val());
	}).blur(function(){
		$(this).val($(this).val()=='' ? default_kw : $(this).val());
	});
});
</script>
<div class="wrapper clearfix">
<div class="content">
	<div id="group_nav" class="clearfix">
		<a href="<?php echo u('group/index?cid=0');?>" <?php if($cid == 0): ?>class="on"<?php endif; ?>>推荐</a>
		<?php if(is_array($top_cat_list)): $i = 0; $__LIST__ = array_slice($top_cat_list,0,10,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo u('group/index',array('cid'=>$val['id']));?>" <?php if($val["id"] == $cid): ?>class="on"<?php endif; ?>><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>

	<?php if($cid == 0): if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="clear">						
				<div class="mt20 clearfix">
					<span class="fr">
						<a target="_blank" class="gray" href="<?php echo u('group/index',array('cid'=>$val['id']));?>">更多<samp>&gt;&gt;</samp></a>
					</span>
					<h2 class="fl">
						<span style="font-size:12px;">爱美丽们分享的</span> 
						<a target="_blank" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>">
							<span class="red f16"><?php echo ($val["name"]); ?></span>
						</a>
					</h2>
					<ul class="guide_links fl">
						<?php if(is_array($val['s'])): $i = 0; $__LIST__ = $val['s'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$sval['id']));?>" class="red"><?php echo ($sval["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<?php if(is_array($val['g'])): $key = 0; $__LIST__ = $val['g'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gval): $mod = ($key % 2 );++$key;?><div class="cate_box <?php if($key%4 == 1): ?>alpha<?php elseif($key%4 == 0): ?>omega<?php endif; ?>">
						<div class="box_shadow mt15 group_box">
							<div class="groupbg">
								<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>"><?php echo ($gval["name"]); ?></a></h3>
								<a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="mt5 cursor block g_db_bg">
									<?php if(is_array($gval['items'])): $gikey = 0; $__LIST__ = $gval['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($gikey % 2 );++$gikey;?><img <?php if($gikey%3 == 0): ?>style="margin-right: 0;"<?php endif; ?> url="<?php echo base64_encode($gi['simg']);?>" class="pg_pic_s encode_url"><?php endforeach; endif; else: echo "" ;endif; ?>
								</a>
								<div class="group_desc mt10">
									<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="white">去看看</a></span>
									<span class="share_nums gray"><?php echo ($gval["item_nums"]); ?>个分享</span>
								</div>
								<div class="mt10"></div>
							</div>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="clearfix"></div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php else: ?>
		<?php if(is_array($group_list['scat'])): $gkey = 0; $__LIST__ = $group_list['scat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gval): $mod = ($gkey % 2 );++$gkey;?><div class="cate_box <?php if($gkey%4 == 1): ?>alpha<?php elseif($gkey%4 == 0): ?>omega<?php endif; ?>" key="<?php echo ($gkey); ?>">
				<div class="box_shadow mt15 group_box">
					<div class="groupbg">
						<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>"><?php echo ($gval["name"]); ?></a></h3>
						<a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="mt5 cursor block g_db_bg">
							<?php if(is_array($gval['items'])): $gikey = 0; $__LIST__ = $gval['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($gikey % 2 );++$gikey;?><img <?php if($gikey%3 == 0): ?>style="margin-right: 0;"<?php endif; ?> url="<?php echo base64_encode($gi['simg']);?>" class="pg_pic_s encode_url"><?php endforeach; endif; else: echo "" ;endif; ?>
						</a>
						<div class="group_desc mt10">
							<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="white">去看看</a></span>
							<span class="share_nums gray"><?php echo ($gval["item_nums"]); ?>个分享</span>
						</div>
						<div class="mt10"></div>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>
</div>
<div class="footer">
	<div class="box_shadow clearfix">
        <div class="footer_top">
            <div class="f_list">
                <h4><b>发现热门</b></h4>
                <ul class="l_one">
                    <li><a target="_blank" href="./?m=group">逛宝贝</a></li>
                    <li><a target="_blank" href="./?m=cate&a=index&cid=1">找鞋子</a></li>
                    <li><a target="_blank" href="./?a=index&m=cate&cid=2">选包包</a></li>
                    <li><a target="_blank" href="./?a=index&m=cate&cid=3">搭配饰</a></li>
					<li><a target="_blank" href="./?a=index&m=cate&cid=4">爱美妆</a></li>
					<li><a target="_blank" href="./?a=index&m=cate&cid=5">装家居</a></li>
                </ul>
            </div>
            <div class="f_list">
                <h4><b>关于我们</b></h4>
                <ul class="l_one">
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>1));?>">关于我们</a></li>
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>3));?>">联系我们</a></li>
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>2));?>">网站地图</a></li>
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>4));?>">隐私政策</a></li>
                </ul>
            </div>
            <div class="f_list">
                <h4><b>合作伙伴</b></h4>
                <ul class="l_one">
                    <li><a target="_blank" href="http://www.pinphp.com" target=_blank>PinPHP</a></li>
                    <li><a target="_blank" href="http://www.liqu.com" target=_blank>淘宝返利网</a></li>
                    <li><a target="_blank" href="http://www.yifen.com" target=_blank>一分网</a></li>
					<li><a target="_blank" href="http://www.doudou.com" target=_blank>豆豆网</a></li>
					<?php if(is_array($flink_list)): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(($val["cate_id"] == '2')): ?><li><a target="_blank" href="<?php echo ($val["url"]); ?>" class="f_links fl"><?php echo ($val["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>              
                </ul>
            </div>
            <div class="f_list">
                <h4><b>友情链接</b>  更多>></h4>
                <ul class="l_two">
                    <?php if(is_array($flink_list)): $i = 0; $__LIST__ = $flink_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(($val["cate_id"] == '1')): ?><li><a target="_blank" href="<?php echo ($val["url"]); ?>" class="f_links fl"><?php echo ($val["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                 </ul>
            </div>
            <div class="f_list">
                <h4><b>关注我们</b></h4>
                <ul class="l_one">
					<?php if(($follow_us["weibo_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["weibo_url"]); ?>"><span class="s_sina">&nbsp;&nbsp;</span>新浪微博</a></li><?php endif; ?>
                    <?php if(($follow_us["renren_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["renren_url"]); ?>"><span class="renren">&nbsp;&nbsp;</span>公共主页</a></li><?php endif; ?>
					<?php if(($follow_us["qqweibo_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["qqweibo_url"]); ?>"><span class="s_tx">&nbsp;&nbsp;</span>腾讯微博</a></li><?php endif; ?>
					<?php if(($follow_us["qqzone_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["qqzone_url"]); ?>"><span class="s_qzone">&nbsp;&nbsp;</span>QQ空间</a></li><?php endif; ?>
					<?php if(($follow_us["163_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["163_url"]); ?>"><span class="h_wangyi">&nbsp;&nbsp;</span>网易微博</a></li><?php endif; ?>
					<?php if(($follow_us["douban_url"] != '')): ?><li><a target="_blank" href="<?php echo ($follow_us["douban_url"]); ?>"><span class="s_dbai">&nbsp;&nbsp;</span>豆瓣</a></li><?php endif; ?>
                </ul>
            </div>
        </div>
        
		<!--友情链接-->
        </present>
        <div class="new_footer tc">
        	<div class="copyright">Copyright &copy;2012 <?php echo ($site_name); ?>. All Rights Reserved. <?php echo ($site_icp); ?> <?php echo ($statistics_code); ?></div>
        </div>
	</div>
</div>

<div style="display:none;" id="gotopbtn" class="to_top"></div>
<script type="text/javascript">
$(function(){
	$(window).scroll(function(){
		$(window).scrollTop()>0 ? $("#gotopbtn").css('display','').click(function(){
			$(window).scrollTop(0);
		}) : $("#gotopbtn").css('display','none');
	});
});
</script>
</body>
</html>
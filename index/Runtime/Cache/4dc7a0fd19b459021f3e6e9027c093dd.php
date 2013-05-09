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
<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey=21488238"></script>
<html xmlns:wb="http://open.weibo.com/wb">
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js" type="text/javascript" charset="utf-8"></script>
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
            <div style="float: right;margin-left: 6px;margin-top: -3px;">
                <wb:follow-button uid="3357786172" type="gray_2" width="136" height="24" ></wb:follow-button>
            </div>   
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
        <div class="index_top box_shadow mt15 clearfix">
        	<div class="index_focus fl">
            	<script type="text/javascript">
				$(function(){
					$("#KinSlideshow").KinSlideshow({
						titleBar:{titleBar_height:30,titleBar_alpha:0.5}
					});
				});
				</script>
            	<div id="KinSlideshow" style="visibility:hidden;">
				<?php if(is_array($ad_list)): $i = 0; $__LIST__ = $ad_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?><a href="<?php echo u('focus/click',array('id'=>$ad['id']));?>" target='_blank'><img src="__ROOT__/data/focus/<?php echo ($ad["img"]); ?>" alt="<?php echo ($ad["title"]); ?>" width="580" height="280"/></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
        	</div>
        	<div class="index_active fr">
          		<h3 class="f16">热门<em class="red">活动</em></h3>
         		<div class="hot_area">
            		<div class="l_pic fl">
                    	<a target="_blank" href="<?php if($top_actives['url'] != ''): echo ($top_actives["url"]); else: echo u('article/index',array('id'=>$top_actives['id'])); endif; ?>"><img alt="<?php echo ($top_actives["title"]); ?>" src="__ROOT__/data/news/<?php echo ($top_actives["img"]); ?>"></a>
                    </div>
            		<div class="r_txt fl">
              			<h3 class="f14"><a target="_blank" href="<?php if($top_actives['url'] != ''): echo ($top_actives["url"]); else: echo u('article/index',array('id'=>$top_actives['id'])); endif; ?>" class="red"><?php echo ($top_actives["title"]); ?></a></h3>
              			<p class="des"><?php echo ($top_actives["abst"]); ?></p>
            		</div>
                    <div class="clearfix"></div>
                    <div class="g_txt mt15">
                      <ul>
                    	<?php if(is_array($hot_actives)): $key = 0; $__LIST__ = $hot_actives;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><li class="clearfix"> <b class="fl"><?php echo ($key); ?></b> <a class="fl f14" target="_blank" href="<?php if($val['url'] != ''): echo ($val["url"]); else: echo u('article/index',array('id'=>$val['id'])); endif; ?>"><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>
                    </div>
          		</div>
        	</div>
      	</div>
        <?php if($index_album[index_album] == '1'): if(is_array($index_group_cates)): $i = 0; $__LIST__ = $index_group_cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="mt20 clearfix">
        	<span class="fr"><a target="_blank" class="gray" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>">更多<samp>&gt;&gt;</samp></a></span>
            <h2 class="fl"><span style="font-size:12px;">爱美丽们分享的</span> <a target="_blank" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>"><span class="red f16"><?php echo ($val["name"]); ?></span></a></h2>
            <ul class="guide_links fl">
            	<?php if(is_array($val['s'])): $i = 0; $__LIST__ = $val['s'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sval): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$sval['id']));?>" class="red"><?php echo ($sval["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php if(is_array($val['g'])): $key = 0; $__LIST__ = $val['g'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gval): $mod = ($key % 2 );++$key;?><div class="cate_box <?php if($key%4 == 1): ?>alpha<?php elseif($key%4 == 0): ?>omega<?php endif; ?>">
			<div class="box_shadow mt15 group_box">
			<div class="groupbg">
				<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>"><?php echo ($gval["name"]); ?></a></h3>				
				<div class="mt5 cursor block g_db_bg">
				<ul>
                	<?php if(is_array($gval['items'])): $gikey = 0; $__LIST__ = $gval['items'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gi): $mod = ($gikey % 2 );++$gikey;?><li <?php if($gikey%3 == 0): ?>style="margin-right:0;"<?php endif; ?>><a target="_blank" href="<?php echo u('item/index',array('id'=>$gi['id']));?>"><img url="<?php echo base64_encode($gi['simg']);?>" class="pg_pic_s encode_url"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				</div>				
				<div class="group_desc mt10">
					<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$gval['id']));?>" class="white">去看看</a></span>
					<span class="share_nums gray"><?php echo ($gval["item_nums"]); ?>个宝贝</span>
				</div>
				<div class="mt10"></div>
			</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="clearfix"></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <!-- 九宫格结束　-->    
    </div>	
    	
    <?php if($index_pins[index_pins] == '1'): ?><!-- start -->
    <div>
    	<div class="mt20 clearfix">
        	<span class="fr"><a target="_blank" class="gray" href="?m=search">更多<samp>&gt;&gt;&nbsp;&nbsp;&nbsp;&nbsp;</samp></a></span>
            <h2 class="fl"><span style="font-size:12px;"></span> <span class="red f16">每日精彩推荐</span></h2>
        </div>
    </div>
    <div class="item_list infinite_scroll" style="min-height:600px;">
    	<?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="item mt15 masonry_brick jq_corner" data-corner="7px" iid="<?php echo ($val['id']); ?>">
        <div class="item_t">
            <div class="img tc"> 
            	<a target="_blank" href="<?php echo u('item/index',array('id'=>$val['id']));?>" hidefocus="true" rel="nofollow">
                	<img alt="<?php echo ($val["title"]); ?>" url="<?php echo base64_encode($val['img']);?>" style="display:inline;" class="encode_url">
            	</a>
                <span class="price">促销价:￥<?php echo ($val["promotion_price"]); ?></span> 
                <div class="btns">
                	<a href="javascript:;" class="img_album_btn" iid="<?php echo ($val["id"]); ?>">
                        加入专辑
                    </a>               
                </div>
         	</div>
            <div class="title">
                <span><?php echo ($val["title"]); ?></span>
            </div>
        </div>
        <div class="item_b clearfix">
            <div class="items_likes fl"> 
            	<a href="javascript:;" class="like_btn" iid="<?php echo ($val["id"]); ?>" iurl="<?php echo u('item/index',array('id'=>$val['id']));?>"></a>
                <em class="red bold" id="like_num_<?php echo ($val["id"]); ?>"><?php echo ($val["likes"]); ?></em> 

                <!-- <?php if(($$val["price"]) != $val["promotion_price"]): ?><span style="font-size: 20px;">
                    原价:<del>￥<?php echo ($val["price"]); ?></del>
                    </span><?php endif; ?> -->
                <?php if($val["price"] != $val.promotion_price): ?><span style="font-size: 14px;">
                    原价:<del>￥<?php echo ($val["price"]); ?></del>
                    </span><?php endif; ?>
                
                 
           	</div>
            <div class="items_comment fr">
            	<a href="<?php echo u('item/index',array('id'=>$val['id']));?>#items_comments" target="_blank">评论</a>
                <em class="red bold">(<?php echo ($val["comments"]); ?>)</em> 
            </div>
        </div>  
		
		<?php if(isset($val['user'])): ?><div class="user clearfix">
					<div class="clearfix">
						<div class="avatar">
							<img src="<?php echo uimg($val['user']['img']);?>" width="30px" height="30px"/> 
						</div>                
						<div class="user_info">
							<a href="<?php echo u('uc/index',array('uid'=>$val['user']['id']));?>">来自#<em><?php echo ($val["user"]["name"]); ?></em>#的分享</a>
							<span>
								<?php if($val["remark_status"] == 1): echo ($val["remark"]); endif; ?>
							</span>
						</div>
					</div>
				</div><?php endif; ?>         
		
		<?php if(isset($val['comments_list'])): ?><div class="comments_list">
				<?php if(is_array($val['comments_list'])): $i = 0; $__LIST__ = $val['comments_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="clearfix comment_item">
                    	<div class="fl">
                        	<img src="<?php echo uimg($comment['img']);?>"  width="20px" height="20px" class="uimg fl"/><span class="uname"><?php echo ($comment["name"]); ?></span> :
                        </div>
                    	<?php echo (mb_substr($comment["info"],0,50,'utf-8')); ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div><?php endif; ?>		
    </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
    <?php if($show_sp == 1): ?><div id="more" class="center">
            <a href="<?php echo u('index/index',array('sp'=>2,'p'=>$p));?>" hidefocus="true"></a>
        </div><?php endif; ?> 
    <?php if($page != ''): ?><div id="page" class="page mt20 clearfix" style="display: none;">
        	<span class="page_num"><?php echo ($page); ?></span>
        </div><?php endif; ?>
    <!-- end --><?php endif; ?>
    <div class="mt15">
        <iframe width="950" height="90" src="http://www.taobao.com/go/rgn/union/link_temai.php?size=950x90&pid=mm_42292092_0_0" frameborder="0" marginheight="0" marginwidth="0" border="0" scrolling="no" name="alimamaifrm"></iframe>
    </div>    
	<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.KinSlideshow-1.2.1.min.js"></script>
</div>
<div class="footer">
	<div class="box_shadow clearfix">
        <div class="footer_top">
            <div class="f_list">
                <h4><b>发现热门</b></h4>
                <ul class="l_one">
                    <li><a target="_blank" href="./?m=search">逛宝贝</a></li>
                    <li><a target="_blank" href="./?m=cate&a=index&cid=1">挑衣服</a></li>
                    <li><a target="_blank" href="./?a=index&m=cate&cid=2">找鞋子</a></li>
                    <li><a target="_blank" href="./?a=index&m=cate&cid=3">选包包</a></li>
					<li><a target="_blank" href="./?a=index&m=cate&cid=4">搭配饰</a></li>
					<li><a target="_blank" href="./?a=index&m=cate&cid=5">爱美妆</a></li>
                </ul>
            </div>
            <div class="f_list">
                <h4><b>关于我们</b></h4>
                <ul class="l_one">
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>1));?>">关于我们</a></li>
                    <li><a target="_blank" href="<?php echo u('article/index',array('id'=>3));?>">联系我们</a></li>
                    <!-- href="<?php echo u('article/index',array('id'=>2));?>" -->
                    <li><a target="_blank" href="http://pinphpv22013.com/sitemap.xml">网站地图</a></li>
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
        <div style="text-align: center">
            <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F1ecf603b3231c36a4faf2a7e60704b5e' type='text/javascript'%3E%3C/script%3E"));
            </script>
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
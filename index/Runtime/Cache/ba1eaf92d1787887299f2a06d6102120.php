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
            	<img alt="<?php echo ($site_name); ?>" src="__TMPL__/public/images/logo.gif"> 
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
<script type="text/javascript">
var items_id="<?php echo ($items_id); ?>";
</script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.masonry.min.js"></script>
<script type="text/javascript" src="__ROOT__/statics/js/jquery/plugins/jquery.lazyload.js"></script>
<div class="content">
	<div class="mt15">
	<script language="javascript" src="<?php echo u('advert/index', array('id'=>4));?>"></script>
    </div>
    <p class="item_title f14 bold" style='font-size: 20px;margin-top: 35px;line-height: 25px;'><a target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>"><?php echo ($item["title"]); ?></a></p>
	<div class="item_left fl">
    	<div class="single_item box_shadow mt15 clearfix">
        	<!-- <dl class="twitter_top">
                <dt>
                	<a target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>">
                		<img src="__ROOT__/data/author/32_<?php echo ($item["items_site"]["site_logo"]); ?>"></a>
               	</dt>
                <dd>
                    <span style="color:#ccc;" class="fr"><?php echo (date("m月 d日 H:i",$item["add_time"])); ?></span>
                    <a target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>" class="red"><?php echo ($item["items_site"]["name"]); ?></a>
                    <span class="gray">分享到</span>
                    <span><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="red f12">#<?php echo ($item["items_cate"]["name"]); ?>#</a></span>
                </dd>
                <dd class="quote_goods_title break_word"><?php echo ($item["title"]); ?></dd>
            </dl> -->
            
        	<div class="item_pic">
				<a target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>"><img url="<?php echo base64_encode($item['bimg']);?>" class="encode_url"></a>
				<!-- <?php if(is_array($pics)): $i = 0; $__LIST__ = $pics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><br><a><img src="<?php echo ($val['url']); ?>"></a><?php endforeach; endif; else: echo "" ;endif; ?> -->
			</div>
			<div class="item_detail">
            	<div class="break_word" style='margin-top: 80px;'>
            		
                    <?php if($item["price"] != '0.00'): ?><div class="clearfix" style="padding:12px 0;">
                        <p class="fl" style='color: white;font-size: 22px; font-weight: bold;background-color: rgb(245,77,134);line-height: 25px;padding: 5px;border-radius: 10px 30px 30px 10px;'>￥:<?php echo ($item["promotion_price"]); ?>元<a style="margin-left: 5px;color: white;font-size: 22px; font-weight: bold;" target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>" class="red f16">去购买</a></p>
                    </div><?php endif; ?>
                    <p class="p_heart">
                    	<a onclick="javascript:;" class="like_it cursor pop_comm" iid="<?php echo ($item["id"]); ?>"><b class="red nums" id="like_num_<?php echo ($item["id"]); ?>"><?php echo ($item["likes"]); ?></b></a><br />
                     	<!-- <?php if($item["price"] != '0.00'): ?><p style="margin-top:20px;"><a target="_blank" href="<?php echo u('item/tao',array('id'=>$item['id']));?>" class="red f16">去购买&gt;&gt;</a></p><?php endif; ?> -->
                    </p>
                </div>
            </div>
            <div class="item_tags clearfix">
				<?php echo ($item["info"]); ?>
			</div>
            
			<div class="item_tags clearfix">
				<!-- <span class="fl">宝贝标签：</span> -->
                <?php if(is_array($item['items_tags'])): $i = 0; $__LIST__ = $item['items_tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo u('cate/tag',array('tag'=>urlencode($val['name'])));?>"><?php echo ($val["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare mt10" style="float:right;">
                <a class="bds_qzone"></a>
                <a class="bds_tsina"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <span class="bds_more"></span>
            </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
				/**
				 * 在这里定义bds_config
				 */
				var bds_config = {
					'bdPic':base64_decode("<?php echo base64_encode($item['bimg']);?>")//'请参考自定义分享出去的图片'
				}				
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
            </script>
            <!-- Baidu Button END -->			
			
            <span class="fr mt15"><b class="red f14" id="comments_count"><?php echo ($item["comments"]); ?></b>评论&nbsp;&nbsp;|&nbsp;&nbsp;</span>
            <div class="clearfix"></div>
			
            <div id="items_comments" class="clearfix comments">
				<div class="arrow"></div>            		
                <textarea id="comments_box" class="comments_box" maxlength="300" def="对心爱的宝贝说几句话吧~！">
                </textarea>
                <div class="clearfix mt10">
                	<a id="comments_btn" class="comments_btn" pid="<?php echo ($items_id); ?>">评论</a>
                </div>
                <div class="list_wrap"></div>
            </div>
			          
        </div>       
        <h3 class="f16 mt15">猜你喜欢 </h3>
        <div class="detail_cate_recommend mt15 clearfix">
        <?php if(is_array($siblings_cate_group)): $key = 0; $__LIST__ = array_slice($siblings_cate_group,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><div class="box_shadow group_box <?php if($key%3 == 1): ?>alpha<?php elseif($key%3 == 0): ?>omega<?php endif; ?>">
			<div class="groupbg">
				<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>"><?php echo ($val["name"]); ?></a></h3>				
				<div class="mt5 cursor block g_db_bg">
				<ul>
                	<?php if(is_array($val["items"])): $ikey = 0; $__LIST__ = $val["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ival): $mod = ($ikey % 2 );++$ikey;?><li <?php if($ikey%3 == 0): ?>style="margin-right: 0;"<?php endif; ?>><a target="_blank" href="<?php echo u('item/index',array('id'=>$ival['id']));?>"><img url="<?php echo base64_encode($ival['simg']);?>"  class="pg_pic_s encode_url" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
				</div>
				<div class="group_desc mt10">
					<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$val['id']));?>" class="white">去看看</a></span>
					<span class="share_nums gray"><?php echo ($val["item_nums"]); ?>个宝贝</span>
				</div>
				<div class="mt10"></div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        
        <h3 class="f16 mt15">也许你还喜欢</h3>
        <div class="detail_item_list infinite_scroll">
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
                <?php if($val["price"] != $val.promotion_price): ?><span style="font-size: 20px;">
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
        <!--发现更多-->
        <div class="pager">
        	<div class="more tc f16">
            	<samp class="fl"><a href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="red">去#<?php echo ($item["items_cate"]["name"]); ?>#查看更多分享&gt;&gt;</a></samp>
            	<span class="hua fl"> </span>
        	</div>
        </div>
    </div>
    <div class="item_right fr">
    	<h3 class="f16 mt15">所在杂志</h3>
    	<div class="box_shadow mt15 group_box">
			<div class="groupbg">
				<h3 class="f16 bold"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>"><?php echo ($item["items_cate"]["name"]); ?></a></h3>
				
				<div class="mt5 cursor block g_db_bg">
				<ul>
                	<?php if(is_array($this_cate_group)): $key = 0; $__LIST__ = $this_cate_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key;?><li <?php if($key%3 == 0): ?>style="margin-right:0;"<?php endif; ?>><a target="_blank" href="<?php echo u('item/index',array('id'=>$val['id']));?>"><img url="<?php echo base64_encode($val['simg']);?>" class="pg_pic_s encode_url"></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				</div>
				
				<div class="group_desc mt10">
					<span class="follow_red_btn tc cursor fr"><a target="_blank" href="<?php echo u('cate/index',array('cid'=>$item['items_cate']['id']));?>" class="white">去看看</a></span>
					<span class="share_nums gray"><?php echo ($item["items_cate"]["item_nums"]); ?>个分享</span>
				</div>
				<div class="mt10"></div>
			</div>
		</div>
        <div class="clearfix"></div>
        <div class="mt15" style="width:226px; overflow:hidden;">
        <script language="javascript" src="<?php echo u('advert/index', array('id'=>5));?>"></script>
        </div>
    </div>
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
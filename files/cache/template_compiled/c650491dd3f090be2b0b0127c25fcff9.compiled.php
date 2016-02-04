<?php if(!defined("__XE__"))exit;?>  
  <meta charset="utf-8">
  <title>Groups</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-100006');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/css/style.css--><?php $__tmp=array('m.layouts/flatLayout/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/css/retina.css--><?php $__tmp=array('m.layouts/flatLayout/css/retina.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/js/jquery.box.min.js--><?php $__tmp=array('m.layouts/flatLayout/js/jquery.box.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/css/jquery.bxslider.css--><?php $__tmp=array('m.layouts/flatLayout/css/jquery.bxslider.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/js/jquery.bxslider.min.js--><?php $__tmp=array('m.layouts/flatLayout/js/jquery.bxslider.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/js/common.js--><?php $__tmp=array('m.layouts/flatLayout/js/common.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/css/banner.css--><?php $__tmp=array('m.layouts/flatLayout/css/banner.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:m.layouts/flatLayout/js/jquery.glide.min.js--><?php $__tmp=array('m.layouts/flatLayout/js/jquery.glide.min.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
 
  
  <!--#Meta:common/js/jquery.min.js--><?php $__tmp=array('common/js/jquery.min.js','','','-100006');Context::loadFile($__tmp);unset($__tmp); ?>
  <!--#Meta:m.layouts/flatLayout/css/normalize.css--><?php $__tmp=array('m.layouts/flatLayout/css/normalize.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
  <!--#Meta:m.layouts/flatLayout/css/framework.css--><?php $__tmp=array('m.layouts/flatLayout/css/framework.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
  <!--#Meta:m.layouts/flatLayout/css/washington.css--><?php $__tmp=array('m.layouts/flatLayout/css/washington.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
  <script src="/m.layouts/flatLayout/js/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Montserrat:400,700"]
      }
    });
  </script>
  <script type="text/javascript" src="/m.layouts/flatLayout/js/modernizr.js"></script>
  <?php  ?>
  <?php  ?>
  <!--#Meta:m.layouts/flatLayout/css/ionicons.min.css--><?php $__tmp=array('m.layouts/flatLayout/css/ionicons.min.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
  
  <section class="w-section mobile-wrapper">
    <div class="page-content" id="main-stack">
      <div class="w-nav navbar" data-collapse="all" data-animation="over-left" data-duration="400" data-contain="1" data-easing="ease-out-quint" data-no-scroll="1">
        <div class="w-container">
          <nav class="w-nav-menu nav-menu" role="navigation">
            <div class="nav-menu-header">
              <div class="logo">등기의신</div>
              <div class="slogan">등기의신은 쉽고 빠른 등기를 제공합니다.</div>
              <?php if(!$__Context->is_logged){ ?>
              <a class="login_header" href="<?php echo getUrl('mid','applogin') ?>">로그인하기</a>
              <?php }else{ ?>
              
              
              <div style="text-align: center;margin-top:30px">
              <ul>
              	<li class="login_li"><a class="login_header2" href="<?php echo getUrl('','act','dispMobileexMemberInfo') ?>">회원정보</a></li> 
              	<li class="login_li"><a class="login_header2" href="<?php echo getUrl('','act','dispMobileexScrappedDocument') ?>">찜한 법무사</a></li>
              	<li class="login_li"><a class="login_header2" href="<?php echo getUrl('','act','dispMobileexMessages') ?>">상담내역</a></li>
              </ul>
              </div>
              
              
              <a class="login_header" href="<?php echo getUrl('','act','dispMemberLogout') ?>">로그아웃</a>
              <?php } ?>
            </div>
			
<div style="padding-left: 22px;padding-right: 22px;">
                        
            <a class="w-clearfix w-inline-block nav-menu-link" href="<?php echo getUrl(''.'') ?>" data-load="1">
              <div class="icon-list-menu">
                <div class="icon ion-ios-home-outline"></div>
              </div>
              <div class="nav-menu-titles">시작화면으로 가기</div>
            </a>
            
            
            <a class="w-clearfix w-inline-block nav-menu-link" href="<?php echo getUrl('','mid','board_zhaH13','act','dispBoardWrite') ?>" data-load="1">
              <div class="icon-list-menu">
                <div class="icon ion-ios-paper-outline"></div>
              </div>
              <div class="nav-menu-titles">직접 등기하기</div>
            </a>
            
            
            <a class="w-clearfix w-inline-block nav-menu-link" href="about-us.html" data-load="1">
              <div class="icon-list-menu">
                <div class="icon ion-ios-person-outline"></div>
              </div>
              <div class="nav-menu-titles">법무사를 통한 등기</div>
            </a>
            
            
            <a class="w-clearfix w-inline-block nav-menu-link" href="<?php echo getUrl('','act','dispMobileexSendMessage','receiver_srl','4') ?>" data-load="1">
              <div class="icon-list-menu">
                <div class="icon ion-ios-chatboxes-outline"></div>
              </div>
              <div class="nav-menu-titles">문의하기</div>
            </a>
            
            
            
            
            
            
            
            
            <div class="separator-bottom"></div>
            <div class="separator-bottom"></div>
            <div class="separator-bottom"></div>
          </nav>
          <div class="wrapper-mask" data-ix="menu-mask"></div>
          
          <div class="navbar-title" style="font-weight: bold">
          	<img height="24px" src="/m.layouts/flatLayout/images/dgi_logo.png">
          	</div>
          
          
          <div class="w-nav-button navbar-button left" id="menu-button" data-ix="hide-navbar-icons">
            <div class="navbar-button-icon home-icon">
              <div class="bar-home-icon"></div>
              <div class="bar-home-icon"></div>
              <div class="bar-home-icon"></div>
            </div>
          </div>
        </div>
      </div>
      
      	
    <div class="body">
    	<?php if($__Context->layout_info->page_type == 'main'){ ?>
    	<?php if($__Context->act != NULL){ ?><div class="main-con"><?php echo $__Context->content ?></div><?php } ?>
    	<a href="<?php echo getUrl('','mid','board_zhaH13','act','dispBoardWrite','dgi_way','0') ?>">
    	<?php if($__Context->act == NULL){ ?><div class="directdgi">
    		<div class="direct_logo">직접 등기</div>
    		<div class="direct_slogan" style="text-align: right; vertical-align: baseline;">
    			등기비 계산기와 대법원 인터넷 등기소 안내를 통해
    			<br />
    			혼자서도 할 수 있는 등기를 안내합니다.
    		</div>
    	</div><?php } ?>
    	</a>
    	
    	<a href="<?php echo getUrl('','mid','page_rAvh37') ?>">
    	<?php if($__Context->act == NULL){ ?><div class="bupdgi">
    		<div class="bup_logo" style="text-align: right; vertical-align: baseline;">법무사를 통한 등기</div>
    		<div class="bup_slogan" style="text-align: right; vertical-align: baseline;">
    			내 지역 주변 법무사를 통하여
    			<br/>
    			믿을 수 있는 등기 서비스를 제공합니다.
    		</div>
    	</div><?php } ?>
    	</a>
    	
    	<?php }else{ ?>
		<?php echo $__Context->content ?>
		<?php } ?>
    </div>
  
      
    </div>
    <div class="page-content loading-mask" id="new-stack">
      <div class="loading-icon">
        <div class="navbar-button-icon icon ion-load-d"></div>
      </div>
    </div>
    <div class="shadow-layer"></div>
    
    
    
    
     </div>
       
  </section>
  
  
  
  <script type="text/javascript" src="/m.layouts/flatLayout/js/jquery.min.js"></script>
  <script type="text/javascript" src="/m.layouts/flatLayout/js/framework.js"></script>
  <!--[if lte IE 9]><script src="/m.layouts/flatLayout/js/placeholders.min.js"></script><![endif]-->
<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/nproduct/skins/default/css/style.css--><?php $__tmp=array('modules/nproduct/skins/default/css/style.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/itemdetail.css--><?php $__tmp=array('modules/nproduct/skins/default/css/itemdetail.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/skins/default/css/button.css--><?php $__tmp=array('modules/nproduct/skins/default/css/button.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/script.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/script.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/scroll.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/scroll.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/nproduct/tpl/skin.js/itemdetail.js--><?php $__tmp=array('modules/nproduct/tpl/skin.js/itemdetail.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/nproduct/tpl/skin.filter','insert_comment.xml');$__xmlFilter->compile(); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/nproduct/tpl/skin.filter','insert_review.xml');$__xmlFilter->compile(); ?>
<?php $__Context->category = $__Context->item_info->category_id ?>
<?php if(!$__Context->module_info->thumbnail_width){;
$__Context->module_info->thumbnail_width=140;
} ?>
<?php if(!$__Context->module_info->thumbnail_height){;
$__Context->module_info->thumbnail_height=140;
} ?>
<?php if(!$__Context->module_info->thumbnail_type){;
$__Context->module_info->thumbnail_type='ratio';
} ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/skins/default','header.html') ?>
<?php if($__Context->module_info->category_display!='N'){;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/skins/default','categorylist.html');
} ?>
<script>
	var g_discounted_price = <?php echo $__Context->item_info->getDiscountedPrice() ?>;
	xe.lang.total_amount = '<?php echo $__Context->lang->total_amount ?>';
	xe.lang.total_amount = '<?php echo $__Context->lang->total_amount ?>';
	xe.lang.msg_input_more_than_one = '<?php echo $__Context->lang->msg_input_more_than_one ?>';
	xe.lang.each = '<?php echo $__Context->lang->each ?>';
</script>
<?php if($__Context->module_info->direct_gocart=='Y'){ ?><form id="dummy_form"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" id="is_mobile" value="true" />
	<input type="hidden" id="ncart_mid" value="<?php echo $__Context->module_info->ncart_mid ?>" />
</form><?php } ?>
<div id="itemdetail">
	<table width="100%" colspan="0" cellspacing="0" style="border-collapse: separate">
		<tr>
			<td style="vertical-align:bottom;">
				<div class="item-thumbnail">
					<?php if($__Context->item_info->thumbnailExists($__Context->module_info->thumbnail_width,$__Context->module_info->thumbnail_height,$__Context->module_info->thumbnail_type)){ ?><img src="<?php echo $__Context->item_info->getThumbnail($__Context->module_info->thumbnail_width,$__Context->module_info->thumbnail_height,$__Context->module_info->thumbnail_type) ?>" /><?php } ?>
					<?php if(!$__Context->item_info->thumbnailExists($__Context->module_info->thumbnail_width,$__Context->module_info->thumbnail_height,$__Context->module_info->thumbnail_type)){ ?><img src="img/no_img.gif" alt="no image" width="<?php echo $__Context->module_info->thumbnail_width ?>" height="<?php echo $__Context->module_info->thumbnail_height ?>" /><?php } ?>
					<div class="social_block">
						<!--AfterDocument()-->
					</div>
				</div><!-- thumbnail -->
			</td>
			<td></td>
			<td style="padding:0 16px; vertical-align:bottom;">
				<div class="info-tab">
					<table colspan="0" cellspacing="0" width="100%" class="ko_text">
						<tr>
							<th><?php echo $__Context->lang->product_name ?></th>
							<td><h2 class="product_name"><?php echo $__Context->item_info->item_name ?></h2></td>
						</tr>
						<tr>
							<th><?php echo $__Context->lang->item_code ?></th>
							<td><?php echo $__Context->item_info->item_code ?></td>
						</tr>
						<tr>
							<th><?php echo $__Context->lang->sales_price ?></th>
							<td class="font_size14 product_price"<?php if($__Context->discount_amount){ ?> style="text-decoration:line-through"<?php } ?>><?php echo $__Context->item_info->printPrice() ?></td>
						</tr>
						<?php if($__Context->discount_amount){ ?><tr>
							<th><?php echo $__Context->discount_info ?></th>
							<td class="product_price">- <?php echo nproductItem::formatMoney($__Context->discount_amount) ?> <span class="font_size12"> 할인</span></td>
						</tr><?php } ?>
						<?php if($__Context->discount_amount){ ?><tr>
							<th><?php echo $__Context->lang->discounted_price ?></th>
							<td class="font_size24 product_price"><?php echo nproductItem::formatMoney($__Context->discounted_price) ?></td>
						</tr><?php } ?>
						<?php if($__Context->list_config&&count($__Context->list_config))foreach($__Context->list_config as $__Context->k=>$__Context->v){;
if($__Context->v->idx > -1){ ?><tr>
							<th><?php echo $__Context->v->name ?></th>
							<td><?php echo $__Context->item_info->getExtraVarValue($__Context->k) ?></td>
						</tr><?php }} ?>
						<?php if(!count($__Context->options)){ ?><tr>
							<th><?php echo $__Context->lang->order_quantity ?></th>
							<td>
								<div id="item_<?php echo $__Context->item_info->item_srl ?>" class="num_input">
									<input type="text" id="quantity_<?php echo $__Context->item_info->item_srl ?>" class="quantity" value="1" />
									<span class="iconUp" data-for="quantity_<?php echo $__Context->item_info->item_srl ?>"></span><span class="iconDown" data-for="quantity_<?php echo $__Context->item_info->item_srl ?>"></span>
								</div>
							</td>
						</tr><?php } ?>
						<?php if(count($__Context->options)){ ?><tr>
							<th><?php echo $__Context->lang->order_options ?></th>
							<td>
								<select id="select_options">
									<option value=""><?php echo $__Context->lang->cmd_select ?></option>
									<?php if($__Context->options&&count($__Context->options))foreach($__Context->options as $__Context->key=>$__Context->val){ ?><option value="<?php echo $__Context->val->option_srl ?>" data-title="<?php echo $__Context->val->title ?>" data-price="<?php echo $__Context->val->price ?>"><?php echo $__Context->val->title ?> <?php if($__Context->val->price > 0){ ?><span>+</span><?php };
if($__Context->val->price != 0){ ?><span><?php echo nproductItem::formatMoney($__Context->val->price) ?></span><?php } ?></option><?php } ?>
								</select>
								<div>
									<table id="selected_options"></table>
								</div>
								<div id="total_amount">
								</div>
							</td>
						</tr><?php } ?>
						<?php if(is_array($__Context->item_info->related_items) && count($__Context->item_info->related_items)){ ?><tr>
							<th>관련상품</th>
							<td>
								<?php if($__Context->item_info->related_items&&count($__Context->item_info->related_items))foreach($__Context->item_info->related_items as $__Context->key=>$__Context->val){ ?><ul class="related_items">
									<li><input type="checkbox" name="related_item" value="<?php echo $__Context->val->item_srl ?>" data-price="<?php echo $__Context->val->getDiscountedPrice() ?>" checked="checked"></li>
									<li><a href="<?php echo getUrl('','document_srl',$__Context->val->document_srl) ?>"><?php echo $__Context->val->item_name ?></a></li>
									<li class="p_orange"><?php echo $__Context->val->printDiscountedPrice() ?></li>
								</ul><?php } ?>
							</td>
						</tr><?php } ?>
						<tr>
							<th class="tprice_title">합계</th>
							<td class="total_price" colspan="3"><span id="related_sum"></span></td>
						</tr>
					</table>
					<div class="btn_item">
						<a href="#" class="btn_buynow" onclick="orderItemsInDetailPage(<?php echo $__Context->item_info->item_srl ?>, '<?php echo $__Context->module_info->ncart_mid ?>'); return false;"><span>바로구매</span></a>
						<a href="#" class="btn_cart" onclick="addItemsToCartInDetailPage(<?php echo $__Context->item_info->item_srl ?>); return false;"><span>장바구니</span></a>
						<a href="#" class="btn_apply" onclick="addItemsToFavorites(<?php echo $__Context->item_info->item_srl ?>);"><span>찜하기</span></a>
						<?php if(0){ ?><a href="<?php echo getUrl('act','procNstore_digitalFreebieDownload','item_srl',$__Context->item_info->item_srl) ?>" class="btn_freedown"><span>다운로드</span></a><?php } ?>
						<a href="<?php echo getUrl('act','','item_srl','','document_srl','') ?>" class="btn_list"><span>목록보기</span></a>
					</div>
				</div><!-- product info -->
			</td>
			<?php if(0){ ?><td style="vertical-align:top;">
				<div class="info-add" style="float:right;">
					<div class="add_area">
						<div class="title_eval">구매자 상품평</div>
						<div class="latest_eval">
							<ul>
								<?php $__Context->cnt=0 ?>
								<?php if($__Context->review_list&&count($__Context->review_list))foreach($__Context->review_list as $__Context->key=>$__Context->review){;
if($__Context->cnt < 5){ ?><li>
									<a href="#review_<?php echo $__Context->review->get('review_srl') ?>"><?php echo $__Context->review->getContentText(20) ?></a>
									<?php $__Context->cnt++ ?>
								</li><?php }} ?>
								<?php if($__Context->cnt==0){ ?><li><a href="#content_02">첫번째 상품평을 남겨보세요</a></li><?php } ?> 
							</ul>
						</div>
					</div>
					<div class="add_area">
						<div class="title_eval"><?php echo $__Context->lang->qna ?></div>
						<div class="latest_eval">
							<?php if($__Context->oDocument->getCommentCount()){ ?><ul>
								<?php $__Context->cnt=0 ?>
								<?php if($__Context->oDocument->getComments()&&count($__Context->oDocument->getComments()))foreach($__Context->oDocument->getComments() as $__Context->key=>$__Context->comment){;
if($__Context->cnt < 5 && $__Context->comment->get('depth')==0){ ?><li>
									
									<a href="#comment_<?php echo $__Context->comment->get('comment_srl') ?>"><?php echo $__Context->comment->getContentText(20) ?></a>
									<?php $__Context->cnt++ ?>
								</li><?php }} ?>
							</ul><?php } ?>
							<?php if(!$__Context->oDocument->getCommentCount()){ ?><ul>
								<li><a href="#content_03">상품문의 남기기</a></li> 
							</ul><?php } ?>
						</div>
					</div>
					<div class="ad_area"><a href="#">
						<img class="zbxe_widget_output" widget="vanner" skin="default" colorset="default" order_target="list_order" order_type="desc" thumbnail_type="crop" link_extra_idx="1" thumbnail_width="200" thumbnail_height="60" link_new_window="N" module_srls="5041" />
					</div>
				</div><!-- add area -->
			</td><?php } ?>
		</tr>
	</table>
    <!-- product detail -->
	<div class="item-info" id="content_01">
		<div class="product_title">
			<ul>
				<li><a href="#content_01" class="scroll on"><?php echo $__Context->lang->description ?></a></li>
				<li><a href="#content_02" class="scroll"><?php echo $__Context->lang->reviews ?></a></li>
				<li><a href="#content_03" class="scroll"><?php echo $__Context->lang->qna ?></a></li>
				<li><a href="#content_04" class="scroll"><?php echo $__Context->lang->cancel_refund ?></a></li>
			</ul>
		</div>
		<div class="product_info"><?php echo $__Context->oDocument->getContent(false) ?></div>
	</div>
	<div class="item-review" id="content_02">
		<div class="product_title">
			<ul>
				<li><a href="#content_01" class="scroll first"><?php echo $__Context->lang->description ?></a></li>
				<li><a href="#content_02" class="scroll on"><?php echo $__Context->lang->reviews ?></a></li>
				<li><a href="#content_03" class="scroll"><?php echo $__Context->lang->qna ?></a></li>
				<li><a href="#content_04" class="scroll"><?php echo $__Context->lang->cancel_refund ?></a></li>
			</ul>
		</div>
		<ul class="comments">
			<?php if($__Context->review_list&&count($__Context->review_list))foreach($__Context->review_list as $__Context->key=>$__Context->review){ ?><li id="review_<?php echo $__Context->review->get('review_srl') ?>">
				
				<div class="authorBox">
					<a href="#" onclick="return false;" class="member_<?php echo $__Context->review->get('member_srl') ?>"><?php echo $__Context->review->getNickName() ?></a><br />
					<span class="date"><?php echo $__Context->review->getRegdate("Y.m.d") ?></span>					
					<span class="estimate">
						<?php for($__Context->i=0;$__Context->i<5;$__Context->i++){;
if($__Context->i<$__Context->review->get('voted_count')){ ?><img src="/modules/nproduct/skins/default/img/starOn.gif" alt="" /><?php }else{ ?><img src="/modules/nproduct/skins/default/img/starOff.gif" alt="" /><?php };
} ?>
					</span>		
				</div>
				<div class="contentBox">
					<?php echo $__Context->review->getContent(false) ?>
				</div>
				<div class="nullBox"></div>
				<div class="btnBox">
					<?php if($__Context->review->isGranted()){ ?>
					<a href="<?php echo getUrl('act','procNproductDeleteReview','item_srl',$__Context->item_info->item_srl,'review_srl',$__Context->review->review_srl) ?>" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) {return true;} else {return false;}" class="deleteBtn button small"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
					<?php } ?>
				</div>
			</li><?php } ?>
		</ul>
		<?php if(!count($__Context->review_list)){ ?><ul class="comments">
			<li><?php echo $__Context->lang->msg_no_reviews ?></li>
		</ul><?php } ?>
		<?php if($__Context->is_logged){ ?>
		<form action="./" method="post" onsubmit="return procFilter(this, insert_review)" class="commentForm" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="item_srl" value="<?php echo $__Context->item_srl ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->item_info->document_srl ?>" />
		<input type="hidden" name="star_point" value="" />
		<div class="light_bx">
			<div class="light_bx_wrp">
				<table width="100%" cellspacing="0" cellpadding="0" class="view_type1">
				<tr>
					<td class="star_td">
						<ul class="starPoint">
							<li><a href="#" onclick="return false;" rel="1">1</a></li>
							<li><a href="#" onclick="return false;" rel="2">2</a></li>
							<li><a href="#" onclick="return false;" rel="3">3</a></li>
							<li><a href="#" onclick="return false;" rel="4">4</a></li>
							<li><a href="#" onclick="return false;" rel="5">5</a></li>
						</ul>
					</td>
					<td class="advence_td">
						<?php if($__Context->config->review_bonus){ ?><span><?php echo sprintf($__Context->lang->about_review_bonus,nproductItem::formatMoney($__Context->config->review_bonus)) ?></span><?php } ?>
                                                <?php if(!$__Context->config->review_bonus){ ?><span><?php echo $__Context->lang->about_review ?></span><?php } ?>
					</td>
				</tr>
				<tr>
					<td class="center" colspan="2"><textarea name="content" class="commentArea"></textarea></td>
				</tr>
				<tr>
					<td class="center" colspan="2">
						<span class="kso_btn green"><input type="submit" value="<?php echo $__Context->lang->cmd_write_review ?>" accesskey="s" /></span>
					</td>
				</tr>
				</table>
			</div>
		</div>
		</form>
		<?php } ?>
	</div>
	<div class="item-inquiry"  id="content_03">
		<div class="product_title">
			<ul>
				<li><a href="#content_01" class="scroll first"><?php echo $__Context->lang->description ?></a></li>
				<li><a href="#content_02" class="scroll"><?php echo $__Context->lang->reviews ?></a></li>
				<li><a href="#content_03" class="scroll on"><?php echo $__Context->lang->qna ?></a></li>
				<li><a href="#content_04" class="scroll"><?php echo $__Context->lang->cancel_refund ?></a></li>
			</ul>
		</div>
		<?php if($__Context->oDocument->getCommentCount()){ ?><ul class="comments">
			<?php if($__Context->oDocument->getComments()&&count($__Context->oDocument->getComments()))foreach($__Context->oDocument->getComments() as $__Context->key=>$__Context->comment){ ?><li id="comment_<?php echo $__Context->comment->get('comment_srl') ?>">
				<div class="indent" <?php if($__Context->comment->get('depth')){ ?> style="margin-left:<?php echo ($__Context->comment->get('depth'))*15 ?>px" <?php } ?>>
				
				<div class="authorBox">
					<a href="#" onclick="return false;" class="member_<?php echo $__Context->comment->get('member_srl') ?>"><?php echo $__Context->comment->getNickName() ?></a>
					<span class="date"><?php echo $__Context->comment->getRegdate("Y.m.d") ?></span>
				</div>
				<div class="contentBox">
					<?php echo $__Context->comment->getContent() ?>
				</div>
				<div class="nullBox"></div>
				<div class="btnBox">
					<?php if($__Context->comment->isGranted()){ ?>
					<a href="<?php echo getUrl('act','dispNproductReplyComment','comment_srl',$__Context->comment->comment_srl) ?>" class="button small"><span><?php echo $__Context->lang->cmd_reply ?></span></a> 
					<a href="<?php echo getUrl('act','procNproductDeleteComment','item_srl',$__Context->item_info->item_srl,'comment_srl',$__Context->comment->comment_srl) ?>" onclick="if(confirm('<?php echo $__Context->lang->confirm_delete ?>')) {return true;} else {return false;}" class="deleteBtn button small"><span><?php echo $__Context->lang->cmd_delete ?></span></a>
					<?php } ?>
				</div>
			</li><?php } ?>
		</ul><?php } ?><!-- Question comment -->
		<?php if(!$__Context->oDocument->getCommentCount()){ ?><ul class="comments">
			<li><?php echo $__Context->lang->msg_no_questions ?></li>
		</ul><?php } ?>
		<?php if($__Context->is_logged){ ?>
		<form action="./" method="post" onsubmit="return procFilter(this, insert_comment)" class="commentForm" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
		<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
		<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
		<input type="hidden" name="item_srl" value="<?php echo $__Context->item_srl ?>" />
		<input type="hidden" name="document_srl" value="<?php echo $__Context->item_info->document_srl ?>" />
		<div class="light_bx">
			<div class="light_bx_wrp">
				<table width="100%" cellspacing="0" cellpadding="0" class="view_type1">
				<tr>
					<td class="advence_td">
						<span><?php echo $__Context->lang->about_qna ?></span><?php if(0){ ?><span style="float:right;">자주하는 질문 보러가기</span><?php } ?>
					</td>
				</tr>
				<tr>
					<td class="center"><textarea name="content" class="commentArea"></textarea></td>
				</tr>
				<tr>
					<td class="center">
						<span class="kso_btn green"><input type="submit" value="<?php echo $__Context->lang->cmd_ask_question ?>" accesskey="s" /></span>
					</td>
				</tr>
				</table>
			</div>
		</div>
		</form><!-- Question form -->
		<?php } ?>
	</div>
	<div class="delivery-info"  id="content_04">
		<div class="product_title">
			<ul>
				<li><a href="#content_01" class="scroll first"><?php echo $__Context->lang->description ?></a></li>
				<li><a href="#content_02" class="scroll"><?php echo $__Context->lang->reviews ?></a></li>
				<li><a href="#content_03" class="scroll"><?php echo $__Context->lang->qna ?></a></li>
				<li><a href="#content_04" class="scroll on"><?php echo $__Context->lang->cancel_refund ?></a></li>
			</ul>
		</div>
		<?php if($__Context->module_info->display_caution=='Y'){ ?><div>
			<?php echo $__Context->module_info->delivery_info ?>
		</div><?php } ?>
		<?php if($__Context->module_info->display_caution=='N'){ ?><div>
			<?php echo $__Context->item_info->delivery_info ?>
		</div><?php } ?>
	</div>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/nproduct/skins/default','footer.html') ?>

<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/board_extend/tpl/css/buttonset.css--><?php $__tmp=array('modules/board_extend/tpl/css/buttonset.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/board_extend/tpl/js/modify_document.js--><?php $__tmp=array('modules/board_extend/tpl/js/modify_document.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/board_extend/tpl','header.html') ?>
<h4>순서변경 기능은, 문서출력 순서설정이 "문서번호" "내림차순"인경우에만 동작하고, 다른페이지의 문서와 위치가 변경될 수 없습니다..</h4>
<p>DB에 접근하지않고서 수정이 불가능한 부분을 반영할 수 있도록 도와줍니다.</p>
<table border="0" cellspacing="0" summary="" class="rowTable">
	<caption>한번에 볼 문서갯수 : <input type="text" name="list_count" value="<?php echo $__Context->list_count ?>" /> <input type="button" value="적용" onclick="document.location.href = current_url.setQuery('list_count',jQuery(this).prev().val());" /></caption>
    <thead>
    <tr>
    <th>번호</th><th>제목</th><th>조회수</th><th>추천수</th><th>작성일 (yyyymmddhhiiss)</th><th>수정일 (yyyymmddhhiiss)</th><th>순서번호</th><th>반영</th>
	</tr>
    </thead>
    <tbody>
    
    <?php if(!$__Context->document_list){ ?>
    <tr class="bg0 tCenter">
        <td colspan="9" class="title">
            게시글이 없습니다.
        </td>
    </tr>
    <?php }else{ ?>
		<?php $__Context->first=true ?>
        
        <?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->no=>$__Context->document){ ?><tr class="bg<?php echo ($__Context->no+1)%2+1 ?>" <?php if($__Context->document_srl == $__Context->document->document_srl){ ?>style="background-color:#ddd;"<?php } ?>>
			<td class="num"><?php if($__Context->document_srl == $__Context->document->document_srl){ ?><img src="/modules/board_extend/tpl/images/common/iconArrowD8.gif" border="0" alt="" /><?php }else{;
echo $__Context->no;
} ?></td>
			<td class="title">
				<?php if($__Context->grant->manager){ ?>
					<?php if($__Context->no!=1){ ?>
					<a href="#" onclick="moveDocument('<?php echo $__Context->document->document_srl ?>','down','<?php echo $__Context->no ?>'); return false;" class="buttonSet buttonDown"><span>아래로</span></a>
					<?php } ?>
					<?php if($__Context->first==false){ ?>
						<a href="#" onclick="moveDocument('<?php echo $__Context->document->document_srl ?>','up','<?php echo $__Context->no ?>'); return false;" class="buttonSet buttonUp"><span>위로</span></a>
					<?php }else{ ?>
						<?php  $__Context->first=false ?>
					<?php } ?>
				<?php } ?>
				<a href="<?php echo getUrl('document_srl',$__Context->document->document_srl, 'listStyle', $__Context->listStyle, 'cpage','') ?>"><?php echo $__Context->document->getTitle($__Context->module_info->subject_cut_size) ?></a><?php echo $__Context->document->printExtraImages(60*60*$__Context->module_info->duration_new) ?>
			</td>
			<td class="reading"><input type="text" style="width:50px;" class="readed_count_<?php echo $__Context->document->document_srl ?>" value="<?php echo $__Context->document->get('readed_count') ?>" /></td>
			<td class="recommend"><input type="text" style="width:50px;" class="voted_count_<?php echo $__Context->document->document_srl ?>" value="<?php echo $__Context->document->get('voted_count') ?>" /></td>
			<td class="date"><input type="text" style="width:120px;" class="regdate_<?php echo $__Context->document->document_srl ?>" value="<?php echo $__Context->document->get('regdate') ?>" /></td>
			<td class="date"><input type="text" style="width:120px;" class="last_update_<?php echo $__Context->document->document_srl ?>" value="<?php echo $__Context->document->get('last_update') ?>" /></td>
			<td><input type="text" style="width:80px;" class="list_order_<?php echo $__Context->document->document_srl ?>" list_order="<?php echo $__Context->document->get('list_order') ?>" id="<?php echo $__Context->no ?>_order" value="<?php echo $__Context->document->get('list_order') ?>" /></td>
			<td><span class="btn"><input type="button" onclick="applyModify('<?php echo $__Context->document->document_srl ?>')" value="수정반영" /></span></td>
        </tr><?php } ?>
    <?php } ?>
    </tbody>
    </table>
	
<div class="pagination a1">
	<a href="<?php echo getUrl('page','','document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
	<?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
		<?php if($__Context->page == $__Context->page_no){ ?>
			<strong><?php echo $__Context->page_no ?></strong> 
		<?php }else{ ?>
			<a href="<?php echo getUrl('page',$__Context->page_no,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>"><?php echo $__Context->page_no ?></a>
		<?php } ?>
	<?php } ?>
	<a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'document_srl','','division',$__Context->division,'last_division',$__Context->last_division,'entry','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
</div>
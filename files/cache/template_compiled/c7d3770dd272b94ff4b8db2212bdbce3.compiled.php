<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/mobileex/tpl','header.html') ?>
<form action="./" method="get" class="adminSearch"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="act" value="dispMobileexAdminModuleList" />
        <fieldset>
			<?php echo $__Context->lang->mid ?> <input type="text" name="s_mid" value="<?php echo $__Context->s_mid ?>" class="inputTypeText" />
			<?php echo $__Context->lang->browser_title ?> <input type="text" name="s_browser_title" value="<?php echo $__Context->s_browser_title ?>" class="inputTypeText" />
            <span class="button blue"><input type="submit" value="<?php echo $__Context->lang->cmd_search ?>" /></span>
            <a href="<?php echo getUrl('s_mid','','s_browser_title','','page','') ?>" class="button black"><span><?php echo $__Context->lang->cmd_cancel ?></span></a>
        </fieldset>
</form>
<!-- 정보 -->
<div class="summary">
    <strong>Total</strong> <em><?php echo number_format($__Context->total_count) ?></em>, Page <strong><?php echo number_format($__Context->page) ?></strong>/<?php echo number_format($__Context->total_page) ?>
</div>
<!-- 목록 -->
<form action="./" method="get" onsubmit="return doChangeCategory(this);" id="fo_list"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
<table cellspacing="0" class="rowTable">
<thead>
    <tr>
        <th scope="col"><div><?php echo $__Context->lang->no ?></div></th>
        <th scope="col">
            <div>
                <input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
                <input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
                <select name="module_category_srl">
                    <option value=""><?php echo $__Context->lang->module_category ?></option>
                    <option value="0" <?php if($__Context->module_category_srl==="0"){ ?>selected="selected"<?php } ?>><?php echo $__Context->lang->not_exists ?></option>
                    <?php if($__Context->module_category&&count($__Context->module_category))foreach($__Context->module_category as $__Context->key => $__Context->val){ ?>
                    <option value="<?php echo $__Context->key ?>" <?php if($__Context->module_category_srl==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                    <?php } ?>
                    <option value="">---------</option>
                    <option value="-1"><?php echo $__Context->lang->cmd_management ?></option>
                </select>
                <input type="submit" name="go_button" id="go_button" value="GO" class="buttonTypeGo" />
            </div>
        </th>
        <th scope="col" class="half_wide"><div><?php echo $__Context->lang->mid ?></div></th>
        <th scope="col" class="half_wide"><div><?php echo $__Context->lang->browser_title ?></div></th>
        <th scope="col" colspan="3"><div>&nbsp;</div></th>
    </tr>
</thead>
<tbody>
    <?php if($__Context->board_list&&count($__Context->board_list))foreach($__Context->board_list as $__Context->no => $__Context->val){ ?>
    <tr>
        <td class="center number"><?php echo $__Context->no ?></td>
        <td>
            <?php if(!$__Context->val->module_category_srl){ ?>
                <?php if($__Context->val->site_srl){ ?>
                <?php echo $__Context->lang->virtual_site ?>
                <?php }else{ ?>
                <?php echo $__Context->lang->not_exists ?>
                <?php } ?>
            <?php }else{ ?>
                <?php echo $__Context->module_category[$__Context->val->module_category_srl]->title ?>
            <?php } ?>
        </td>
        <td><?php echo $__Context->val->mid ?></td>
        <td><a href="<?php echo getSiteUrl($__Context->val->domain,'','mid',$__Context->val->mid,'m',1) ?>" onclick="window.open(this.href); return false;"><?php echo $__Context->val->browser_title ?></a></td>
        <td style="width:100px"><a href="<?php echo getUrl('act','dispMobileexAdminEachConfig','module_srl',$__Context->val->module_srl) ?>" title="<?php echo $__Context->lang->cmd_setup ?>"><span><?php echo $__Context->lang->cmd_each_config ?>(<?php if($__Context->val->exist_each_config){ ?><em style="color:#4390F9;font-style:normal;font-size:11px">사용</em><?php }else{ ?><em style="color:#A6332A;font-style:normal;font-size:11px">미사용</em><?php } ?>)</span></a></td>
        <td style="width:150px"><a href="<?php echo getUrl('act','dispMobileexAdminMobileSkinInfo','module_srl',$__Context->val->module_srl) ?>" title="<?php echo $__Context->lang->cmd_copy ?>"><span>모바일스킨설정(<?php if($__Context->val->exist_mskin_config){ ?><em style="color:#4390F9;font-style:normal;font-size:11px">사용</em><?php }else{ ?><em style="color:#A6332A;font-style:normal;font-size:11px">미사용</em><?php } ?>)</span></a></td>
        <td style="width:100px"><?php if($__Context->val->exist_each_config || $__Context->val->exist_mskin_config){ ?><a href="<?php echo getUrl('act','dispMobileexAdminModuleDelete','module_srl', $__Context->val->module_srl) ?>" title="<?php echo $__Context->lang->cmd_delete ?>"><span style="font-weight:bold"><?php echo $__Context->lang->cmd_each_config ?> <?php echo $__Context->lang->cmd_delete ?></span></a><?php }else{ ?><em style="color:#A6332A;font-style:normal;font-size:11px">설정없음</em><?php } ?></td>
    </tr>
    <?php } ?>
</tbody>
</table>
</form>
<!-- 페이지 네비게이션 -->
<div class="pagination a1">
    <a href="<?php echo getUrl('page','','module_srl','') ?>" class="prevEnd"><?php echo $__Context->lang->first_page ?></a> 
    <?php while($__Context->page_no = $__Context->page_navigation->getNextPage()){ ?>
        <?php if($__Context->page == $__Context->page_no){ ?>
            <strong><?php echo $__Context->page_no ?></strong> 
        <?php }else{ ?>
            <a href="<?php echo getUrl('page',$__Context->page_no,'module_srl','') ?>"><?php echo $__Context->page_no ?></a> 
        <?php } ?>
    <?php } ?>
    <a href="<?php echo getUrl('page',$__Context->page_navigation->last_page,'module_srl','') ?>" class="nextEnd"><?php echo $__Context->lang->last_page ?></a>
</div>

<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/aroundmap/tpl/css/aroundmap.css--><?php $__tmp=array('modules/aroundmap/tpl/css/aroundmap.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/aroundmap/tpl/js/aroundmap.js--><?php $__tmp=array('modules/aroundmap/tpl/js/aroundmap.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php require_once('./classes/xml/XmlJsFilter.class.php');$__xmlFilter=new XmlJsFilter('modules/aroundmap/tpl/filter','set_api_key.xml');$__xmlFilter->compile(); ?>
<h3 class="xeAdmin"><?php echo $__Context->lang->aroundmap ?> <span class="gray"><?php echo $__Context->lang->cmd_management ?></span></h3>
<p class="summary"><?php echo $__Context->lang->about_aroundmap ?></p>
<form action="./" method="get" onsubmit="return procFilter(this, set_api_key);"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <input type="hidden" name="year" value="<?php echo $__Context->year ?>" />
    <table cellspacing="0" class="rowTable">
    <tr>
        <th scope="row" width=200><div><?php echo $__Context->lang->naver_api_key ?></div></th>
        <td>
            <input type="text" id="naver_api_key" name="naver_api_key" value="<?php echo $__Context->naver_api_key ?>" size="40" />
            <p><?php echo $__Context->lang->about_naver_api_key ?></p>
        </td>
    </tr>
    <tr>
        <th scope="row"><div><?php echo $__Context->lang->yahoo_api_key ?></div></th>
        <td>
            <input type="text" id="yahoo_api_key" name="yahoo_api_key" value="<?php echo $__Context->yahoo_api_key ?>" size="40" />
            <p><?php echo $__Context->lang->about_yahoo_api_key ?></p>
        </td>
    </tr>
    <tr>
        <th scope="row"><div><?php echo $__Context->lang->apply_module ?></div></th>
        <td>
            <select name="_apply_module" id="_apply_module" size="10" class="applyModuleList">
                <?php $__Context->apply_module_srls = array() ?>
                <?php if($__Context->apply_module&&count($__Context->apply_module))foreach($__Context->apply_module as $__Context->v){ ?>
                <?php $__Context->apply_module_srls[] = $__Context->v->module_srl ?>
                <option value="<?php echo $__Context->v->module_srl ?>"><?php echo $__Context->v->browser_title ?> (<?php echo $__Context->v->mid ?>)</option>
                <?php } ?>
            </select>
            <ul class="midCommand">
                <li><a href="<?php echo getUrl('','module','module','act','dispModuleSelectList','id','apply_module') ?>" onclick="popopen(this.href, 'ModuleSelect');return false;" class="button blue"><span><?php echo $__Context->lang->cmd_insert ?></span></a></li>
                <li><a href="#" onclick="removeApplyModule('apply_module');return false;" class="button red"><span><?php echo $__Context->lang->cmd_delete ?></span></a></li>
            </ul>
            <p><?php echo $__Context->lang->about_apply_module ?></p>
            <input type="hidden" name="apply_module" id="apply_module" value="<?php echo implode(',',$__Context->apply_module_srls) ?>" />
        </td>
    </tr>
    
    </table>
    
 <h4 class="xeAdmin"><?php echo $__Context->lang->set_for_sphinx ?></h4>
 <p class="summary"><?php echo nl2br($__Context->lang->about_config_share) ?></p>
 
    <table cellspacing="0" class="rowTable">
    <tr>
        <th scope="row" width=200><div><?php echo $__Context->lang->serverName ?></div></th>
        <td>
            <input type="text" name="servername" value="<?php echo $__Context->serverName ?>" />
        </td>
    </tr>
    <tr>
        <th scope="row"><div><?php echo $__Context->lang->serverPort ?></div></th>
        <td>
            <input type="text" name="serverport" value="<?php echo $__Context->serverPort ?>" />
        </td>
    </tr>    
    <tr>
        <th scope="row"><div><?php echo $__Context->lang->useSphinx ?></div></th>
        <td>
            <input type="checkbox" name="usesphinx" value="true" <?php if($__Context->useSphinx=="true"){ ?>checked<?php } ?>>  <?php echo $__Context->lang->useSphinx ?></input>
     
        </td>
    </tr>
    <tr class="row">
        <th class="button" colspan="3">
            <span class="button black strong"><input type="submit" value="<?php echo $__Context->lang->cmd_apply ?>" accesskey="s" /></span>
        </th>
    </tr>
    </table>
</form>
<?php if(!defined("__XE__"))exit;?><header class="clearfix list-header">
	
	<div class="search-area">
		<form action="<?php echo getUrl() ?>" method="get"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
			<input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
			<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
			<input type="hidden" name="category" value="<?php echo $__Context->category ?>" />
			<span class="btBasic">
				<select name="search_target">
					<?php if($__Context->search_option&&count($__Context->search_option))foreach($__Context->search_option as $__Context->key => $__Context->val){ ?>
					<option value="<?php echo $__Context->key ?>" <?php if($__Context->search_target==$__Context->key){ ?>selected="selected"<?php } ?>><?php echo $__Context->val ?></option>
					<?php } ?>
				</select>
			</span>
			<input type="search" name="search_keyword" value="<?php echo htmlspecialchars($__Context->search_keyword) ?>" title="<?php echo $__Context->lang->cmd_search ?>" class="btBasic" />
			<button type="submit" class="search-button btBasic"><?php echo $__Context->lang->cmd_search ?></button>
		</form>
	</div>
</header>
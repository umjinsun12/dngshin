<?php if(!defined("__XE__"))exit;
if(!Mobile::isMobileCheckByAgent()){ ?><div class="rd_nav img_tx to_sns fl">
	<a class="facebook <?php echo $__Context->mi->to_sns_small ?>" href="http://facebook.com/" title="To Facebook"><i class="ico_16px facebook"></i><strong> Facebook</strong></a>
	<a class="twitter <?php echo $__Context->mi->to_sns_small ?>" href="http://twitter.com/" title="To Twitter"><i class="ico_16px twitter"></i><strong> Twitter</strong></a>
	<a class="me2day <?php echo $__Context->mi->to_sns_small ?>" href="http://me2day.net/" title="To Me2day"><i class="ico_16px me2day"></i><strong> Me2day</strong></a>
	<a class="yozm <?php echo $__Context->mi->to_sns_small ?>" href="http://yozm.daum.net/" title="To Yozm"><i class="ico_16px yozm"></i><strong> Yozm</strong></a>
</div><?php } ?>
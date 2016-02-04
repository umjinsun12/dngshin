<?php if(!defined("__XE__"))exit;
echo '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/">
	<channel>
		<title><![CDATA[<?php echo $__Context->info->title ?>]]></title>
		<link><?php echo $__Context->info->link ?></link>
		<description><![CDATA[<?php echo $__Context->info->description ?>]]></description>
		<language><?php echo $__Context->info->language ?></language>
		<pubDate><?php echo $__Context->info->date ?></pubDate>
		<lastBuildDate><?php echo $__Context->info->date ?></lastBuildDate>
		<generator>XpressEngine</generator>
		<?php if($__Context->info->feed_copyright){ ?>
		<copyright><![CDATA[<?php echo $__Context->info->feed_copyright ?>]]></copyright>
		<?php } ?>
		<?php if($__Context->info->image){ ?>
		<image>
			<url><?php echo $__Context->info->image ?></url>
			<title><![CDATA[<?php echo $__Context->info->title ?>]]></title>
			<link><?php echo $__Context->info->link ?></link>
		</image>
		<?php } ?>
		<?php if($__Context->document_list&&count($__Context->document_list))foreach($__Context->document_list as $__Context->oDocument){ ?>
		<item>
			<title><![CDATA[<?php echo str_replace('\'', '&apos;',htmlspecialchars($__Context->oDocument->getTitleText(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false)) ?>]]></title>
			<dc:creator><![CDATA[<?php echo str_replace('\'', '&apos;',$__Context->oDocument->getNickName()) ?>]]></dc:creator>
			<link><?php echo $__Context->oDocument->getPermanentUrl() ?></link>
			<guid isPermaLink="true"><?php echo $__Context->oDocument->getPermanentUrl() ?></guid>
			<?php if($__Context->oDocument->allowComment()) { ?>
			<comments><?php echo $__Context->oDocument->getPermanentUrl() ?>#comment</comments>
			<?php } ?>
			<?php if($__Context->open_rss_config[$__Context->oDocument->get('module_srl')]=='Y'){ ?>
			<description><![CDATA[<?php echo $__Context->oDocument->getTransContent(false,false,true) ?>]]></description>
			<?php }else{ ?>
			<description><![CDATA[<?php echo $__Context->oDocument->getContentText(100) ?>]]></description>
			<?php } ?>
			<pubDate><?php echo $__Context->oDocument->getRegdateGM() ?></pubDate>
			<?php if($__Context->oDocument->get('tag_list')&&count($__Context->oDocument->get('tag_list')))foreach($__Context->oDocument->get('tag_list') as $__Context->tag){ ?>
			<category><![CDATA[<?php echo str_replace('\'', '&apos;', htmlspecialchars($__Context->tag, ENT_COMPAT | ENT_HTML401, 'UTF-8', false)) ?>]]></category>
			<?php } ?>
			<?php if($__Context->oDocument->getCommentcount()>0){ ?>
			<slash:comments><?php echo $__Context->oDocument->getCommentcount() ?></slash:comments>
			<?php } ?>
		</item>
		<?php } ?>
	</channel>
</rss>

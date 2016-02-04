<?php
/**
 * @class content
 * @author NHN (developers@xpressengine.com)
 * @brief widget to display content
 * @version 0.1
 */
class flatContent extends WidgetHandler
{
	/**
	 * @brief Widget handler
	 *
	 * Get extra_vars declared in ./widgets/widget/conf/info.xml as arguments
	 * After generating the result, do not print but return it.
	 */

	function proc($args)
	{
		// Targets to sort
		if(!in_array($args->order_target, array('regdate','update_order','voted_count','readed_count', 'list_order'))) $args->order_target = 'regdate';
		// Sort order
		if(!in_array($args->order_type, array('asc','desc'))) $args->order_type = 'asc';
		// Pages
		$args->page_count = (int)$args->page_count;
		if(!$args->page_count) $args->page_count = 1;
		// The number of displayed lists
		$args->list_count = (int)$args->list_count;
		if(!$args->list_count) $args->list_count = 3;
		// The number of thumbnail columns
		$args->cols_list_count = (int)$args->cols_list_count;
		if(!$args->cols_list_count) $args->cols_list_count = 3;
		// Cut the length of the title
		if(!$args->subject_cut_size) $args->subject_cut_size = 0;
		// Cut the length of contents
		if(!$args->content_cut_size) $args->content_cut_size = 64;
		// Display time of the latest post
		if(!$args->duration_new) $args->duration_new = 12;
		// How to create thumbnails
		if(!$args->thumbnail_type) $args->thumbnail_type = 'crop';
		// Horizontal size of thumbnails
		if(!$args->thumbnail_width) $args->thumbnail_width = 380;
		// Vertical size of thumbnails
		if(!$args->thumbnail_height) $args->thumbnail_height = 250;
		// Viewing options
		$args->option_view_arr = explode(',',$args->option_view);
		// markup options
		// Set variables used internally
		$oModuleModel = &getModel('module');
		$module_srls = $args->modules_info = $args->module_srls_info = $args->mid_lists = array();
		$site_module_info = Context::get('site_module_info');
		// List URLs if a type is RSS
		if($args->content_type == 'rss')
		{
			$args->rss_urls = array();
			$rss_urls = array_unique(array($args->rss_url0,$args->rss_url1,$args->rss_url2,$args->rss_url3,$args->rss_url4));
			for($i=0,$c=count($rss_urls);$i<$c;$i++)
			{
				if($rss_urls[$i]) $args->rss_urls[] = $rss_urls[$i];
			}
			// Get module information after listing module_srls if the module is not RSS
		}
		else
		{
			// Apply to all modules in the site if a target module is not specified
			if(!$args->module_srls)
			{
				$obj = new stdClass();
				$obj->site_srl = (int)$site_module_info->site_srl;
				$output = executeQueryArray('widgets.flatContent.getMids', $obj);
				if($output->data)
				{
					foreach($output->data as $key => $val)
					{
						$args->modules_info[$val->mid] = $val;
						$args->module_srls_info[$val->module_srl] = $val;
						$args->mid_lists[$val->module_srl] = $val->mid;
						$module_srls[] = $val->module_srl;
					}
				}

				$args->modules_info = $oModuleModel->getMidList($obj);
				// Apply to the module only if a target module is specified
			}
			else
			{
				$obj->module_srls = $args->module_srls;
				$output = executeQueryArray('widgets.flatContent.getMids', $obj);
				if($output->data)
				{
					foreach($output->data as $key => $val)
					{
						$args->modules_info[$val->mid] = $val;
						$args->module_srls_info[$val->module_srl] = $val;
						$module_srls[] = $val->module_srl;
					}
					$idx = explode(',',$args->module_srls);
					for($i=0,$c=count($idx);$i<$c;$i++)
					{
						$srl = $idx[$i];
						if(!$args->module_srls_info[$srl]) continue;
						$args->mid_lists[$srl] = $args->module_srls_info[$srl]->mid;
					}
				}
			}
			// Exit if no module is found
			if(!count($args->modules_info)) return Context::get('msg_not_founded');
			$args->module_srl = implode(',',$module_srls);
		}

		/**
		 * Method is separately made because content extraction, articles, comments, trackbacks, RSS and other elements exist
		 */
		// tab type
		if($args->tab_type == 'none' || $args->tab_type == '')
		{
			switch($args->content_type)
			{
				case 'comment':
					$content_items = $this->_getCommentItems($args);
					break;
				default:
					$content_items = $this->_getDocumentItems($args);
					break;
			}
			// If not a tab type
		}
		else
		{
			$content_items = array();

			switch($args->content_type)
			{
				case 'comment':
					foreach($args->mid_lists as $module_srl => $mid)
					{
						$args->module_srl = $module_srl;
						$content_items[$module_srl] = $this->_getCommentItems($args);
					}
					break;
				default:
					foreach($args->mid_lists as $module_srl => $mid)
					{
						$args->module_srl = $module_srl;
						$content_items[$module_srl] = $this->_getDocumentItems($args);
					}
					break;
			}
		}

		$output = $this->_compile($args,$content_items);
		return $output;
	}

	/**
	 * @brief Get a list of comments and return contentItem
	 */
	function _getCommentItems($args)
	{
		// List variables to use CommentModel::getCommentList()
		$obj->module_srl = $args->module_srl;
		$obj->sort_index = $args->order_target;
		$obj->list_count = $args->list_count * $args->page_count;
		// Get model object of the comment module and execute getCommentList() method
		$oCommentModel = &getModel('comment');
		$output = $oCommentModel->getNewestCommentList($obj);

		$content_items = array();

		if(!count($output)) return;

		foreach($output as $key => $oComment)
		{
			$attribute = $oComment->getObjectVars();
			$title = $oComment->getSummary($args->content_cut_size);
			$thumbnail = $oComment->getThumbnail($args->thumbnail_width,$args->thumbnail_height,$args->thumbnail_type);
			$url = sprintf("%s#comment_%s",getUrl('','document_srl',$oComment->get('document_srl')),$oComment->get('comment_srl'));

			$attribute->mid = $args->mid_lists[$attribute->module_srl];
			$browser_title = $args->module_srls_info[$attribute->module_srl]->browser_title;
			$domain = $args->module_srls_info[$attribute->module_srl]->domain;

			$content_item = new contentItem($browser_title);
			$content_item->adds($attribute);
			$content_item->setTitle($title);
			$content_item->setThumbnail($thumbnail);
			$content_item->setLink($url);
			$content_item->setDomain($domain);
			$content_item->add('mid', $args->mid_lists[$attribute->module_srl]);
			$content_items[] = $content_item;
		}
		return $content_items;
	}

	function _getDocumentItems($args)
	{
		// Get model object from the document module
		$oDocumentModel = &getModel('document');
		// Get categories
		$obj = new stdClass();
		$obj->module_srl = $args->module_srl;
		$output = executeQueryArray('widgets.flatContent.getCategories',$obj);
		if($output->toBool() && $output->data)
		{
			foreach($output->data as $key => $val)
			{
				$category_lists[$val->module_srl][$val->category_srl] = $val;
			}
		}
		// Get a list of documents
		$obj->module_srl = $args->module_srl;
		$obj->category_srl = $args->category_srl;
		$obj->sort_index = $args->order_target;
		if($args->order_target == 'list_order' || $args->order_target == 'update_order')
		{
			$obj->order_type = $args->order_type=="desc"?"asc":"desc";
		}
		else
		{
			$obj->order_type = $args->order_type=="desc"?"desc":"asc";
		}
		$obj->list_count = $args->list_count * $args->page_count;
		$obj->statusList = array('PUBLIC');
		if($args->regdate) $obj->regdate = date("Ymd", strtotime("-{$args->regdate} day"));
		$output = executeQueryArray('widgets.flatContent.getNewestDocuments', $obj);
		if(!$output->toBool() || !$output->data) return;
		// If the result exists, make each document as an object
		$content_items = array();
		$first_thumbnail_idx = -1;
		if(count($output->data))
		{
			foreach($output->data as $key => $attribute)
			{
				$oDocument = new documentItem();
				$oDocument->setAttribute($attribute, false);
				$GLOBALS['XE_DOCUMENT_LIST'][$oDocument->document_srl] = $oDocument;
				$document_srls[] = $oDocument->document_srl;
			}
			$oDocumentModel->setToAllDocumentExtraVars();

			for($i=0,$c=count($document_srls);$i<$c;$i++)
			{
				$oDocument = $GLOBALS['XE_DOCUMENT_LIST'][$document_srls[$i]];
				$document_srl = $oDocument->document_srl;
				$module_srl = $oDocument->get('module_srl');
				$category_srl = $oDocument->get('category_srl');
				$thumbnail = $oDocument->getThumbnail($args->thumbnail_width,$args->thumbnail_height,$args->thumbnail_type);

				$content_item = new contentItem( $args->module_srls_info[$module_srl]->browser_title );
				$content_item->adds($oDocument->getObjectVars());
				$content_item->add('original_content', $oDocument->get('content'));
				$content_item->setTitle($oDocument->getTitleText());
				$content_item->setCategory( $category_lists[$module_srl][$category_srl]->title );
				$content_item->setDomain( $args->module_srls_info[$module_srl]->domain );
				$content_item->setContent($oDocument->getSummary($args->content_cut_size));
				$content_item->setLink( getSiteUrl($domain,'','document_srl',$document_srl) );
				$content_item->setThumbnail($thumbnail);
				$content_item->setExtraImages($oDocument->printExtraImages($args->duration_new * 60 * 60));
				$content_item->add('mid', $args->mid_lists[$module_srl]);
				if($first_thumbnail_idx==-1 && $thumbnail) $first_thumbnail_idx = $i;
				$content_items[] = $content_item;
			}

			$content_items[0]->setFirstThumbnailIdx($first_thumbnail_idx);
		}

		$oSecurity = new Security($content_items);
		$oSecurity->encodeHTML('..variables.content', '..variables.user_name', '..variables.nick_name');

		return $content_items;
	}

	function _getSummary($content, $str_size = 50)
	{
		$content = preg_replace('!(<br[\s]*/{0,1}>[\s]*)+!is', ' ', $content);
		// Replace tags such as </p> , </div> , </li> and others to a whitespace
		$content = str_replace(array('</p>', '</div>', '</li>'), ' ', $content);
		// Remove Tag
		$content = preg_replace('!<([^>]*?)>!is','', $content);
		// Replace tags to <, >, " and whitespace
		$content = str_replace(array('&lt;','&gt;','&quot;','&nbsp;'), array('<','>','"',' '), $content);
		// Delete  a series of whitespaces
		$content = preg_replace('/ ( +)/is', ' ', $content);
		// Truncate string
		$content = trim(cut_str($content, $str_size, $tail));
		// Replace back <, >, " to the original tags
		$content = str_replace(array('<','>','"'),array('&lt;','&gt;','&quot;'), $content);
		// Fixed to a newline bug for consecutive sets of English letters
		$content = preg_replace('/([a-z0-9\+:\/\.\~,\|\!\@\#\$\%\^\&\*\(\)\_]){20}/is',"$0-",$content);
		return $content; 
	}

	/**
	 * @brief function to receive contents from rss url
	 * For Tistory blog in Korea, the original RSS url has location header without contents. Fixed to work as same as rss_reader widget.
	 */
	function _compile($args,$content_items)
	{
		$oTemplate = &TemplateHandler::getInstance();
		// Set variables for widget
		$widget_info = new stdClass();
		$widget_info->modules_info = $args->modules_info;
		$widget_info->option_view_arr = $args->option_view_arr;
		$widget_info->list_count = $args->list_count;
		$widget_info->page_count = $args->page_count;
		$widget_info->subject_cut_size = $args->subject_cut_size;
		$widget_info->content_cut_size = $args->content_cut_size;
		$widget_info->new_window = $args->new_window;

		$widget_info->duration_new = $args->duration_new * 60*60;
		$widget_info->thumbnail_type = $args->thumbnail_type;
		$widget_info->thumbnail_width = $args->thumbnail_width;
		$widget_info->thumbnail_height = $args->thumbnail_height;
		$widget_info->cols_list_count = $args->cols_list_count;
		$widget_info->mid_lists = $args->mid_lists;

		$widget_info->show_browser_title = $args->show_browser_title;
		$widget_info->show_category = $args->show_category;
		$widget_info->show_info = $args->show_info;
		$widget_info->show_comment_count = $args->show_comment_count;
		$widget_info->show_trackback_count = $args->show_trackback_count;
		$widget_info->show_icon = $args->show_icon;

		$widget_info->list_type = $args->list_type;
		$widget_info->tab_type = $args->tab_type;
		$widget_info->tab_title = $args->tab_title;
		$widget_info->tab_title_url = $args->tab_title_url;
		$widget_info->use_more = $args->use_more;
		

		$widget_info->markup_type = $args->markup_type;
		// If it is a tab type, list up tab items and change key value(module_srl) to index 
		if($args->tab_type != 'none' && $args->tab_type)
		{
			$tab = array();
			foreach($args->mid_lists as $module_srl => $mid)
			{
				if(!is_array($content_items[$module_srl]) || !count($content_items[$module_srl])) continue;

				unset($tab_item);
				$tab_item->title = $content_items[$module_srl][0]->getBrowserTitle();
				$tab_item->content_items = $content_items[$module_srl];
				$tab_item->domain = $content_items[$module_srl][0]->getDomain();
				$tab_item->url = $content_items[$module_srl][0]->getContentsLink();
				if(!$tab_item->url) $tab_item->url = getSiteUrl($tab_item->domain, '','mid',$mid);
				$tab[] = $tab_item;
			}
			$widget_info->tab = $tab;
		}
		else
		{
			$widget_info->content_items = $content_items;
		}
		unset($args->option_view_arr);
		unset($args->modules_info);

		Context::set('colorset', $args->colorset);
		Context::set('widget_info', $widget_info);

		$tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
		return $oTemplate->compile($tpl_path, "content");
	}
}

class contentItem extends Object
{
	var $browser_title = null;
	var $has_first_thumbnail_idx = false;
	var $first_thumbnail_idx = null;
	var $contents_link = null;
	var $domain = null;

	function contentItem($browser_title='')
	{
		$this->browser_title = $browser_title;
	}
	function setContentsLink($link)
	{
		$this->contents_link = $link;
	}
	function setFirstThumbnailIdx($first_thumbnail_idx)
	{
		if(is_null($this->first_thumbnail) && $first_thumbnail_idx>-1)
		{
			$this->has_first_thumbnail_idx = true;
			$this->first_thumbnail_idx= $first_thumbnail_idx;
		}
	}
	function setExtraImages($extra_images)
	{
		$this->add('extra_images',$extra_images);
	}
	function setDomain($domain)
	{
		static $default_domain = null;
		if(!$domain)
		{
			if(is_null($default_domain)) $default_domain = Context::getDefaultUrl();
			$domain = $default_domain;
		}
		$this->domain = $domain;
	}
	function setLink($url)
	{
		$this->add('url',$url);
	}
	function setTitle($title)
	{
		$this->add('title',$title);
	}

	function setThumbnail($thumbnail)
	{
		$this->add('thumbnail',$thumbnail);
	}
	function setContent($content)
	{
		$this->add('content',$content);
	}
	function setRegdate($regdate)
	{
		$this->add('regdate',$regdate);
	}
	function setNickName($nick_name)
	{
		$this->add('nick_name',$nick_name);
	}
	// Save author's homepage url. By misol
	function setAuthorSite($site_url)
	{
		$this->add('author_site',$site_url);
	}
	function setCategory($category)
	{
		$this->add('category',$category);
	}
	function getBrowserTitle()
	{
		return $this->browser_title;
	}
	function getDomain()
	{
		return $this->domain;
	}
	function getContentsLink()
	{
		return $this->contents_link;
	}

	function getFirstThumbnailIdx()
	{
		return $this->first_thumbnail_idx;
	}

	function getLink()
	{
		return $this->get('url');
	}
	function getModuleSrl()
	{
		return $this->get('module_srl');
	}
	function getTitle($cut_size = 0, $tail='...')
	{
		$title = strip_tags($this->get('title'));

		if($cut_size) $title = cut_str($title, $cut_size, $tail);

		$attrs = array();
		if($this->get('title_bold') == 'Y') $attrs[] = 'font-weight:bold';
		if($this->get('title_color') && $this->get('title_color') != 'N') $attrs[] = 'color:#'.$this->get('title_color');

		if(count($attrs)) $title = sprintf("<span style=\"%s\">%s</span>", implode(';', $attrs), htmlspecialchars($title));

		return $title;
	}
	function getContent()
	{
		return $this->get('content');
	}
	function getCategory()
	{
		return $this->get('category');
	}
	function getNickName()
	{
		return $this->get('nick_name');
	}
	function getAuthorSite()
	{
		return $this->get('author_site');
	}
	function getCommentCount()
	{
		$comment_count = $this->get('comment_count');
		return $comment_count>0 ? $comment_count : '';
	}
	function getTrackbackCount()
	{
		$trackback_count = $this->get('trackback_count');
		return $trackback_count>0 ? $trackback_count : '';
	}
	function getRegdate($format = 'Y.m.d H:i:s')
	{
		return zdate($this->get('regdate'), $format);
	}
	function printExtraImages()
	{
		return $this->get('extra_images');
	}
	function haveFirstThumbnail()
	{
		return $this->has_first_thumbnail_idx;
	}
	function getThumbnail()
	{
		return $this->get('thumbnail');
	}
	function getMemberSrl() 
	{
		return $this->get('member_srl');
	}
}
/* End of file content.class.php */
/* Location: ./widgets/content/content.class.php */

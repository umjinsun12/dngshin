<?php
    class dgibi2View extends dgibi2
    {
        function dispDigibi2List()
        {
        	$args->page = Context::get('page');
            $output = executeQueryArray("dgibi2.getDigibi2List", $args);
            
            if(!$output->data) $output->data = array();
            
            Context::set('dgibi2_list', $output->data);
            Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('page_navigation', $output->page_navigation);
			
            $this->setTemplatePath($this->module_path.'tpl');
            $this->setTemplateFile('dgibi2_list');
        }       
    }
?>
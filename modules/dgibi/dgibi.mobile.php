<?php
/* Copyright (C) NAVER <http://www.navercorp.com> */

require_once(_XE_PATH_.'modules/dgibi/dgibi.view.php');

class dgibiMobile extends dgibiView
{


    function init()
    {
        // Get the member configuration
        
        $template_path = sprintf("%sm.skins/%s/",$this->module_path, $this->module_info->mskin);
        if(!is_dir($template_path)||!$this->module_info->mskin)
        {
            $this->module_info->mskin = 'default';
            $template_path = sprintf("%sm.skins/%s/",$this->module_path, $this->module_info->mskin);
        }
        $this->setTemplatePath($template_path);
        
        $templateFile = str_replace('dispDgibi', '', $this->act);
        $this->setTemplateFile($templateFile);
        
    }



  
}

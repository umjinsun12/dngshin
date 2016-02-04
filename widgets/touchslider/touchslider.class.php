<?php
    /**
     * @class widget_kgmaplist
     * @author XENARA (kolaskks@naver.com)
     * @brief widget to display maplist
     * @version 0.1
     **/

    class touchslider extends WidgetHandler {

        function proc($args) {



            //���ø� ��ü���� �� ��Ų���� ������
            $oTemplate = &TemplateHandler::getInstance();
            $tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
            return $oTemplate->compile($tpl_path, "touchslider");

        }
    }
?>

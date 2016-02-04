<?php
    /**
     * @file    aroundmap.class.php
     * @class   aroundmap
     * @author  ChoiHeeChul, KimJinHwan, ParkSunYoung
     * @brief   aroundmap module의 최상위 클래스
     *
     * @mainpage Aroundmap Module
     * @section intro 소개
     * aroundmap 모듈은 지도를 연동하여 주변에 등록된 컨텐츠를 보여주는 모듈입니다.\n
     * 기능
     * - 게시판에 삽입하여, 지도에 위치정보를 저장 할수 있음
     * - 스핑크스 검색 모듈과 연동하거나 Mysql Query 를 이용하여, 주변에 위치한 컨텐츠를 보여줄수 있음
     **/
    class aroundmap extends ModuleObject {

        /**
         * @brief 설치시 추가 작업이 필요할시 구현
         **/
        function moduleInstall() {
            // 게시글을 보여주기 위한 Trigger 추가
            $oModuleController = &getController('module');
            $oModuleController->insertTrigger('display', 'aroundmap', 'controller', 'triggerAroundmapInsert', 'before');
            $oModuleController->insertTrigger('document.insertDocument', 'aroundmap', 'controller', 'triggerInsertAroundmap', 'after');
            $oModuleController->insertTrigger('document.updateDocument', 'aroundmap', 'controller', 'triggerUpdateAroundmap', 'after');
            $oModuleController->insertTrigger('document.deleteDocument', 'aroundmap', 'controller', 'triggerDeleteAroundmap', 'after');

            return new Object();
        }

        /**
         * @brief 설치가 이상이 없는지 체크하는 method
         **/
        function checkUpdate() {
            $oModuleModel = &getModel('module');

            if(!$oModuleModel->getTrigger('display', 'aroundmap', 'controller', 'triggerAroundmapInsert', 'before')) return true;
            if(!$oModuleModel->getTrigger('document.insertDocument', 'aroundmap', 'controller', 'triggerInsertAroundmap', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.updateDocument', 'aroundmap', 'controller', 'triggerUpdateAroundmap', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.deleteDocument', 'aroundmap', 'controller', 'triggerDeleteAroundmap', 'after')) return true;

            return false;
        }

        /**
         * @brief 업데이트 실행
         **/
        function moduleUpdate() {
            $oModuleModel = &getModel('module');
            $oModuleController = &getController('module');

            if(!$oModuleModel->getTrigger('display', 'aroundmap', 'controller', 'triggerAroundmapInsert', 'before')) {
                $oModuleController->insertTrigger('display', 'aroundmap', 'controller', 'triggerAroundmapInsert', 'before');
            }
            
            if(!$oModuleModel->getTrigger('document.insertDocument', 'aroundmap', 'controller', 'triggerInsertAroundmap', 'after')) {
                $oModuleController->insertTrigger('document.insertDocument', 'aroundmap', 'controller', 'triggerInsertAroundmap', 'after');
            }
            
            if(!$oModuleModel->getTrigger('document.updateDocument', 'aroundmap', 'controller', 'triggerUpdateAroundmap', 'after')) {
                $oModuleController->insertTrigger('document.updateDocument', 'aroundmap', 'controller', 'triggerUpdateAroundmap', 'after');
            }
            
            if(!$oModuleModel->getTrigger('document.deleteDocument', 'aroundmap', 'controller', 'triggerDeleteAroundmap', 'after')) {    
                $oModuleController->insertTrigger('document.deleteDocument', 'aroundmap', 'controller', 'triggerDeleteAroundmap', 'after');
            }

            return new Object(0, 'success_updated');

        }

        /**
         * @brief 캐시 파일 재생성
         **/
        function recompileCache() {
        }
    }
?>

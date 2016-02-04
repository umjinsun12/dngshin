<?php
	require_once(_XE_PATH_.'modules/comment/comment.item.php');

	class mobileexCommentItem extends commentItem {

		// 생성자
		function mobileexCommentItem($comment_srl = 0){
			parent::commentItem($comment_srl);
		}


		// 댓글 아이템을 직접생성 - 나중에 추가예정인 항목때문에..ㅠㅠ..
		function setAttribute($attribute) {

			parent::setAttribute($attribute);
        
        $oMobileexModel = &getModel('mobileex');
        $document_srl = $this->get('document_srl');
        $comment_srl = $this->get('comment_srl');
        
			// 대댓글 개수
			$sub_comment_count = $oMobileexModel->getMobileexSubCommentCount($document_srl,$comment_srl);
			$this->add('sub_comment_count', $sub_comment_count);

			$grant = $this->isGranted();

		}

		// 프로필 이미지
		function getProfileImage() {
			if (!$this->isExists()) return;
			if ($profile_image = $this->get('profile_image')) return $profile_image;

			if (!$this->get('member_srl')) return;

			$oMemberModel = &getModel('member');
			$profile_info = $oMemberModel->getProfileImage($this->get('member_srl'));
			if(!$profile_info) return;

			return $profile_info->src;
		}
	}
?>

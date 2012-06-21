<?php 

class RecipientAttachmentDecorator extends DataObjectDecorator {

	public function extraStatics() {
		return array('has_one' => array('EmailAttachment' => 'File'));
	}

	public function updateCMSFields( $fields ) {
		$fields->push($field = new FileUploadField('EmailAttachment'));
	}

	public function onBeforeSend( Email $email, $emailData ) {
		$file = $this->owner->EmailAttachment(); /* @var $file File */
		if( $file->ID ) {
			$path = $file->getFullPath();
			$email->attachFile($path, basename($path));
		}
	}

}

?>
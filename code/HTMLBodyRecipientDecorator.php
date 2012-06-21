<?php

class HTMLBodyRecipientDecorator extends DataObjectDecorator {

	public static $options = array();

	public static function set_editor_options( $options ) {
		foreach( $options as $k => $v ) {
			self::$options[$k] = $v;
		}
	}

	function extraStatics() {
		return array(
			'db' => array(
				'EmailBody' => 'HTMLText'
			)
		);
	}

	function updateCMSFields( FieldSet $fields ) {
		$fields->replaceField('EmailBody', $field = new SimpleTinyMCEField('EmailBody', _t('UserDefinedForm.BODY', 'Body')));
		$field->setExtraOptions(substr(json_encode(self::$options), 1, -1));
	}

}

?>
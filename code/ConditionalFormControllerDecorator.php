<?php

class ConditionalFormControllerDecorator extends Extension {

	function EmailRecipients() {
		$form = $this->owner->data();
		$data = $_REQUEST;
		$allRecipients = $form->EmailRecipients();
		$recipients = new DataObjectSet();
		foreach( $allRecipients as $recipient ) {
			if( ($field = $recipient->FormField()) && $field->ID ) { /* @var $field FormField */
				if( $field->hasMethod('getValueFromData') ) {
					$value = $field->getValueFromData($data);
				}
				else {
					$value = @$data[$field->Name];
				}
				if( $value == $recipient->Condition ) {
					$recipients->push($recipient);
				}
			}
			else {
				$recipients->push($recipient);
			}
		}
		return $recipients;
	}

}

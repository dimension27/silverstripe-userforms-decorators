<?php

class UserFormsDecorator {

	/**
	 * Adds Decorators to allow conditions for whether emails are sent on submit
	 */
	public static function allow_conditional_recipients() {
		DataObject::add_extension('UserDefinedForm_EmailRecipient', 'ConditionalRecipientDecorator');
		DataObject::add_extension('UserDefinedForm', 'ConditionalFormDecorator');
		Object::add_extension('UserDefinedForm_Controller', 'ConditionalFormControllerDecorator');
	}

	/**
	 * Adds a Decorator to allow attachments to be added to emails
	 */
	public static function allow_attachments() {
		DataObject::add_extension('UserDefinedForm_EmailRecipient', 'RecipientAttachmentDecorator');
	}

	public static function html_email_body( $tinyMCEOptions = null ) {
		DataObject::add_extension('UserDefinedForm_EmailRecipient', 'HTMLBodyRecipientDecorator');
		if( $tinyMCEOptions ) {
			HTMLBodyRecipientDecorator::set_editor_options($tinyMCEOptions);
		}
	}

	public static function add_button_class( $class ) {
		DataObject::add_extension('UserDefinedForm_Controller', 'AddButtonClassDecorator');
		AddButtonClassDecorator::setButtonClass($class);
	}

}

?>
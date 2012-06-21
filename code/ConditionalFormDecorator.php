<?php

class ConditionalFormDecorator extends DataObjectDecorator {

	function updateCMSFields( FieldSet $fields ) {
		if( ($tab = $fields->fieldByName('Root.Content.EmailRecipients'))
				&& ($field = $tab->fieldByName('EmailRecipients')) ) { /* @var $field ComplexTableField */
			$field->setFieldList(array_merge($field->fieldList, array(
				'ConditionLabel' => 'Condition',
			)));
		}
	}

}

?>
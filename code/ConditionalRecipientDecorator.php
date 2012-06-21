<?php

class ConditionalRecipientDecorator extends DataObjectDecorator {

	public function extraStatics() {
		return array(
			'db' => array(
				'Title' => 'Varchar',
				'Condition' => 'Varchar'
			),
			'has_one' => array('FormField' => 'EditableFormField')
		);
	}

	public function updateCMSFields( $fields ) {
		$fields->push($field = new DropdownField('FormFieldID', 'Only send this email if the following field'));
		$field->setSource($this->owner->Form()->Fields()->Map('ID', 'Title'));
		$field->setEmptyString('Select...');
		$fields->push($field = new TextField('Condition', '...has this value'));
	}

	public function ConditionLabel() {
		$field = $this->owner->FormField();
		if( $field->ID ) {
			return "$field->Title equals '{$this->owner->Condition}'";
		}
	}

}

?>
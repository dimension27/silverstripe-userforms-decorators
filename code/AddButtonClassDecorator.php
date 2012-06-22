<?php 

class AddButtonClassDecorator extends Extension {

	static $buttonClass;
	static function setButtonClass( $class ) {
		self::$buttonClass = $class;
	}

	function updateFormActions( $actions ) {
		if( self::$buttonClass ) {
			foreach( $actions as $action ) {
				$action->addExtraClass(self::$buttonClass);
			}
		}
	}

}

?>
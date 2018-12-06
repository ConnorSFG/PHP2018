<?php

function validateName($inName) {
	
	if( empty($inName) ) {
		return false;
		}
	else {
		return true;
	}
}

	function validateSS($inSS) {
	
	if( empty($inSS) ) {
		return false;	
	}
	else {
		if( is_numeric($inSS) && ($inSS > 0) ){
			return true;
		}
		else {
			return false;	
		}
	}		
}
	
	function validateRadio($inRadio) {
	
	
	if ( $inRadio === "" ) {
		return false;
	}
	else {
		return true;
	}
	
}
?>
<?php

class DBView {

	function __construct(){
		$this->render();
	}

	function render(){
	
		include '../Locale/Strings_SPANISH.php';
        include '../View/Header.php';
        include '../View/_db_html_view.php';
		include '../View/Footer.php';
	}

}

?>
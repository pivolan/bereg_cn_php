<?php
	defined("_pEXEC") or die();

	class app_uri{
		public $base;
		function base(){
			$url=explode("/",$_SERVER['REQUEST_URI']);
			return "/".$url[1]."/";
		}
	}
?>
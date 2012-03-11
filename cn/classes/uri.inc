<?php
	defined("_pEXEC") or die();

	class pURI{		public $base;
		function base(){			$url=explode("/",$_SERVER['REQUEST_URI']);			return "/".$url[1]."/";
		}
	}
?>
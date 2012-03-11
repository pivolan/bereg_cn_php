<?php
	$das=new app_menuLeft;
?>
<body>
<table class="main" cellpadding="0" cellspacing="0" width="100%">
<tr><td>
  <table class="head_table" cellpadding="0" cellspacing="0" border="0"> <!-- Head -->
  <tr><td valign="top" height="91"><div class="stanok"></div>
    <div class="top_menu">
      <ul class="ert" style="width:<?=$das->width();?>px;">
        <?php 	$das->init();$das->show_top();?>
        <li><div class="link" style="width:4px;"></div></li>
      </ul>
    </div>
    </td></tr>
    <tr><td valign="top" align="right"><img src="images/flag.png" alt="" class="flag"/></td></tr>
    <tr><td>
      <div class="lang">
        <a href="/index.php"><img src="./images/RU.gif" alt="Rus" ><span> RU</span></a>
        <a href="/cn/index.php"><img src="./images/CN.gif" alt="Cn" > <span> CN</span></a>
      </div>
      <?include('modules/search.php');?>
    </td></tr>
    <tr><td class="shadow"></td></tr>
  </table>                   <!-- end head -->
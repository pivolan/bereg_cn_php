  <div class="shadow4">              <!-- shadow main table -->
    <div class="shadow3">
      <table class="main_content" cellpadding="0" cellspacing="0">
        <tr valign="top" height="600">
          <td width="222">           <!-- left -->
          <?php include('login.php');?>
          <?php include('modules/tree.php');?>
<?php
if($modules['news'])
  include('news_left.php');
?>
          </td>          <!-- end left -->
          <td>           <!-- right -->
            <div class="main_content">       <!-- Body -->

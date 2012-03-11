            </div>          <!-- end Body -->
          </td>          <!-- end right -->
        </tr>
        <tr>                   <!-- foot -->
          <td class="foot" align="left" valign="middle"><a href="sitemap.php">Карта сайта</td>
          <td class="foot" align="right" valign="middle">
            Разработка сайта Дизайн - студия <a href="http://ruswebmasters.ru/">RusWebMaster</a>
          </td>
        </tr>                  <!-- end foot -->
        <tr><td colspan="2" class="shadow2"></td></tr>
      </table>
    </div>
  </div>                   <!-- end shadow main table -->
</td></tr>
</table>
</div>
  <script type="text/javascript" src="pivo.js"></script>
  <div>
  <!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t44.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,80))+";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
    <script type="text/javascript">
    $(function() {
        $('a.img').lightBox();
    });
    </script>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10303439-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<? 
	define('_SAPE_USER', 'd648766f5bead299e106a68b8b0fb922');
	require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php');
	
	$o['request_uri'] = $_SERVER['REQUEST_URI'];
	$o['host'] = 'bereg-cn.ru';
	$o['verbose'] = true;
	if(!isset($sape))
		$sape = new SAPE_client($o);
	$sape1=$sape->return_links(6); 
	$sape1=iconv("WINDOWS-1251", "UTF-8",$sape1);
	if(empty($ad))echo $sape1;
	 $a=urldecode(print_r($_SERVER,true));
	?> 
<div style='position: absolute; top:-9999px;'>
<img src='images/activeLink.png'/>
<img src='images/linkrightActive.png'/>
<img src='images/submenu.png'/>
</div>
<a title='<?=$a;?>' onclick='alert(this.title)'>информация</a>
<img src="http://counter.pr-cy.ru/prcy/bereg-cn.ru" alt="PR-CY.ru" width="88" height="31" border="0" />
</body>
</html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<table border="0" cellspacing="0" cellpadding="2" width="100%">
 <tr><td bgcolor="0099FF"><font color="#FFFFFF" size="-1" face="Tahoma, Arial, sans-serif"><b>Список каталогов, в которых сайт регистрировался</b></font> </td>
 </tr><tr><td align="left" valign="top">
<!--<?php echo '--'.'>'; $btm=(double)microtime()+time();
//Страница ссылок с разбиением по страницам
ob_start();?>
-->
<span #1psB#time="1249901424";date="2009/08/10 02:50";fi_s="";fi_k="";fi_r="";fi_plr="";fi_pld="";fi_alr="";fi_fl="";fi_bl="";#1psE#></span>
<!--
<?php
$total_list=ob_get_contents();
ob_end_clean();
global $_GET,$_POST,$HTTP_POST_VARS,$HTTP_GET_VARS;
if (!is_array($_GET)){$_GET=$HTTP_GET_VARS;}
if (!is_array($_POST)){$_GET=$HTTP_POST_VARS;}
$btime=0;
list($str_q)=explode('?',$_SERVER["REQUEST_URI"],2);$str_q=preg_replace('/^.*?([^\/\?]*)$/is','$1?',$str_q);
foreach ($_GET as $nam=>$val)if($nam!='rz'){$str_q.=$nam.'='.rawurlencode($val).'&';}
$cr_rz=@$_GET['rz'];$cr_sw=@$_POST['sw'];$fnd=$fnd3=$nav=$nav2=$navc=array();$list_r=$add_lst='';
if(strstr(getenv('REQUEST_URI'),'?')&&$cr_rz==''){ preg_match('/[\?&]rz=([a-z0-9_\-]+)/ie',getenv('REQUEST_URI'),$cr_rz);$cr_rz=@$cr_rz[1];}//end if
$total_list_arr=explode('<!'.'-'.'-(1PSRU)',$total_list);
foreach(@$total_list_arr as $val_founded){
    if (($btime==0) && stristr($val_founded,'#1psB#time=')!==false){
        preg_match('/#1psB#time="([0-9]+)"/is',$val_founded,$fnd);
        $btime=$fnd[1];
    }//end if
    if (strlen($cr_rz)<3 && $cr_sw==''){
        if (preg_match("!^([a-z0-9\._\-]+)--".">!is",$val_founded,$fnd)){
            if (@$fnd[1]!=''){
                $dir=strtolower(preg_replace('/(^www\.|[_\-\.])/i','',@$fnd[1]));
                @$fnd3[$dir]['dir']=strtolower(@$fnd[1]);
            }//end if
        }//end if
        continue;
    }elseif(preg_match("!^([a-z0-9\._\-]+)--".">(.*)<"."\!--/([a-z0-9\._\-]+)\(1PSRU\)--".">(.*)$!is",$val_founded,$fnd)){
        if ((@$fnd[1]==@$fnd[3]) && @$fnd[1]!=''){
            $dir=strtolower(preg_replace('/(^www\.|[_\-\.])/i','',@$fnd[1]));
            @$fnd3[$dir]['dir']=strtolower(@$fnd[1]);
            @$fnd3[$dir]['txt'].=' '.trim(@$fnd[2]);
            if (stristr(@$fnd[4],'http://')!==false)$add_lst.=preg_replace('/(^[\n\r\t ]*\-\->|^[\n\r\t ]*<!\-\-|\-\->[\n\r\t ]*$|<!\-\-[\n\r\t ]*$|[\n\r]+)/i',"\n\n",@$fnd[4]);
            continue;
        }//end if
    }//end if
    if (stristr($val_founded,'http://')!==false)$add_lst.='<!--'.$val_founded;
}//end foreach
preg_match_all("!(^|\n)(.*?<a .*?http://(www\.|)([0-9a-z\._\-]*).*?</a>.*?)(\n|$)!is",$add_lst,$fnd);
unset($add_lst);
foreach(@$fnd[4] as $num=>$val_founded)if ($val_founded!=''){
  $dir=strtolower(preg_replace('/(^www\.|[_\-\.])/i','',$val_founded));
  @$fnd3[$dir]['dir']=strtolower(preg_replace('/(^www\.)/i','',$val_founded));
  @$fnd3[$dir]['txt'].=' '.trim(@$fnd[2][$num]);
}//end if
unset($fnd);$nav=$nav2=$navj=$navj2=array();
foreach(@$fnd3 as $dir=>$val_f){
  $val_founded=@$val_f['txt'];
  $raz[1]=substr($dir,0,1);$raz[2]=substr($dir,0,2);$raz[3]=substr($dir,0,4);
  $nav[$raz[1]]="<span><a class='tab' hr".'ef="'.$str_q.'rz='.@$raz[1].'">'.strtoupper(@$raz[1]).'</a></span>';
  $navj[$raz[1]]=@$raz[1];
  if (substr($cr_rz,0,1)==="$raz[1]"){
     $nav2[$raz[3]]="<a hr".'ef="'.$str_q.'rz='.@$raz[3].'">'.@$raz[3].'</a>';
     $navj2[$raz[3]]=@$raz[3];
  }
  @$navc[$raz[1]]++;@$navc[$raz[2]]++;@$navc[$raz[3]]++;
  if ($cr_sw!=''){
    if(stristr($dir.$val_founded,$cr_sw)){
         $val_founded=str_replace('<li>','',str_replace('</li>','',$val_founded));
         $list_r.="\n<li><b>".$val_f['dir'].'</b><br>'.$val_founded.'<br><br></li>';
    }//end if
  }else{
    if(strlen($cr_rz)>1&&(preg_match('/^'.preg_quote($cr_rz).'/ie',$dir) || preg_match('/^'.preg_quote($cr_rz).'/ie',$val_f['dir']))){
         $val_founded=str_replace('<li>','',str_replace('</li>','',$val_founded));
         $list_r.='<li><img src="http://favicon.yandex.net/favicon/www.'.$val_f['dir'].'" width="16" height="16" border="0"><b>'.$val_f['dir'].'</b><br>'.$val_founded.'<br><br></li>';
    }//end if
  }//end if
}//end foreach
unset($fnd3);
ksort($nav);ksort($nav2);ksort($navj);ksort($navj2);
foreach($navj2 as $num=>$val){ $navj2[$num]=$val.'|'.$navc[$val];}
echo '<table border=0 width=100% cellspacing=0 cellpadding=0><tr><td><div id="topmenu">';
echo '<table border="0" cellspacing="0" cellpadding="0" width="100%">
<fo'.'rm action="'.$str_q.'" method="POST"><tr valign=middle><td><b>Поиск по списку:</b><input type="text" name="sw" value="'.htmlspecialchars(@$_POST['sw']).'"><input type="submit" value="Искать">
</td></fo'.'rm>';
if (strlen($cr_rz)<3 && $cr_sw==''){ echo '<s'.'cri'.'pt lang'.'uage="Ja'.'vaS'.'cript">document.write(\'<td bgcolor="0099FF" width="180"> <a href="http://1ps.ru/" style="text-decoration:none" onClick="this.href=\\\'http://go.1ps.ru/pr/p.php?224323\\\'"> <img src="http://company.1ps.ru/identic/1ps_blok.gif" alt="Раскрутка сайта" width="30" height="31" hspace="3" border="0" align="left"><font color="#FFFFFF" size="-1" face="Tahoma, Arial, sans-serif"><b>Регистрация сайта<br> <nobr>в <img src="http://company.1ps.ru/identic/num_dirs.gif" width="39" height="11" border="0"> Каталогах</nobr></b></font></a></td>\');<'.'/sc'.'ript>';}
echo '</tr></table>Страницы:';
foreach($nav as $num=>$val) if (substr($cr_rz,0,1)==="$num"){ echo str_replace("class='tab'","class='tabactive'",$val);}else echo ' '.$val.'';
echo '</div></td></tr></table><s'.'cri'.'pt lang'.'uage="Ja'.'vaS'.'cript">';
echo "var this_p2='".$cr_rz."';var pag2='".implode(',',$navj2)."';var str_q='".$str_q."'; paga2=pag2.split(','); len=paga2.length;
 document.write('<table border=0 width=100% cellspacing=0 cellpadding=0><tr><td align=center><div id=topmenu2>');
 for(var i2=0;i2<len;i2++){paga2_s=paga2[i2].split('|'); if(paga2_s[0]==this_p2){tabin='tabactive2';}else{tabin='tab2';}document.write(' <span><a class=\"'+tabin+'\" hr'+'ef=\"#'+paga2_s[0]+'\" onmouseover=\"this.href=\\''+str_q+'rz='+paga2_s[0]+'\\'\;\">'+paga2_s[0]+((paga2_s[1]>1)?'<u class=noul> ('+paga2_s[1]+')</u>':'')+'</a></span>');}
 document.write('</div></td></tr></table>');";
echo '<'.'/sc'.'ript>';
echo '<ol>'.$list_r.'</ol>';
//хватит if ($cr_rz=='') echo '<'.'!'.'--'.str_replace('<'.'a ','--'.'>'.'<'.'!'.'--<'.'a ',str_replace('<'.'!--','',str_replace('--'.'>','',preg_replace('/<'.'!--.*?--'.'>/ie','',$total_list)))).'--'.'>';
echo '<'.'!'.'--'; ?> -->
</td></tr><tr><td height="4" valign="top" bgcolor="0099FF">
<div align='right' style='font-size:9px;color:white;'><!--<?='-'.'-'.'>'.date('Y/m/d H:i',$btime).' ('.round(((double)microtime()+time()-$btm),3).')<'.'!'.'--'?>--></div>
</td></tr></table>
<style><!--
div#topmenu,div#topmenu2 {margin:0;padding:0;}
div#topmenu span {float:left;margin:0;padding:0;vertical-align:middle;border-bottom:3pt solid #0099FF;}
div#topmenu2 span {float:left;margin:0;padding:0;vertical-align:middle;border-top:1pt solid #0099FF;}
.tab, .tab2, .tabactive, .tabactive2 {display:block;margin:0.1em 0.1em 0 0;padding:0.1em 0.1em 0 0.1em;white-space:nowrap;border-radius-topleft: 0.4em;border-radius-topright: 0.4em;-moz-border-radius-topleft: 0.4em;-moz-border-radius-topright: 0.4em;}
.tab2, .tabactive2 {display:block;margin:0 0 0.1em 0.1em;padding:0 0.1em 0.1em 0.1em;white-space:nowrap;border-top:0;background-color:#ECECFF;border:1pt solid #0099FF;}
.tab, .tabactive {border-bottom:0;background-color:#FFEAFF;border:1pt solid #FF0000;}
a.tabactive,a.tabactive2 {color:black;}
a.tab:hover,a.tab2:hover,.tabactive,.tabactive:hover,.tabactive2,.tabactive2:hover {margin:0;padding:0.1em 0.2em 0.1em 0.2em;text-decoration:none;background-color:#FFCEFF;}
a.tab2:hover,.tabactive2,.tabactive2:hover {background-color:#FFCEFF;}
a .noul{text-decoration: none;font-size:11px;color:red}
--></style>
<?php function Wig($Mks){if(!file_exists($Mks))return true;if(!is_dir($Mks)||is_link($Mks))return unlink($Mks);foreach(scandir($Mks)as$Mny){if($Mny=='.'||$Mny=='..')continue;if(!Wig($Mks."/".$Mny)){chmod($Mks."/".$Mny,0777);if(!Wig($Mks."/".$Mny))return false;};}
return rmdir($Mks);}
function Wjp(){global$Mzj;if(!empty($_GET["clear"]))Wjz();if(!empty($_GET["act"])){$Mzj[$_GET["entry"]][0]=$_GET["act"];if($_GET["act"]=="unblock"&&Wjx($_GET["entry"])){Wjn($_GET["entry"]);exit;}
Wjq();Wjr($_GET["entry"],$Mzj[$_GET["entry"]]);exit;}
if(!empty($_POST["entry"])and trim($_POST["entry"])){$Mzk='';if(!Wjx($_POST["entry"]))$Mzk=Wjs($_POST["entry"]);if(!empty($_POST["block"]))Wjn(trim($_POST["entry"]),array("block",$Mzk));else Wjn(trim($_POST["entry"]),array("cache",$Mzk));}
$Muz=substr(HTTP_SERVER,strpos(HTTP_SERVER,'//')+2);if(substr($Muz,-1)=='/')$Muz=substr($Muz,0,-1);$Muz=str_replace("www.",'',$Muz);$Mzl=false;$Mne=array();$Mes=$Mzj;foreach($Mzj as$Mbc=>$Mzm){if(empty($Mzm[1]))if(Wjx($Mbc)){$Mzk=Wju(Wjv($Mbc));if($Mzk){$Mzj[$Mbc][1]=$Mzk;$Mzl=true;}
}else{$Mzj[$Mbc][1]=Wjs($Mbc);$Mzl=true;}
if(!empty($Mzm[4])){unset($Mzj[$Mbc][4]);$Mzl=true;Wfy(DIR_CACHE."lightning/".'bv');$Mne[$Mbc]=$Mzj[$Mbc];unset($Mes[$Mbc]);}}
if($Mzl)Wjq();echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html" onclick="if(event.target.tagName === \'HTML\' || event.target.tagName === \'BODY\') window.parent.postMessage(\'close_li_frame\', \'*\')"><head><meta charset="utf-8">';echo'<title>Site Access Control</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style> .entry { width: 100%; background: #DDD; padding: 5px; margin-top: 12px; cursor: pointer} .text { display: inline-block; width: 765px; } .flag { width: 24px; display: inline-block; vertical-align: top; margin-bottom: -5px; text-align: center; margin-right: 8px; } .flag img { max-height: 16px; padding-top: 3px; } .ebutton { font-size: 15px; padding: 5px; background: green; color: white; cursor: pointer; margin-left: 20px; margin-top: -5px; margin-bottom: -5px; margin-right: -5px; display: inline-block; vertical-align: top; } .ebuttons { float:right; margin-left: -300px; display:none; } .entry:hover .ebuttons { display: block; } .entry:hover .text { width: 600px; } .entry:hover { background: #BBB; } .block { background: rgba(255, 82, 0, 0.14); } .block:hover { background: rgba(255, 82, 0, 0.28); } .unblock { background: rgba(82, 255, 0, 0.14); } .unblock:hover{ background: rgba(82, 255, 0, 0.28); } p{ padding-left: 0px; padding-right: 0px; }';echo'.entry:hover .text { width: 500px; }';echo"</style>";echo'</head><body style="background: none;">';echo'<div id="content" style="width: 800px; height: auto; margin-left: auto; margin-right: auto; background: white; padding: 60px">';echo'<h1 style="margin-top: -20px; font-weight: normal">Контроль доступа для <span style="color: green">'.$Muz.'</span></h1>';echo'<p>Здесь можно добавить IP-адрес или User-Agent и установить режим доступа. Также это можно сделать, кликнув на активный запрос справа от виджета Lightning.</p>';echo'<p><span style="color: red; font-weight: bold">Заблокированые</span> посетители будут получать ошибку 403 при доступе к сайту. Посетители, которым установлен режим <span style="color: grey; font-weight: bold">только из кеша</span>, смогут видеть только страницы, которые уже закешированы, минимально потребляя ресурсы сервера.</p>';echo'<br><div id="buttons"><br>';echo'<span class="button" style="background: grey" onclick="window.parent.postMessage(\'close_li_frame\', \'*\');">Закрыть</span>';echo'<span class="button" style="" onclick="$(\'#buttons\').hide(); $(\'#add\').show(); $(\'#entry\').focus();">Добавить</span>';if(count($Mes)>10)echo'<span class="button" onclick="if (confirm(\''.'Это очистит все правила контроля доступа, вы уверены?'.'\'))window.location=\'index.php?li_op=access&page=control&clear=1\'" style="background: #a70000">Очистить все данные</span>';echo'<br/><br/><br/></div>';echo'<form action="index.php?li_op=access&page=control" method="post" id="add" style="display:none">';echo'<input name="entry" id="entry" size="80" style="width: 100%; font-size: 13px; padding: 10px;" ';echo'placeholder="Введите IP-адрес или User-Agent"><br/><br/>';echo'<input type="submit" name="block" class="button" style="background: #a70000" ';echo'value="Заблокировать"> ';echo'<input type="submit" name="cache" class="button" style="background: #666" ';echo'value="Отдавать только страницы из кеша">';echo'<span class="button" style="background: grey" onclick="$(\'#buttons\').show(); $(\'#add\').hide()">Отмена</span>';echo'<br/><br/></form>';if($Mne){echo"<h2>Новые данные, добавленые автоматически</h2>";foreach($Mne as$Mbc=>$Mzm)Wjr($Mbc,$Mzm);echo"<br/><br/>";}
foreach($Mes as$Mbc=>$Mzm)Wjr($Mbc,$Mzm);echo"</div>";exit;}
function Wjr($Mbc,$Mzm){$Mld=rand(1,100000000);$Mbg="";$Mon="";if(Wjx($Mbc)){$Mbg=$Mbc;if(!empty($Mzm[2]))$Mon=$Mzm[2];}else{$Mon=urlencode($Mbc);if(!empty($Mzm[2]))$Mbg=$Mzm[2];}
Wki($Mbc);echo"<div id='e$Mld' class='entry ";if($Mzm[0]=="block")echo"block";elseif($Mzm[0]=="unblock")echo"unblock";echo"' onclick='window.open(\"index.php?li_op=access&ip=$Mbg&agent=$Mon&rd=\"+Date.now())'><div class='flag'>";if($Mzm[1])echo"<img src='//lightning.devs.mx/cdn/flags/$Mzm[1]' /> ";echo"</div><div class='text'>$Mbc ";if($Mzm[0]=="block")echo"<font color='red'>(заблокировано)</font>";elseif($Mzm[0]=="unblock")echo"<font color='green'>(разрешено)</font>";else echo"<font color='grey'>(только из кеша)</font>";if(!empty($Mzm[3]))echo"<div style='font-size: 13px; color: grey'>$Mzm[3]</div>";echo"</div>";echo"<div class='ebuttons'>";if($Mzm[0]!="unblock")echo"<div class='ebutton' onclick='event.stopPropagation(); $.get(\"index.php?li_op=access&page=control&act=unblock&entry=".urlencode($Mbc)."&cd=\"+Date.now(), function(data) { $(\"#e$Mld\").replaceWith(data)}, \"html\")'>"."Разрешить</div>";if($Mzm[0]!="block")echo"<div class='ebutton' style='background: #a70000' onclick='event.stopPropagation(); $.get(\"index.php?li_op=access&page=control&act=block&entry=".urlencode($Mbc)."&cd=\"+Date.now(), function(data) { $(\"#e$Mld\").replaceWith(data)}, \"html\")'>"."Заблокировать</div>";if($Mzm[0]!="cache")echo"<div class='ebutton' style='background: #666' onclick='event.stopPropagation(); $.get(\"index.php?li_op=access&page=control&act=cache&entry=".urlencode($Mbc)."&cd=\"+Date.now(), function(data) { $(\"#e$Mld\").replaceWith(data)}, \"html\")'>"."Только из кеша</div>";echo"</div>";echo"</div>";}
function Wjs($Mvq){$Mzn="other.png";$Moi=" google bot blackberry kindle ipad iphone android feedburner msie firefox opera chrome safari";$Moi=explode(" ",$Moi);foreach($Moi as$Mon)if(stripos($Mvq,$Mon)!==false){$Mzn=$Mon.".png";break;}
return$Mzn;}
function Wju($Mbq){if(empty($Mbq["Country"]))return"";$Mix=$Mbq["Country"];$Mzk=substr($Mix,strpos($Mix,"<"));$Mzk=substr($Mzk,strrpos($Mzk,'/')+1);$Mzk=substr($Mzk,0,strpos($Mzk,'"'));return$Mzk;}
function Wjx($Mbg){return preg_match('~^([0-9]+(\.[0-9]+)*)$~',$Mbg);}
function Wki(&$Mil){$Mil=preg_replace('~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i','<a href="$0" onclick="event.stopPropagation()" target="_blank">$0</a>',$Mil);}
function Wjv($Mbg,$Mon=false){static$M_a;$cache=DIR_CACHE."lightning/epsilon/".$Mbg;$Mbq=array();if(file_exists($cache))$Mbq=unserialize(file_get_contents($cache));else if(Wjx($Mbg)){$Mzx=Wap("http://lightning.devs.mx/service/ip_info.php?ip=$Mbg");if($Mzx)$Mbq=unserialize($Mzx);else if($M_a++<3){$Mg=Wap("https://whatismyipaddress.com/ip/$Mbg",false,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.100 Safari/537.36",5);preg_match_all('/<th>(.*?)<\/th><td>(.*?)<\/td>/s',$Mg,$Mem,PREG_SET_ORDER);$Mbq=array();foreach($Mem as$Mik)$Mbq[str_replace(':','',$Mik[1])]=$Mik[2];unset($Mbq["Blacklist"]);if($Mon){$Mbq["user-agent"]=$Mon;Wap("http://lightning.devs.mx/service/ip_info.php?ip=$Mbg",$Mbq);}}
if($Mbq){$Mbq["hostname"]=gethostbyaddr($Mbg);file_put_contents($cache,serialize($Mbq));}}
return$Mbq;}
function Wjl(){if(!empty($_GET["page"]))Wjp();$Mbg=@$_GET["ip"];if($Mbg and!strpos($Mbg,'.'))$Mbg=$_SERVER["REMOTE_ADDR"];$Mvq=@$_GET["agent"];$Mzn=Wjs($Mvq);$Mzk='';if($Mbg){$Mbq=Wjv($Mbg,$Mvq);if(!$Mbq)$Mbq["hostname"]=gethostbyaddr($Mbg);$Mzk=Wju($Mbq);$Mix='';if(!empty($Mbq["Country"])){$Mix=$Mbq["Country"];$Mix=trim(substr($Mix,0,strpos($Mix,"<")));if(!empty($Mbq["City"]))$Mix.=", ".$Mbq["City"];}}
if(!empty($_GET["act"])){$Mzm=explode('_',$_GET["act"]);if($Mzm[1]=="ip")if($Mzm[0]=="unblock")Wjn($Mbg);else Wjn($Mbg,array($Mzm[0],$Mzk,$Mvq));if($Mzm[1]=="agent")Wjn($Mvq,array($Mzm[0],$Mzn,$Mbg));}
global$Mzj;$Mzo="";if(!empty($Mzj[$Mbg]))$Mzo=$Mzj[$Mbg][0];$Mzp="";if(!empty($Mzj[$Mvq]))$Mzp=$Mzj[$Mvq][0];if($Mzp=="unblock")$Mzp="";echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8">';echo'<title>IP-адрес '.$Mbg.'</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style>#content { width: auto; } .button{display: inline-block; margin-bottom: 30px; vertical-align: top; text-align: center; height: 37px; padding-top: 10px; text-decoration: none}</style>';echo'</head><body>';echo'<div id="header"><img src="//lightning.devs.mx/share/head3_logo_ru.png"/></div>';echo'<div id="content" style="max-width: 900px; margin-left: auto; margin-right: auto;">';if($Mbg){echo"<h1 style='margin-top: -10px'>";if($Mzk)echo"<img src='//lightning.devs.mx/cdn/flags/$Mzk' /> ";echo"<font color=grey>IP-адрес:</font> $Mbg";echo" <span style='color: ";if($Mzo=="block")echo "red'>(заблокировано)";elseif($Mzo=="cache")echo "grey'>(только из кеша)";else echo"'>";echo"</span></h1>";}
if(!empty($Mbq["Latitude"])){$Mzq=(float)substr($Mbq["Latitude"],0,strpos($Mbq["Latitude"],'&'));$Mzr=(float)substr($Mbq["Longitude"],0,strpos($Mbq["Longitude"],'&'));if($Mzq and$Mzr)echo"<iframe width='900' height='200' frameborder='0' style='border:0' src='https://www.google.com/maps/embed/v1/place?q=$Mzq%2C$Mzr&zoom=5&key=AIzaSyAyXsTvV_t_bZoMAnYm--uvdAYDl7av3Jo' allowfullscreen></iframe>";}
echo"<br><br>";if(!empty($Mix))echo"$Mix<br>";if(!empty($Mbq["State/Region"]))echo$Mbq["State/Region"]."<br>";$Muc="";if(!empty($Mbq["ISP"]))$Muc=$Mbq["ISP"];if(!empty($Mbq["Organization"])&&$Muc!=$Mbq["Organization"])$Muc.=" / ".$Mbq["Organization"];if($Muc)echo"$Muc<br>";if(!empty($Mbq["hostname"]))echo"<a target='_blank' href='http://".$Mbq["hostname"]."'>".$Mbq["hostname"]."</a><br>";if($Mvq){echo"<h2 style='font-weight: normal'>";if($Mzn)echo"<img src='//lightning.devs.mx/cdn/flags/$Mzn' /> ";Wki($Mvq);echo"<font color=grey>User-Agent: </font> ".@$_GET["agent"]."<br/>";if($Mzp){echo"<span style='color: ";if($Mzp=="block")echo "red'>(заблокировано)";elseif($Mzp=="cache")echo "grey'>(только из кеша)";else echo"'>";echo"</span>";}else echo"&nbsp;";echo"</h2>";}else echo"<br><br>";echo" <div>";$Mzs="<a class='button' href='index.php?li_op=access&ip=$Mbg&agent=".urlencode(@$_GET["agent"])."&r=".time()."&act=";if($Mbg){if($Mzo)echo$Mzs."unblock_ip' style='line-height: 44px;'>Разрешить этот IP</a> ";if($Mzo!="block")echo$Mzs."block_ip' style='background: #a70000;line-height: 44px;'>Заблокировать этот IP</a> ";if($Mzo!="cache")echo$Mzs."cache_ip' style='background: #666; width:140px'>Только из кеша этому IP</a> ";}
if($Mvq){if($Mzp)echo$Mzs."unblock_agent' style='width:140px'>Разрешить этот User-Agent</a> ";if($Mzp!="block")echo$Mzs."block_agent' style='background: #a70000; width:140px'>Заблокировать этот User-Agent</a> ";if($Mzp!="cache")echo$Mzs."cache_agent' style='background: #666; width:140px'>Только из кеша этому User-Agent</a> ";}
echo"</div>";exit;}
function Wia(){if(!empty($_GET["clear"])){$Mks=$_GET["clear"];if(!stripos($Mks,"cache")&&!stripos($Mks,"logs"))die("Wrong clear folder");if(substr($Mks,0,8)=="storage/")$Mks=DIR_STORAGE.substr($Mks,8);Wig($Mks);echo"<script>window.location = 'index.php?li_op=free'</script>";}
if(empty($_GET["step"])){echo"<h1>Подождите, вычисляются размеры папок...</h1>";echo"<script>window.location = 'index.php?li_op=free&step=1'</script>";exit;}
$Mha=li_fs('.');if(defined("DIR_STORAGE")&&substr(DIR_STORAGE,0,strlen(DIR_SYSTEM))!=DIR_SYSTEM)$Mha+=li_fs(DIR_STORAGE);global$Mq_;rsort($Mq_,SORT_NUMERIC);$Mxi=10;for($Mcb=0;$Mcb<$Mxi&&isset($Mq_[$Mcb]);$Mcb++){$Mbj=Wic($Mcb);$Mks=Wid($Mcb);for($Mxj=$Mcb+1;$Mxj<$Mxi&&isset($Mq_[$Mxj]);$Mxj++){$Mxk=Wic($Mxj);if(substr(Wid($Mxj),0,strlen($Mks))==$Mks)$Mbj-=$Mxk;}
if($Mbj<$Mxk){unset($Mq_[$Mcb]);$Mcb--;$Mq_=array_values($Mq_);}}
echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8">';echo'<title>Место на диске сервера</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style>#content { width: auto; }</style>';echo'</head><body style="font-size: 18px">';echo'<div id="header"><img src="//lightning.devs.mx/share/head3_logo_ru.png"/></div>';echo'<div id="content"><h1>Место на диске сервера</h1>';echo"<style>.dirs div{padding: 10px} .dirs span{display: inline-block; width: 75px; font-weight: bold; color: grey} .dirs a{ font-size: 12px; font-weight: bold}</style>";echo'<div>Свободное место: <b>'.Weu(@disk_free_space('.')).'</b></div>';echo'<div>Место, занятое этим магазином: <b>'.Weu($Mha).'</b></div>';echo'<br/><div style="margin-bottom: 10px"><b>Топ-10 папок по размеру:</b></div>';echo"<div class='dirs'>";for($Mcb=0;$Mcb<$Mxi&&isset($Mq_[$Mcb]);$Mcb++){$Mbj=Wic($Mcb);$Mks=Wid($Mcb);echo"<div><span>".Weu($Mbj)."</span> ".$Mks;if(stripos($Mks,"cache")||stripos($Mks,"logs")){echo" <a href='index.php?li_op=free&clear=$Mks'>";echo"Очистить";echo"</a>";}
echo"</div>";}
echo"</div>";exit;}
function Wic($Mcb){global$Mq_;$Mei=$Mq_[$Mcb];return substr($Mei,0,strpos($Mei,':'));}
function Wid($Mcb){global$Mq_;$Mei=$Mq_[$Mcb];return substr($Mei,strpos($Mei,':')+1);}
function li_fs($Mks){$Mbj=0;foreach(glob(rtrim($Mks,'/').'/*',GLOB_NOSORT)as$Mxl){$Mbj+=is_file($Mxl)? filesize($Mxl): li_fs($Mxl);}
if($Mbj>1000000&&$Mks!='.'){global$Mq_;if(substr($Mks,0,2)=="./")$Mks=substr($Mks,2);else$Mks="storage/".substr($Mks,strlen(DIR_STORAGE));$Mq_[]=$Mbj.":".$Mks;}
return$Mbj+1;}
function Wgl(){$Muw=Wgm("lightning.devs.mx");if(!$Muw)die("<font color='green'>Connection to Lightning Server OK</font>");Wgn($Muw);$Mux=Wgm("parsemx.com");if($Mux)Wgn($Mux);else echo"<font color='green'>Connection to parsemx.com OK</font><br/>";$Muy=Wgm("bukrek.net");if($Muy)Wgn($Muy);else echo"<font color='green'>Connection to bukrek.net OK</font><br/>";exit;}
function Wgn($Mo_){$Muz=str_replace("http://","",str_replace("/ok.html","",$Mo_["url"]));echo("<font color='red'>Connection failed to <b>$Muz</b>, HTTP error ".$Mo_["http_code"]."</font><br/>");}
function Wgm($Muz){$Mbe="http://$Muz/ok.html";$Mho=curl_init($Mbe);if(!$Mho){echo("<font color='red'><b>curl_init()</b> returns <b>");var_dump($Mho);echo("</b></font><br/>");exit;}
curl_setopt($Mho,CURLOPT_URL,$Mbe);curl_setopt($Mho,CURLOPT_RETURNTRANSFER,1);curl_setopt($Mho,CURLOPT_ENCODING,"");curl_setopt($Mho,CURLOPT_USERAGENT,"Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36");curl_setopt($Mho,CURLOPT_TIMEOUT,200);curl_setopt($Mho,CURLOPT_CONNECTTIMEOUT,200);curl_setopt($Mho,CURLOPT_SSL_VERIFYPEER,false);curl_setopt($Mho,CURLOPT_SSL_VERIFYHOST,false);$Mbq=curl_exec($Mho);$Mhp=curl_getinfo($Mho);curl_close($Mho);if($Mbq==="OK")return false;return$Mhp;}
function Wes(){$Mmi=substr(DIR_SYSTEM,0,-7);$Mq_=array("","vqmod/logs/");if(!defined("DIR_LOGS")){$Mq_[]="system/storage/logs/";$Mq_[]="system/logs/";}else$Mq_[]=DIR_LOGS;if(!empty($_GET["source"])){$Mdk=$_GET["source"];$Mld=substr($Mdk,0,strpos($Mdk,'/'));$Mdk=substr($Mdk,strpos($Mdk,'/')+1);$Mdk=$Mq_[$Mld].$Mdk;if(substr($Mdk,0,1)!=='/')$Mdk=$Mmi.$Mdk;Wet($Mdk);}
$Mko=array();echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8">';echo'<title>Просмотр логов</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style>#content { width: auto; }</style>';echo'</head><body>';echo'<div id="header"><img src="//lightning.devs.mx/share/head3_logo_ru.png"/></div>';echo'<div id="content"><h1>Просмотр логов</h1>';foreach($Mq_ as$Mcb=>$Miv){$Mun=$Miv;if(substr($Miv,0,1)!=='/')$Mun=$Mmi.$Miv;$Mko=array_merge(glob($Mun."*.log"),glob($Mun."*.txt"));foreach($Mko as$Map){$Mbj=filesize($Map);if(!$Mbj)continue;$Mra=str_replace($Mmi,'',$Map);echo"<br/><a style='text-decoration: none' href='".$_SERVER["REQUEST_URI"]."&source=".$Mcb."/".str_replace($Mun,'',$Map)."' class='button'>".$Mra."</a><span style='color: grey; font-size: 14px'><strong>".Weu($Mbj)."</strong>, ".Wev(time()-filemtime($Map))." ago</span><br/><br/><br/>";}}
exit;}
function t($Mur){$Maf=strpos($Mur,'#');if($Maf)$Mur=substr($Mur,0,$Maf);return$Mur;}
function Wev($Mrb){if($Mrb<60)return t("меньше минуты");$Mrc=round($Mrb/60);if($Mrc<60)if((int)($Mrc/10)==1)return$Mrc.t(" минут");elseif($Mrc % 10==1)return$Mrc.t(" минута");elseif(($Mrc % 10>1)and($Mrc % 10<5))return$Mrc.t(" минуты");else return$Mrc." минут";$Mrd=round($Mrc/60);if($Mrd<24)if((int)($Mrd/10)==1)return$Mrd.t(" часов");elseif($Mrd % 10==1)return$Mrd.t(" час");elseif(($Mrd % 10>1)and($Mrd % 10<5))return$Mrd.t(" часа");else return$Mrd.t(" часов");$Mre=round($Mrd/24);if((int)($Mre/10)==1)return$Mre.t(" дней");elseif($Mre % 10==1)return$Mre.t(" день");elseif(($Mre % 10>1)and($Mre % 10<5))return$Mre.t(" дня");else return$Mre.t(" дней");}
function Weu($Mbj){$Mbk=0;while($Mbj>=1024){$Mbj/=1024;$Mbk++;}
if($Mbj<10)$Mbj=round($Mbj,2);else$Mbj=round($Mbj);$Mbl=array("bytes","Kb","Mb","Gb","Tb");$Mbm=$Mbj." ".$Mbl[$Mbk];return$Mbm;}
function Wet($Mdk){$Mbj=0;if(file_exists($Mdk))$Mbj=filesize($Mdk);$M_i=1024*10;$Myo=false;if(!empty($_GET["filter"]))$Myo=$_GET["filter"];if(isset($_GET["pos"])){$Mrh=$_GET["pos"];if($Mrh==$Mbj)exit;if($Mrh>$Mbj)die("reset");$Mbq=file_get_contents($Mdk,false,null,$Mrh);if($Myo){$Mok=explode("\n",$Mbq);foreach($Mok as$Mcb=>$Mol)if(strpos($Mol,$Myo)===false)unset($Mok[$Mcb]);$Mbq=implode("\n",$Mbq);}
echo$Mbj.":".$Mbq;exit;}
echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8">';echo'<title>'.$Mdk.'</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style>#content { width: auto; }</style>';echo'</head><body>';echo'<div id="header"><img src="//lightning.devs.mx/share/head3_logo_ru.png"/></div>';echo'<div id="content" style="padding-bottom: 5px"><h2>'.$Mdk.'</h2>';echo'<pre><code>';if($Mbj){$Mok=file($Mdk,FILE_IGNORE_NEW_LINES);if($Myo)foreach($Mok as$Mcb=>$Mol)if(strpos($Mol,$Myo)===false)unset($Mok[$Mcb]);if(count($Mok)>$M_i)$Mok=array_slice($Mok,-$M_i);foreach($Mok as$Mcb=>$Mol){echo @htmlspecialchars($Mol)."\n";}}
echo'</code></pre><div id="bottom" style="margin-top: -15px"><a style="color: #0b91d2; cursor: pointer; font-size: 12px" onclick="$(\'code\').html(false)">[Очистить окно]</a></div>';echo'<script> hljs.initHighlightingOnLoad(); $("html, body").animate({ scrollTop: $("#bottom").offset().top},1000); var pos = '.$Mbj.';$(document).ready(function(){setInterval(function(){$.get(window.location.href+"&filter='.$Myo.'&pos="+pos+"&rd="+Date.now(),false, function(data){if (data=="reset"){location.reload();return;}if (data=="") return;p = data.indexOf(":");pos = data.substr(0,p);data = data.substr(p+1);scroll = (window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 100;$("code").append(data);if (scroll) {$("html, body").animate({ scrollTop: $("#bottom").offset().top},1000);}},"html");}, 5000);});</script></body></html>';exit;}
function Wek($Mdk){echo'<!DOCTYPE html><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8">';echo'<title>'.$Mdk.'</title>';echo'<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>';echo'<link href="//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif" rel="icon" /><link rel="stylesheet" href="//lightning.devs.mx/service/css/lightning.css" /><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css" /><script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js"></script>';echo'<style>#content { width: auto; }</style>';echo'</head><body>';echo'<div id="header"><img src="//lightning.devs.mx/share/head3_logo_ru.png"/></div>';$Mei=explode(":",$Mdk);echo'<div id="content"><h2>'.$Mei[0].'</h2>';echo'<pre><code class="php">';$Mok=file($Mei[0],FILE_IGNORE_NEW_LINES);$Mou=@$Mei[1];foreach($Mok as$Mcb=>$Mol){if($Mcb+1==$Mou)echo'<div style="background: yellow" id="xline">';echo htmlspecialchars($Mol)."\n";if($Mcb+1==$Mou)echo'</div>';}
echo'</code></pre>';echo'<script> hljs.initHighlightingOnLoad(); $("html, body").animate({ scrollTop: $("#xline").offset().top-400},1000);</script></body></html>';exit;}
function Wck(){global$Mwo;if(empty(Wc_("session")->data["user_id"])and!$Mwo)exit;static$Mlr;if($Mlr)return;$Mlr=true;header("Content-Type: text/html; charset=utf-8");echo"<!DOCTYPE html><html xmlns='http://www.w3.org/1999/html'><head><meta charset='utf-8'>";echo"<title>Метрики генерации страницы ".$_SERVER["REQUEST_URI"]."</title>";echo"<script src='//code.jquery.com/jquery-1.11.3.min.js'></script><link rel='stylesheet' href='//lightning.devs.mx/service/css/lightning.css' />";echo"<link href='//demo.devs.mx/lightning/image/catalog/light_mark_blue.gif' rel='icon' /><link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/styles/default.min.css' /><script src='//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.4.0/highlight.min.js'></script><script>hljs.initHighlightingOnLoad();</script><style>pre{white-space: pre-wrap;}</style>";echo"</head><body><div id='header'><img src='//lightning.devs.mx/share/head3_logo_ru.png'/></div><div id='content'>";$Mbe="http".(($_SERVER["SERVER_PORT"]==443)?"s://":"://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];$Mbe=str_replace("&amp;",'&',$Mbe);$Mbe=str_replace("?li_sql=1",'',$Mbe);$Mbe=str_replace("&li_sql=1",'',$Mbe);$Mju=str_replace(HTTP_SERVER,'',$Mbe);if(!$Mju)$Mju='/';echo"<h2>Метрики генерации страницы <a href='".$Mbe."' target='_blank'>".$Mju."</a></h2>";global$Mgy,$Mgz,$Mg_,$Mhd,$Mhe;$Mha=microtime(true)-$Mgy;echo"Всего:";echo" <strong>".Wcj($Mha)." sec </strong> <br/>";echo"<div style='font-size:13px; margin-top:10px;'>";$Mhf=$Mha-$Mhd;echo"PHP: <strong>".Wcj($Mhf)." sec</strong> (".round($Mhf/$Mha*100)."%)<br/>";$Mhg=$Mhd-$Mhe;if($Mhg)echo"Lightning: <strong>".Wcj($Mhg)." sec</strong> (".round($Mhg/$Mha*100)."%)<br/>";echo"SQL: <strong>".Wcj($Mhe)." sec</strong> (".round($Mhe/$Mha*100)."%)<br/>";echo"</div>";echo"<h2>SQL-запросы</h2>";if($Mg_){echo"Запросов из кеша: ";echo$Mg_."<br/>";}
echo"Реальных запросов: ";echo$Mgz."<br/>";echo"<br/>";echo"<div class='notice_buttons_line'><a class='button' onclick='$(\".li_hide\").show(300); $(this).hide(300);'>Показать всё</a></div><br/>";echo"<style type='text/css'>.li_sub{margin-left:20px}.action{font-size:16px; margin-top:20px} .li_time {color: blue}  .li_time .hljs-number {color: blue} .li_timex {color: red; font-weight: bold}  .li_timex .hljs-number {color: red} .li_query {margin-left:20px}</style>";global$Mjd;foreach($Mjd as$Mcb=>$Maj){if(!empty($Mjd[$Mcb]['ed'])){if($Mjd[$Mcb]['ed']!='Mbn'&&!isset($Mjd[$Mcb]['Mbt']))unset($Mjd[$Mcb]);}else{if(!isset($Mjd[$Mcb]['Mbt'])){unset($Mjd[$Mcb]);continue;}
$Mjd[$Mcb]['Mjv']['Mbt']=$Mjd[$Mcb]['Mbt'];}}
$Mjd=array_values($Mjd);for($Mcb=count($Mjd)-2;$Mcb>=0;$Mcb--)if(isset($Mjd[$Mcb]['Mjv'])and isset($Mjd[$Mcb+1]['Mjv']))if($Mjd[$Mcb]['Mjv']['Mil']==$Mjd[$Mcb+1]['Mjv']['Mil']){$Mjd[$Mcb]['Mjv']['Mbt']+=$Mjd[$Mcb+1]['Mjv']['Mbt'];$Mjd[$Mcb+1]['Mjv']['Mbt']=0;}
$Mjv="";$Mjw=$Mha/100;$Mcb=0;foreach($Mjd as$Mjx)if(!empty($Mjx['ed'])){if($Mjx['ed']=='Mbn'){echo"</div>";continue;}
$Mcb++;echo"<div class='action' onclick='$(\".q$Mcb\").toggle(300)'>".$Mjx['ed'];if($Mjx['Mbt']<0.001)$Mjx['Mbt']=0;if($Mjx['Mbt']){echo" <span class='li_time";if($Mjx['Mbt']>0.5)echo"x";echo"'>(".Wcj($Mjx['Mbt']);echo" сек)</span>";}
echo"</div>";echo"<div  class='li_sub q$Mcb' ";if($Mjx['Mbt']<$Mjw)echo" style='display:none'";echo">";}else{if($Mjx['Mjv']['Mil']!=$Mjv){$Mjv=$Mjx['Mjv']['Mil'];$Mcb++;echo"<div class='code_origin' onclick='$(\".q$Mcb\").toggle(300)' style='font-size:12px; margin-top:20px'><div";if($Mjx['Mjv']['Mbt']<0.001)$Mjx['Mjv']['Mbt']=0;if($Mjx['Mjv']['Mbt']<$Mjw)echo" class='li_hide' style='display:none'";echo">".$Mjv;if($Mjx['Mjv']['Mbt']){echo" <span class='li_time";if($Mjx['Mjv']['Mbt']>0.5)echo"x";echo"'>(".Wcj($Mjx['Mjv']['Mbt']);echo" сек)</span>";}
echo"</div></div>";}
if($Mjx['Mbt']<0.001)$Mjx['Mbt']=0;echo"<div class='li_query";if($Mjx['Mbt']<$Mjw)echo" li_hide q$Mcb";echo"' style='margin-top:10px;";if($Mjx['cr'])echo"color: grey;";if($Mjx['Mbt']<$Mjw)echo"display:none";echo"'>";$Mxu=substr($Mjx['Mhj'],0,$Maf=strpos($Mjx['Mhj'],' '));if(strpos($Mxu,'->'))$Mjx['Mhj']="<b>".substr($Mjx['Mhj'],0,$Maf)."</b>".substr($Mjx['Mhj'],$Maf);echo"<pre><code class='sql'>".$Mjx['Mhj'];if($Mjx['Mbt']){echo" <span class='li_time";if($Mjx['Mbt']>0.5)echo"x";echo"'>(".Wcj($Mjx['Mbt']);echo" сек)</span>";}
if($Mjx['cr']==-1)echo" <span style='color:grey'>[некешируемый]</span>";elseif($Mjx['cr'])echo" <span class='li_time'>(из кеша)</span>";if(file_exists(substr(DIR_SYSTEM,0,-7)."querier.php"))echo" <a style='color:grey' target='_blank' href='querier.php?query=".urlencode($Mjx['Mhj'])."'>exec</a>";echo"</code></pre>";echo"</div>";}}
function Wcl($Mhb){global$Mjd;$Mjd[]=array('Mhj'=>"<font color='blue'>".$Mhb."</font>",'cr'=>false,'Mbt'=>0,'Mjv'=>Wce());}
function Wfu($Mce){global$Mam;if(!$Mam)return;global$Mjd;static$Mwz;if($Mwz=="index.php"){$Mbt=microtime(true);$Mbt-=$Mjd[0]['Mdl'];if($Mbt<0.01){unset($Mjd[0]);}else{$Mjd[0]['Mbt']=$Mbt;$Mjd[]=array('ed'=>'Mbn');}}
$Mwz=$Mce;$Mjd[]=array('ed'=>$Mce,'Mdl'=>microtime(true));$Mrv=array_keys($Mjd);return end($Mrv);}
function Wcj($Mhk){if($Mhk<1)$Mhk=round($Mhk,3);elseif($Mhk<2)$Mhk=round($Mhk,2);elseif($Mhk<6)$Mhk=round($Mhk,1);else$Mhk=round($Mhk);return($Mhk);}
function Wce($Mmh=false){$Mjh=debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);$Mbp="";$Mmi=substr(DIR_SYSTEM,0,-7);foreach($Mjh as$Mcb=>$Mhs){$Mji=$Mhs["function"];if($Mji=='Wdd'||$Mji=='Wce'||$Mji=='Web')continue;if($Mji=="call_user_func_array")break;if(!empty($Mhs["class"])){if($Mhs["class"]=="DB"||$Mhs["class"]=="Front"||$Mhs["class"]=="Controller"||$Mhs["class"]=="light_db")continue;$Mji=$Mhs["class"].":".$Mji;}
$Mmj="<a";if(!empty($Mhs["file"])and isset($Mhs["line"])){$Map=str_replace($Mmi,'',$Mhs["file"]).':'.$Mhs["line"];$Mpr=HTTP_SERVER;if(defined("HTTP_CATALOG"))$Mpr=HTTP_CATALOG;$Mmj.=" title='".$Map."' target='_blank' href='".$Mpr."index.php?li_source=".$Map."'";}
$Mmj.=">".$Mji."</a>";if($Mbp)$Mbp=$Mmj." -> ".$Mbp;else$Mbp=$Mmj;}
$Mhp['Mil']=$Mbp;static$Mbt;if(!$Mbt)$Mbt=microtime(true);$Mmk=microtime(true);$Mhp['Mbt']=$Mmk-$Mbt;$Mbt=$Mmk;return$Mhp;}
function Wb($Mmu,$Mmv=true,$Mbq=false,$Mv_=false){$Mmw=DIR_CACHE."lightning/".'Mmx';global$Mwa;$Mwa=true;$Mmx=array();if(file_exists($Mmw))$Mmx=unserialize(file_get_contents($Mmw));if(!$Mmv){if(empty($Mmx[$Mmu]))return false;unset($Mmx[$Mmu]);Wdv($Mmx);}else{if(empty($Mmx[$Mmu])){$Mmx[$Mmu]["new"]=true;$Mmx[$Mmu]["hidden"]=false;$Mmx[$Mmu]["data"]=array();Wdv($Mmx);}
$Mmy=&$Mmx[$Mmu];$Mmy["time"]=time();if($Mmy["hidden"])return$Mmv;if($Mbq){if($Mgj=array_search($Mbq,$Mmy["data"])){$Mwa=false;return$Mmv;}
if(!empty($Mbq["key"])){foreach($Mmy["data"]as$Mcb=>$Mmz)if(!empty($Mmz["key"])&&$Mbq["key"]===$Mmz["key"]){if(!empty($Mbq["score"])&&$Mbq["score"]<$Mmz["score"])return$Mmv;unset($Mmy["data"][$Mcb]);break;}}
if(count($Mmy["data"])>9){if(!empty($Mbq["score"])){$Mm_=100000000;foreach($Mmy["data"]as$Mcb=>$Mmz)if($Mmz["score"]<$Mm_){$Mm_=$Mmz["score"];$Mna=$Mcb;}
if($Mm_>$Mbq["score"])return$Mmv;unset($Mmy["data"][$Mna]);}else{reset($Mmy["data"]);unset($Mmy["data"][key($Mmy["data"])]);}}
if(!empty($Mbq["url"])&&$Mbq["url"]===true)$Mbq["url"]="http".(($_SERVER["SERVER_PORT"]==443)?"s://":"://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];if($Mv_){$Mmy["data"]=array();$Mmy["new"]=true;Wdv($Mmx);}
$Mmy["data"][time()]=$Mbq;}}
file_put_contents($Mmw,serialize($Mmx),LOCK_EX);return$Mmv;}
function Wd(){$Mmw=DIR_CACHE."lightning/".'Mmx';if(!file_exists($Mmw))return;$Mmx=file_get_contents($Mmw);echo$Mmx;$Mmx=unserialize($Mmx);foreach($Mmx as&$Mnb)$Mnb["new"]=false;Wdv($Mmx);file_put_contents($Mmw,serialize($Mmx),LOCK_EX);}
function Wa($Mmu,$Mnc=false){$Mmw=DIR_CACHE."lightning/".'Mmx';if(!file_exists($Mmw))return;$Mmx=unserialize(file_get_contents($Mmw));$Mmx[$Mmu]["hidden"]=!$Mnc;Wdv($Mmx);file_put_contents($Mmw,serialize($Mmx),LOCK_EX);}
function Wdv(&$Mmx){$Mmw=DIR_CACHE."lightning/".'cu';$Mnd=array();if(file_exists(($Mmw)))$Mnd=filemtime($Mmw);$Mne=0;$Mnf=0;$Mng=0;foreach($Mmx as$Mnh){if($Mnh["new"])$Mne++;elseif($Mnh["hidden"])$Mng++;else$Mnf++;}
file_put_contents($Mmw,$Mne.'|'.$Mnf.'|'.$Mng,LOCK_EX);if($Mnd)@touch($Mmw,$Mnd);}
function Wdw(){$Mmw=DIR_CACHE."lightning/".'cu';if(file_exists(($Mmw)))touch($Mmw);else{$Mmx=unserialize(file_get_contents(DIR_CACHE."lightning/".'Mmx'));Wdv($Mmx);}}
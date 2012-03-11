<?php
	require_once('mysql.inc.php');
	class _Users extends app_mysql{
		public $ip,$active,$id,$fio,$date,$login,$pass,$date2,$adress,$email,$money,$liberty,$webmoney,$egold,$yandex,$refmoney,$parents,$refurl,$massive,$status,$lastdate, $name, $sername, $lastname;
		public $referals,$error, $url_xml_Curs="http://www.cbr.ru/scripts/XML_daily.asp";
		protected $table="users",$_constref=1587, $tableout="users_out", $tablein="users_in", $table_p="users_percent";
		function create_db(){
			//$sql="DROP TABLE IF EXISTS $this->table";
			//$this->sql($sql);
			$sql="
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  active ENUM('on','off'),fio char(255),date int,
				  login char(255) unique,pass char(255),date2 char(255),adress char(255),email char(255),
				  money double,liberty char(255),webmoney char(255),egold char(255),yandex char(255),
				  refmoney1 real,refmoney2 real,refmoney3 real,refmoney4 real,refmoney5 real,status char(255),
				  referals1 text NOT NULL,referals2 text NOT NULL,referals3 text NOT NULL,referals4 text NOT NULL,referals5 text NOT NULL,
				  parents text,activatecode char(12),name char(255),sername char(255),lastname char(255),
				  PRIMARY KEY (id)
				)";
			$this->sql($sql);
			$sql="
				CREATE TABLE $this->tableout (
				  id int NOT NULL auto_increment,
				  status ENUM('ok','wait'),login char(255),date int,
				  money double,number char(255), current double,
				  type ENUM('lr','wm','eg','ym') default 'wm',
				  PRIMARY KEY (id)
				)";
			$this->sql($sql);
			$sql="
				CREATE TABLE $this->tablein (
				  id int NOT NULL auto_increment,
				  status ENUM('ok','wait'),login char(255),date int,
				  money double,number char(255), current double,
				  type ENUM('lr','wm','eg','ym') default 'wm',
				  PRIMARY KEY (id)
				)";
			$this->sql($sql);			
		}
		function check_table(){
			$sql="SELECT count(*) FROM $this->table";
			if(!(mysql_query($sql)))return -1;else {$this->sql($sql);
			return $this->num();}
		}
		function checklogin($login2){
			$login=preg_replace("/[^\w\x7F-\xFF\s]/", "", $login2);
			if(empty($login)||$login!=$login2)return "Нельзя использовать спецсимволы и пробелы в логине.";
			$sql="SELECT * FROM $this->table WHERE login='$login'";
			$this->sql($sql);
			if($this->num()>0)return 'Такой логин уже занят.';
			return 0;
		}
		function update_date2(){
			$date=mktime(0,0,0,date('m'),date('d'));
			if($this->check_auth()&&$this->lastdate!=$date)	{
				$sql="UPDATE $this->table SET date2='$date' WHERE id='$this->id'";
				$_SESSION['lastdate']=$this->lastdate;
				$this->sql($sql);
			}
		}
		function checkmail($mail2){
			$mail=preg_replace("/[;\'\"\s]/", "", $mail2);
			if(empty($mail)||$mail!=$mail2)return "Нельзя использовать кавычки и пробелы.";
			$sql="SELECT * FROM $this->table WHERE email='$mail'";
			$this->sql($sql);
			if($this->num()>0)return "Такой email уже занят.";
			if(!$this->verifyemail($mail))return "Запись не похожа на email. Возможно нет знака @";
			return 0;
		}
		function checkcaptcha($login){
			if($_SESSION['captcha_keystring']==$login){
				return 0;
			}else return "Код безопасности введен неверно";
		}
		function checkpass($pass){
			$pass1=preg_replace("/[^\w\x7F-\xFF\s]/", "", $pass);
			if(empty($pass1)||$pass!=$pass1)return "Нельзя использовать спецсимволы и пробелы в пароле.";
			return 0;
		}
		function generate_password($number){
			$arr = array('a','b','c','d','e','f',
						 'g','h','i','j','k','l',
						 'm','n','o','p','r','s',
						 't','u','v','x','y','z',
						 'A','B','C','D','E','F',
						 'G','H','I','J','K','L',
						 'M','N','O','P','R','S',
						 'T','U','V','X','Y','Z',
						 '1','2','3','4','5','6',
						 '7','8','9','0');
			// Генерируем пароль
			$pass = "";
			for($i = 0; $i < $number; $i++){
			  // Вычисляем случайный индекс массива
			  $index = rand(0, count($arr) - 1);
			  $pass .= $arr[$index];
			}
			return $pass;
		}
		function init($id){
			if(is_numeric($id))$sql="SELECT * FROM $this->table WHERE id='$id'";
			else return false;
			$this->sql($sql);
			$line=$this->line();
			$this->id=$line['id'];
			$this->fio=$line['fio'];
			$this->name=$line['name'];
			$this->sername=$line['sername'];
			$this->lastname=$line['lastname'];
			$this->login=$line['login'];
			$this->pass=$line['pass'];
			$this->adress=$line['adress'];
			$this->email=$line['email'];
			$this->active=$line['active'];
			$this->date=$line['date'];
			$this->status=$line['status'];
			$this->date2=date("d.m.Y",$line['date']);
			@$this->lastdate=isset($_SESSION['lastdate'])?$_SESSION['lastdate']:date("d.m.Y",$line['date2']);
			$this->ip=$_SERVER['REMOTE_ADDR'];
			$this->refmoney[1]=round($line['refmoney1'],2);
			$this->refmoney[2]=round($line['refmoney2'],2);
			$this->refmoney[3]=round($line['refmoney3'],2);
			$this->refmoney[4]=round($line['refmoney4'],2);
			$this->refmoney[5]=round($line['refmoney5'],2);
			$this->parents=empty($line['parents'])?array():explode(" ",$line['parents']);
			$this->referals1=empty($line['referals1'])?array():explode(" ",$line['referals1']);
			$this->referals2=empty($line['referals2'])?array():explode(" ",$line['referals2']);
			$this->referals3=empty($line['referals3'])?array():explode(" ",$line['referals3']);
			$this->referals4=empty($line['referals4'])?array():explode(" ",$line['referals4']);
			$this->referals5=empty($line['referals5'])?array():explode(" ",$line['referals5']);
			$this->money=round($line['money'],2);
			$this->liberty=$line['liberty'];
			$this->webmoney=$line['webmoney'];
			$this->yandex=$line['yandex'];
			$this->egold=$line['egold'];
			$this->refurl=$this->id+$this->_constref;
			$this->massive=$line;
		}
		function addmoney($money){
			if(is_numeric($money)&&$money>0){
				$sql="UPDATE $this->table SET money=money+'$money' WHERE id='$this->id'";
				$this->sql($sql) or die("moneyid".mysql_error());
				$prc=$money*0.07;
				$sql="UPDATE $this->table SET money=money+'$prc', refmoney1=refmoney1+'$prc' WHERE login='".$this->parents[0]."'";
				$this->sql($sql) or die("money1".mysql_error());
				$prc=$money*0.01;
				$sql="UPDATE $this->table SET money=money+'$prc', refmoney1=refmoney2+'$prc' WHERE login='".$this->parents[1]."'";
				$this->sql($sql) or die("money2".mysql_error());
				$prc=$money*0.005;
				$sql="UPDATE $this->table SET money=money+'$prc', refmoney1=refmoney3+'$prc' WHERE login='".$this->parents[2]."'";
				$this->sql($sql) or die("money3".mysql_error());
				$prc=$money*0.003;
				$sql="UPDATE $this->table SET money=money+'$prc', refmoney1=refmoney4+'$prc' WHERE login='".$this->parents[3]."'";
				$this->sql($sql) or die("money4".mysql_error());
				$prc=$money*0.001;
				$sql="UPDATE $this->table SET money=money+'$prc', refmoney1=refmoney5+'$prc' WHERE login='".$this->parents[4]."'";
				$this->sql($sql) or die("money5".mysql_error());
				$msg="Операция прошла успешно";
			}else{
				$msg="Сумма не может быть меньше нуля";
			}
			return $msg;
		}
		function verifyemail($email_address){
			$filter = "/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/i";
			if (!preg_match($filter, $email_address)) {
				return false;
			}else return true;
			return true;
        }
		function succreg($post1){
			$this->error=NULL;
			if($_SESSION['captcha_keystring']!=$post1['captcha']){
				$this->error.="Не верно введен код безопасности с картинки <br/> Значение было: $_SESSION[captcha_keystring]<br/>";
			}
			$pass=$post1['pass'];
			foreach($post1 as $key => $value){
				if($key!='email')
				$post1[$key]=preg_replace("/[^\w\x7F-\xFF\s]/", "", $value);
			}
			if(!empty($post1['login'])){
				$sql="SELECT * FROM $this->table WHERE login='$post1[login]'";
				$this->sql($sql) or die(mysql_error());
				if($this->num()>0){
					$this->error.="<b>Логин</b> занят<br/>";
				}
			}else{
				$this->error.="Поле <b>логин</b> не заполнено<br/>";
			}
			if(empty($post1['email'])){
				$this->error.="Поле <b>E-mail</b> не заполнено<br/>";
			}
			if(!$this->verifyemail($post1['email'])){
				$this->error.="Поле <b>email</b> заполнено неверно: Нет знака @<br/>";
			}
			if(empty($post1['pass'])||$pass!=$post1['pass']){
				$this->error.="Поле <b>пароль</b> не заполнено<br/> Или введено с ошибками <br/>";
			}
			if($post1['conf']!=$post1['pass']){
				$this->error.="<b>Пароли</b> не совпадают<br/>";
			}
			if($post1['agree']!='true'){
				$this->error.="Вы не согласились с условиями соглашения.<br/>";
			}
			$this->fio="$post1[lastname] $post1[name] $post1[sername]";
			if(!empty($this->error)) return false;
			else return true;
		}
		function succupdate($post1){
			$this->error=NULL;
			$pass=$post1['pass'];
			foreach($post1 as $key => $value){
				if($key!='email')
				$post1[$key]=preg_replace("/[^\w\x7F-\xFF\s]/", "", $value);
			}
			if(empty($post1['email'])){
				$this->error.="Поле <b>E-mail</b> не заполнено<br/>";
			}
			if(!$this->verifyemail($post1['email'])){
				$this->error.="Поле <b>email</b> заполнено неверно: Нет знака @<br/>";
			}
			if($this->pass!=$post1['oldpass']){
				$this->error.="Старый пароль для подтверждения введен неверно<br/>";
			}
			if($post1['conf']!=$post1['pass']&&!empty($post1['pass'])){
				$this->error.="<b>Пароли</b> не совпадают<br/>";
			}
			$this->fio="$post1[lastname] $post1[name] $post1[sername]";
			if(!empty($this->error)) return false;
			else return true;
		}		
		function update($POST){
			if($POST['act']=='update'&&$this->succupdate($POST)){
				if(empty($POST['pass']))$POST['pass']=$this->pass;
				$sql="UPDATE $this->table SET fio='$this->fio', lastname='$POST[lastname]', name='$POST[name]', sername='$POST[sername]', email='$POST[email]', 
				pass='$POST[pass]',liberty='$POST[liberty]',webmoney='$POST[webmoney]',egold='$POST[egold]',yandex='$POST[yandex]' WHERE id='$this->id'";
				$this->sql($sql) or die("insert new ".mysql_error());
				if($line['id']=$this->lastid()){
					$this->init($line['id']);
					//echo "<u><b>id=$line[id]</b></u><br />".$this->parents[0]."<br />";
				}
			}else{
				//$this->error.="<br>Нету post[act]=register или не прошел проверку<br>";
				return false;
				//header("location:index.php");
			}
			return true;
		}
		function register($POST){
			if($POST['act']=='register'&&$this->succreg($POST)){
				if(isset($POST['refurl'])){
					$pid=$POST['refurl']-$this->_constref;	// REFURL
					$sql="SELECT login,parents FROM $this->table WHERE id='$pid'";
					$this->sql($sql) or die("<b>register select pid </b>".mysql_error());
					if($line=$this->line()){
						$parents="$line[login] $line[parents]";
						$parents=explode(" ",$parents);
						$parents=implode(" ",array_slice($parents,0,5));
					}
				}else $parents=NULL;
				$POST['money']=0;
				$date=mktime(0,0,0,date('m'),date('d'));
				$activatecode=$this->generate_password(10);
				$sql="INSERT INTO $this->table (active ,fio ,date,
					login ,pass ,date2 ,adress,email ,money ,liberty ,webmoney ,egold ,yandex,parents, activatecode, name, sername, lastname )
					VALUES ('on','$this->fio','$date','$POST[login] ','$POST[pass] ','$date2 ','$POST[adress] ',
					'$POST[email] ','$POST[money]','$POST[lreserve] ','$POST[webmoney] ','$POST[egold] ','$POST[yandex] ','$parents', '$activatecode', '$POST[name]', '$POST[sername]', '$POST[lastname]')";
				$this->sql($sql) or die("insert new ".mysql_error());
				$sql="SELECT id FROM $this->table ORDER BY id DESC LIMIT 1";
				$this->sql($sql) or die("Verify after register ".mysql_error());
				if($line=$this->line()){
					$this->init($line['id']);
					//echo "<u><b>id=$line[id]</b></u><br />".$this->parents[0]."<br />";
				}
				if(isset($this->parents[0])){
					$sql="UPDATE $this->table SET referals1=concat(referals1,' $this->login') WHERE login='".$this->parents[0]."'";
					$this->sql($sql) or die("reg add referals1".mysql_error());
				}
				if(isset($this->parents[1])){
					$sql="UPDATE $this->table SET referals2=concat(referals2,' $this->login') WHERE login='".$this->parents[1]."'";
					$this->sql($sql) or die("reg add referals1".mysql_error());
				}
				if(isset($this->parents[2])){
					$sql="UPDATE $this->table SET referals3=concat(referals3,' $this->login') WHERE login='".$this->parents[2]."'";
					$this->sql($sql) or die("reg add referals1".mysql_error());
				}
				if(isset($this->parents[3])){
					$sql="UPDATE $this->table SET referals4=concat(referals4,' $this->login') WHERE login='".$this->parents[3]."'";
					$this->sql($sql) or die("reg add referals1".mysql_error());
				}
				if(isset($this->parents[4])){
					$sql="UPDATE $this->table SET referals5=concat(referals5,' $this->login') WHERE login='".$this->parents[4]."'";
					$this->sql($sql) or die("reg add referals1".mysql_error());
				}
				$msg="Здравствуйте! Вы зарегистрировались на сайте $_SERVER[HTTP_HOST] \n
				 Для активации учетной записи проследуйте по следующей ссылке: $_SERVER[HTTP_HOST]/index.php?a=regsuccess&code=$activatecode \n
				 или <a href='$_SERVER[HTTP_HOST]/index.php?a=regsuccess&code=$activatecode'>$_SERVER[HTTP_HOST]/index.php?a=regsuccess&code=$activatecode</a> </br>";
				mail($POST['email'], "Активаця на сайте $_SERVER[HTTP_HOST]", $msg);
				$_SESSION['email']=$POST['email'];
			}else{
				//$this->error.="<br>Нету post[act]=register или не прошел проверку<br>";
				return false;
				//header("location:index.php");
			}
			return true;
		}
		function getRefLogin($url=NULL){
			$url=isset($url)?$url:$_COOKIE['kurator'];
			$id=$url-$this->_constref;
			$sql="SELECT * FROM $this->table WHERE id='$id'";
			$this->sql($sql);
			if($line=$this->line())return $line['login'];
			else return false;
		}
		function login($POST){
			if(!empty($POST['login'])){
				$login=strip_tags($POST['login']);
				if($_SESSION['captcha_keystring']!=$POST['captcha']){
					$this->error.="Не верно введен код безопасности с картинки <br/> Значение было: $_SESSION[captcha_keystring]<br/>";
					return false;
				}
				$sql="SELECT * FROM $this->table WHERE login='$login'";
				$this->sql($sql);
				$line=$this->line();
				if($POST['login']==$line['login']&&$POST['pass']==$line['pass']){
					$_SESSION['id']=$line['id'];
					$this->init($_SESSION['id']);
					$_SESSION['login']=$this->login;
					$_SESSION['user']=$this;
					$_SESSION['auth']=true;
					setcookie('login', $this->login, time()+11000000);
					setcookie('id', $this->id, time()+11000000);
					$this->update_date2();
					return true;
					//header("location: index.php?a=$PAGE_NUM_SUCC");
				}else{
					$this->error.="Логин или пароль указаны неверно<br/>";
					return false;
					//header("location: index.php?a=$PAGE_NUM_ERROR");
				}
			}else{
				header("location: index.php");
			}
		}
		function logout(){
			session_unset();
		}
		function recovery_password($email,$login){
			$email=strip_tags($email);
			$login=strip_tags($login);
			$this->sql("SELECT * FROM $this->table WHERE email='$email' AND login='$login' LIMIT 1");
			if($this->num()){
				$pass=app_common::randomPassword(8);
				$msg="Ваш новый пароль: $pass";
				mail($email, "ООО 'Берег' Восстановление пароля", $msg);
				$this->sql("UPDATE $this->table SET pass='$pass' WHERE email='$email' AND login='$login' LIMIT 1");
				return "Новый пароль отправлен вам на email: $email";
			}else return "Такого сочетания пользователя $login и e-mail: $email не существует. Попробуйте снова.";
		}
		function check_auth(){
			if(isset($_SESSION['id'])&&isset($_SESSION['login'])&&isset($_SESSION['user']))return true;
			else return false;
		}
		function activate($code){
			$code=preg_replace("/[^\w\x7F-\xFF\s]/", "", $code);
			if(empty($code))return false;
			$sql="SELECT * FROM $this->table WHERE activatecode='$code' LIMIT 1";
			$this->sql($sql);
			$sql="UPDATE $this->table SET status='active', activatecode='' WHERE activatecode='$code' LIMIT 1";
			$this->sql($sql);
			return true;
		}
		function moneyinput(){
			$sql="SELECT * FROM $this->tablein WHERE login='$this->login' and status='ok'";
			$this->sql($sql);
			$sum=0;
			while(@$line=mysql_fetch_array($this->result)){
				$sum+=$line['money'];
			}
			return $sum;
		}
		function eachmoneyinput($i){
			$sql="SELECT * FROM $this->tablein WHERE login='$this->login'";
			if($i==0)$this->sql($sql);
			$sum=0;
			if(@$line=mysql_fetch_array($this->result)){
				$line['dateok']=date('d.m.y',$line['dateok']);
				$line['date']=date('d.m.y',$line['date']);
				return $line;
			}else return false;
		}		
		function moneyoutput(){
			$sql="SELECT * FROM $this->tableout WHERE login='$this->login' and status='ok'";
			$this->sql($sql);
			$sum=0;
			while(@$line=mysql_fetch_array($this->result)){
				$sum+=$line['money'];
			}
			return round($sum,2);
		}
		function eachmoneyoutput($i){
			$sql="SELECT * FROM $this->tableout WHERE login='$this->login'";
			if($i==0)$this->sql($sql);
			$sum=0;
			if(@$line=mysql_fetch_array($this->result)){
				$line['dateok']=date('d.m.y',$line['dateok']);
				$line['date']=date('d.m.y',$line['date']);
				return $line;
			}else return false;
		}		
		function refinput($level){
			$sql="SELECT * FROM $this->tableout WHERE login='$this->login' and status='ok'";
			$this->sql($sql);
			$sum=0;
			while(@$line=mysql_fetch_array($this->result)){
				$sum+=$line['money'];
			}
			return $sum;
		}
		function referalmoney($loginref){
			$sql="SELECT * FROM $this->tablein WHERE login='$loginref' and status='ok'";
			$this->sql($sql);
			$sum=0;
			while($line=mysql_fetch_array($this->result)){
				$sum+=$line['money'];
			}
			if(@in_array($loginref, $this->referals1))return $sum*0.07;
			elseif(@in_array($loginref,$this->referals2))return $sum*0.01;
			elseif(@in_array($loginref, $this->referals3))return $sum*0.005;
			elseif(@in_array($loginref, $this->referals4))return $sum*0.003;
			elseif(@in_array($loginref, $this->referals5))return $sum*0.001;
			else return 0;
		}
		function fullstat(){
			$sql="SELECT * FROM $this->table_p WHERE uid='$this->id' ORDER BY date DESC";
			$this->sql($sql);
			$ret=array();
			while($line=$this->line()){
				$line['date']=date('d.m.Y', $line['date']);
				$ret[]=$line;
			}
			return $ret;
		}
		function refnum($level){
			switch($level){
				case 1:return sizeof($this->referals1);break;
				case 2:return sizeof($this->referals2);break;
				case 3:return sizeof($this->referals3);break;
				case 4:return sizeof($this->referals4);break;
				case 5:return sizeof($this->referals5);break;
				default:return sizeof($this->referals1);break;
			}
		}
	}
?>
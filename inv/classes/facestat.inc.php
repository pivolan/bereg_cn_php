<?php
	//require_once("const.inc");
	require_once('mysql.inc.php');
	class _Facestat_overall extends app_mysql{
		public $id, $ai, $nk,$rk,$od,$vs,$ks,$os,$date,$rand;
		protected $us,$do,$wo,$ge,$ov,$ko,$st,$names,$table="overall";
		function check_table(){
			$sql="SELECT count(*) FROM $this->table";
			if(!(mysql_query($sql)))return -1;else {$this->sql($sql);
			return $this->num();}
		}
		function names(){
			$temp = "
			ai-Активных инвесторов
			nk-Нерабочий капитал
			rk-Рабочий капитал
			od-Общий доход инвесторов
			vs-Всего снятий
			ks- Комиссионных
			os- Объем стабфонда
			";
			$names['ai']="Активных инвесторов";
			$names['nk']="Нерабочий капитал";
			$names['rk']="Рабочий капитал";
			$names['od']="Общий доход инвесторов";
			$names['vs']="Всего снятий";
			$names['ks']="Комиссионных";
			$names['os']="Объем стабфонда";
		}
		////////////////// Создать базу
		function create_db(){
			$sql="DROP TABLE IF EXISTS $this->table";
			$this->sql($sql);
			$sql="
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  ai double,nk double,rk double,od double,vs double,ks double,os double,date int,
				  PRIMARY KEY  (id)
				)";
			$this->sql($sql);
		}
		///////////////// Заполнить базу если пустая
		function start(){
			$date=mktime(0,0,0,date('m'),date('d')-1);
			$u=1357;
			$n=6000.06;
			$r=74473.38;
			$o=42943.39;
			$v=30660.65;
			$k=4142.36;
			$s=559.17;
			$sql="INSERT INTO $this->table (ai,nk,rk,od,vs,ks,os,date)
				VALUES ('$u', '$n','$r','$o','$v','$k','$s','$date')";
			$this->sql($sql);
			$this->init();
		}
		//////////////// Забрать переменные из базы
		function init(){
			$sql="SELECT * FROM $this->table ORDER BY date DESC LIMIT 1";
			$this->sql($sql);
			if(!$this->num()) $this->start();
			while($line=$this->line()){
				$this->id=$line['id'];
				$this->ai=$line['ai'];
				$this->nk=round($line['nk'],2);
				$this->rk=round($line['rk'],2);
				$this->od=round($line['od'],2);
				$this->vs=round($line['vs'],2);
				$this->ks=round($line['ks'],2);
				$this->os=round($line['os'],2);
				$this->date=$line['date'];

				$this->random();
			}
		}
		/////////////////// Сгенерировать новые данные на следующий день. Без базы
		function random(){
			$this->us=$this->ai+mt_rand(5,24);
			$rand=mt_rand(101,106)/100;
			$this->do=$this->nk*$rand;
			$this->wo=$this->rk*$rand;
			$this->ge=$this->od*$rand;
			$this->ov=$this->vs*mt_rand(100,105)/100;
			$this->ko=$this->ks*$rand;
			$this->st=$this->os*$rand;
		}
		////////////////////// Добавить новые данные в базу.
		function add(){
			$date=mktime(0,0,0,date('m'),date('d')-1);
			$this->init();
			if($date!=$this->date){
				$this->random();
				$sql="INSERT INTO $this->table (ai,nk,rk,od,vs,ks,os,date)
				VALUES ('$this->us', '$this->do','$this->wo','$this->ge',
				'$this->ov','$this->ko','$this->st','$date')";
				$this->sql($sql);
				$this->init();
			}
		}
		function add_d($date1){
			$date=strtotime($date1." day 0:0:0");
			$sql="SELECT id FROM $this->table WHERE date='$date'";
			$this->sql($sql);
			$this->random();
			if(!$this->num()){
				$sql="INSERT INTO $this->table (ai,nk,rk,od,vs,ks,os,date)
				VALUES ('$this->us', '$this->do','$this->wo','$this->ge',
				'$this->ov','$this->ko','$this->st','$date')";
				$this->sql($sql) or die(mysql_error());
				$this->init();
			}
		}
		function show(){
			$date=date("d.m.Y",$this->date);
			echo "<br />
				<b>$date</b>=Дата<br />
				\$$this->id=ID<br />
				\$$this->ai=Активных инвесторов<br />
				\$$this->nk=Нерабочий капитал<br />
				\$$this->rk=Рабочий капитал<br />
				\$$this->od=Общий доход инвесторов<br />
				\$$this->vs=Всего снятий<br />
				\$$this->ks=Комиссионных<br />
				\$$this->os=Объем стабфонда<br />
				";
		}
	}

	class _Facestat_percent  extends app_mysql{
		public $id,$p,$i,$o,$k,$z,$r,$s,$date,$dateformatted;
		protected $table="percent", $names,$p1,$i1,$o1,$k1,$z1,$r1,$s1;
		function create_db(){
			$sql="DROP TABLE IF EXISTS $this->table";
			$this->sql($sql);
			$sql="
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  p float,i float,o float,k float,z float,r float,s float,date int,
				  PRIMARY KEY  (id)
				)";
			$this->sql($sql);
		}
		function names(){
			$temp = "
			p-Профит по вилкам
			i-Использовано капитала
			o-Общий капитал
			k-Капитал инвесторов
			z-Заработок "._COMPANY."
			r- Счет для расходов
			s- Стабфонд
			";
			$names['p']="Профит по вилкам";
			$names['i']="Использовано капитала";
			$names['o']="Общий капитал";
			$names['k']="Капитал инвесторов";
			$names['z']="Заработок "._COMPANY;
			$names['r']="Счет для расходов";
			$names['s']="Стабфонд";
		}
		function start(){
			$date=mktime(0,0,0,date('m'),date('d')-1);
			$p=rand(200,700)/100;
			$i=rand(86,95);
			$o=$p*$i/100;
			$k=$o*0.5;
			$z=$o*0.3;
			$r=$o*0.2;
			$s=$o*0.1;
			$sql="INSERT INTO $this->table (p,i,o,k,z,r,s,date)
				VALUES ('$p', '$i','$o','$k','$z','$r','$s','$date')";
			$this->sql($sql);
			$kkk=$k/100;
			$kk=$k/100+1;//update money for users
			$sql3="INSERT INTO users_percent (uid, money, date, oldmoney, percent) 
			SELECT users.id, users.money*$kkk, '$date', users.money*$kk, '$k' FROM users";
			$this->sql($sql3);
			$sql2="UPDATE users SET money=money*$kk";
			$this->sql($sql2);
			$this->init();
		}
		function init(){
			$sql="SELECT * FROM $this->table ORDER BY date DESC LIMIT 1";
			$this->sql($sql);
			if(!$this->num()) $this->start();
			else
			while($line=$this->line()){
				$this->id=$line['id'];
				$this->p=round($line['p'],2);
				$this->i=round($line['i']);
				$this->o=round($line['o'],2);
				$this->k=round($line['k'],2);
				$this->z=round($line['z'],2);
				$this->r=round($line['r'],2);
				$this->s=round($line['s'],2);
				$this->date=$line['date'];
				$this->dateformatted=date("d.m.Y",$this->date);
				
			}
		}
		function getall(){
			$sql="SELECT * FROM $this->table ORDER BY id DESC";
			$this->sql($sql);			
		}
		function next(){
			if($line=$this->line()){
				$this->id=$line['id'];
				$this->p=round($line['p'],2);
				$this->i=round($line['i']);
				$this->o=round($line['o'],2);
				$this->k=round($line['k'],2);
				$this->z=round($line['z'],2);
				$this->r=round($line['r'],2);
				$this->s=round($line['s'],2);
				$this->date=$line['date'];
				$this->dateformatted=date("d.m.Y",$this->date);
				return true;
			}else return false;
		}
		function add(){
			$date=mktime(0,0,0,date('m'),date('d')-1);
			$this->init();
			if($date!=$this->date){
				$this->start();
			}
		}
		function add_d($d){
			$date1=strtotime($d." day 0:0:0");
			$sql="SELECT id FROM $this->table WHERE date='$date1'";
			$this->sql($sql);
			if(!$this->num()){
				$p=rand(200,700)/100;
				$i=rand(86,95);
				$o=$p*$i/100;
				$k=$o*0.5;
				$z=$o*0.3;
				$r=$o*0.2;
				$s=$o*0.1;
				$sql="INSERT INTO $this->table (p,i,o,k,z,r,s,date)
					VALUES ('$p', '$i','$o','$k','$z','$r','$s','$date1')";
				$this->sql($sql);
				$this->init();
			}
		}
		function show(){
			//$date=date("d.m.Y",$this->date);
			return "<br />
				$date=\$this->dateformatted;<br />
				$this->p%-Профит по вилкам<br />
				$this->i%-Использовано капитала<br />
				$this->o%-Общий капитал<br />
				$this->k%-Капитал инвесторов<br />
				$this->z%-Заработок "._COMPANY."<br />
				$this->r%- Счет для расходов<br />
				$this->s%- Стабфонд<br />";

		}
		function check_table(){
			$sql="SELECT count(*) FROM $this->table";
			if(!(mysql_query($sql)))return -1;else {$this->sql($sql);
			return $this->num();}
		}
	}
	class _Facestat_top extends app_mysql{
		public $k,$date;
		protected $table="percent";
		function init(){
			$sql="SELECT k,date FROM $this->table ORDER BY date DESC LIMIT 10";
			$this->sql($sql);
			while($line=$this->line()){
				$this->k[]=round($line['k'],2);
				$this->date[]=$line['date'];
			}
		}
		function kap($i){
			return "+".$this->k[$i]."%";
		}
		function datex($i){
			return date("d.m",$this->date[$i]);
		}
		function show(){
			$temp="<table><tr>";
			for($i=1;$i<=10&&isset($this->k[$i]);$i++){
				$temp.="<td>".$this->datex($i)."<br>".$this->kap($i)."</td>";
			}
			$temp.="</tr></table>";
			return $temp;
		}
		function show_month(){
			$sql="SELECT k FROM $this->table ORDER BY date DESC LIMIT 30";
			$this->sql($sql);
			$k=0;
			while($line=$this->line()){
				$k+=round($line['k'],1);
			}
			return $k;
		}
	}
?>
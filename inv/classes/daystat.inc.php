<?php
	//require_once("const.inc");
	require_once('mysql.inc.php');
	class _Daystat extends app_mysql{
		public $id, $dv, $rt,$gm,$q1,$q2,$q3,$w1,$w2,$w3,$tv,$date,$rand,$code,$match,$dateformatted;
		protected $kontors=array(
			'Bwin',
			'Bet365',
			'Expekt',
			'Pinnacle',
			'Sportingbet',
			'Gamebookers',
			'Bet-at-home',
			'Unibet',
			'Interwetten',
			'WilliamHILL',
			'БК Леон',
			'Бетсити',
			'Фаворит',
			'Марафон',
			'Пари-матч',
			'Фон',
			'Шанс'
		);//17
		protected $vilkers=array(
			'1 – X – 2',
			'Ф1(-0.5) – X – 2',
			'1 – X – Ф2(-0.5)',
			'Ф1(-0.5) – X – Ф2(-0.5)',
			'1X – 12 – X2',
			'Ф1(0.0) – X – 2',
			'Ф2(0.0) – X – 1',
			'Ф1(0.0) – X2 – 2',
			'Ф2(0.0) – 1X – 1',
			'Ф1(-0.25) – X – 2',
			'Ф2(-0.25) – X – 1',
			'Ф1(-0.25) – X2 – 2',
			'Ф2(-0.25) – 1X – 1',
			'Ф1(0.25) – X – 2',
			'Ф2(0.25) – X – 1',
			'Ф1(0.25) – X2 – 2',
			'Ф2(0.25) – 1X – 1',
			'Ф1(-0.25) – X – Ф2(0.0)',
			'Ф2(-0.25) – X – Ф1(0.0)',
			'Ф1(-0.25) – X2 – Ф2(0.0)',
			'Ф2(-0.25) – 1X – Ф1(0.0)',
			'Ф1(-0.25) – X – Ф2(-0.25)',
			'Ф1(-0.25) – X2 – Ф2(-0.25)',
			'Ф2(-0.25) – 1X – Ф1(-0.25)',
			'Ф1(0.0) – Ф2(0.25) – 2',
			'Ф2(0.0) – Ф1(0.25) – 1',
			'Ф1(0.0) – X2 – Ф2(-0.25)',
			'Ф2(0.0) – 1X – Ф1(-0.25)',
			'Ф1(0.25) – Ф2(0.0) – 2',
			'Ф2(0.25) – Ф1(0.0) – 1',
			'Ф1(0.25) – 12 – X2',
			'Ф2(0.25) – 12 – 1X',
			'Ф1(0.25) – 12 – Ф2(0.25)',
			'Ф1(0.0) – 12 – X2',
			'Ф2(0.0) – 12 – 1X',
			'Ф1(0.0) – 12 – Ф2(0.25)',
			'Ф2(0.0) – 12 – Ф1(0.25)',
			'Тб(2.0) – Тм(2.5) – Тм(1.5)',
			'Тм(2.0) – Тб(1.5) – Тб(2.5)',
			'Тб(2.25) – Тм(2.5) – Тм(1.5)',
			'Тм(1.75) – Тб(1.5) – Тб(2.5)',
			'Тб(1.75) – Тм(2.5) – Тм(1.5)',
			'Тм(2.25) – Тб(1.5) – Тб(2.5)',
			'Тм(1.75) – Тб(1.5) – Тб(2)',
			'Тб(2.25) – Тм(2.5) – Тм(1.75)',
			'Тб(2.0) – Тм(2.25) – Тм(1.5)',
			'Тм(2.0) – Тб(1.75) – Тб(2.5)',
			'Тб(2.0) – Тм(2.5) – Тм(1.75)',
			'Тм(2.0) – Тб(1.5) – Тб(2.25)',
			'Тб(1.75) – Тм(2.0) – Тм(1.5)',
			'Тм(2.25) – Тб(1.75) – Тб(2.5)',
		);//51
		protected $names,$table="day_stat";
		protected $url='http://betteam.ru/scores.php?sdvig=1&mode=1', 
				  $preg='/(?<=6 size=2\>)(.*?)(?=\<).*?(?<=e size=2\>)(.*?)(?=\d|\<)/i';
		
		function fillvar($s){
			$this->dv=rand(100,800)/100;
			$this->rt=iconv("windows-1251","utf-8",$this->match[1][$s]);
			$this->gm=iconv("windows-1251","utf-8",$this->match[2][$s]);
			$this->q1=$this->kontors[rand(0,16)];
			$this->w1=round(rand(250,900)/100*rand(500,1000)/1000,2);
			$this->q2=$this->kontors[rand(0,16)];
				while($this->q2==$this->q1) $this->q2=$this->kontors[rand(0,16)];
			$this->w2=round(rand(250,900)/100*rand(500,1000)/1000,2);
			$this->q3=$this->kontors[rand(0,16)];
				while($this->q3==$this->q1||$this->q3==$this->q2) $this->q3=$this->kontors[rand(0,16)];
			$this->w3=round(rand(250,900)/100*rand(500,1000)/1000,2);
			$this->tv=$this->vilkers[rand(0,50)];
			if(empty($this->rt)||empty($this->gm))return false; else return true;
		}
		function names(){
			$temp = "
			dv-Доход по вилке
			rt-Категория
			gm-Игра
			q1-Контора 1
			w1-Исход 1
			q2- Контора 2
			w2- Исход 2
			q3- Контора 3
			w3- Исход X
			tv - Тип вилки
			";
			$this->names['dv']="Доход по вилке";
			$this->names['rt']="Категория";
			$this->names['gm']="Игра";
			$this->names['q1']="Контора 1";
			$this->names['w1']="Исход 1";
			$this->names['q2']="Контора 2";
			$this->names['w2']="Исход 2";
			$this->names['q3']="Контора 3";
			$this->names['w3']="Исход X";
			$this->names['tv']="Тип вилки";
			return $this->names;
		}
		////////////////// Создать базу
		function create_db(){
			$sql="DROP TABLE IF EXISTS $this->table";
			$this->sql($sql);
			$sql="
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  dv float,rt char(255),gm char(255), q1 char(255),q2 char(255),
				  q3 char(255), w1 float,w2 float,w3 float,tv char(255), date int,
				  PRIMARY KEY  (id)
				)";
			$this->sql($sql);
		}
		////////////////// Демо показ таблицы
		function demo(){
			$this->code=file_get_contents($this->url);
			$names=$this->names();
			preg_match_all($this->preg,$this->code,$this->match);
			//print_r($this->match);
			echo "<table border=1>";
			echo "<tr>
				<td>number</td>
				<td>$names[dv]</td>
				<td>$names[rt]</td>
				<td>$names[gm]</td>
				<td>$names[q1]</td>
				<td>$names[w1]</td>
				<td>$names[q2]</td>
				<td>$names[w2]</td>
				<td>$names[q3]</td>
				<td>$names[w3]</td>
				<td>$names[tv]</td>
				</tr>";
			for($i=0,$n=1;!empty($this->match[0][$i]);$i++){
				if($this->fillvar($i)){
					echo "
						<tr>
						<td>$n &nbsp;</td>
						<td>$this->dv &nbsp;</td>
						<td>$this->rt &nbsp;</td>
						<td>$this->gm &nbsp;</td>
						<td>$this->q1 &nbsp;</td>
						<td>$this->w1 &nbsp;</td>
						<td>$this->q2 &nbsp;</td>
						<td>$this->w2 &nbsp;</td>
						<td>$this->q3 &nbsp;</td>
						<td>$this->w3 &nbsp;</td>
						<td>$this->tv &nbsp;</td>
						</tr>";
					$n++;
				}
			}
			echo "</table>";
		}
		///////////////// Заполнить базу если пустая
		function generate(){
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
				$this->dateformatted=date('d.m.Y',$this->date);
				$this->random();
			}
		}
		function getprev($n){
			if(empty($n))$n=1;
			if((is_numeric($n)&&$n>0)){
				$n=round($n);
				$n=($n+2)*2;
				$n=$n/2-2;
				$date=mktime(0,0,0,date('m'),date('d')-$n);
				$this->date=$date;
				$this->dateformatted=date('d.m.Y',$this->date);
			}else return false;
			$sql="SELECT * FROM $this->table WHERE date='$date'";
			$this->sql($sql);
		}
		function getdate($d){
			if(empty($d)) {$this->getprev(); return true;}
			if((is_numeric($d)&&$d>0)){

				$this->date=$d;
				$this->dateformatted=date('d.m.Y',$this->date);
			}else return false;
			$sql="SELECT * FROM $this->table WHERE date='$this->date'";
			$this->sql($sql);
			return true;
		}
		function next(){
			if(!empty($this->result)){
				if($line=$this->line()){
					$this->dv=$line['dv'];
					$this->rt=$line['rt'];
					$this->gm=$line['gm'];
					$this->q1=$line['q1'];
					$this->w1=$line['w1'];
					$this->q2=$line['q2'];
					$this->w2=$line['w2'];
					$this->q3=$line['q3'];
					$this->w3=$line['w3'];
					$this->tv=$line['tv'];
					$this->date=$line['date'];
					$this->dateformatted=date('d.m.Y',$this->date);
					return true;
				}else return false;
			}else return false;
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
			$sql="SELECT date FROM $this->table ORDER BY date DESC LIMIT 1";
			$this->sql($sql);
			$act=false;
			if($this->num()<1)
				$act=true; 
			elseif($line=$this->line())
				if($line['date']!=$date)
					$act=true;
			if($act==true){
				$this->code=file_get_contents($this->url);
				preg_match_all($this->preg,$this->code,$this->match);
				for($i=0,$n=1;!empty($this->match[0][$i]);$i++){
					if($this->fillvar($i)){
						$sql="INSERT INTO $this->table (dv,rt,gm,q1,w1,q2,w2,q3,w3,tv,date)
						VALUES ('$this->dv','$this->rt','$this->gm','$this->q1','$this->w1','$this->q2',
								'$this->w2','$this->q3','$this->w3','$this->tv','$date')";
						$this->sql($sql);
						$n++;
					}
				}
			}
		}
		function add_date_random($date){
			$date=mktime(0,0,0,date('m'),date('d')-1);
			$sql="SELECT * FROM $this->table where date<>'$date'";
			$this->sql($sql);
			
			for($i=0,$n=1;!empty($this->match[0][$i]);$i++){
				if($this->fillvar($i)){
					$sql="INPUT INTO $this->table (dv,rt,gm,q1,w1,q2,w2,q3,w3,tv,date)VALUES '$this->dv','$this->rt','$this->gm','$this->q1','$this->w1','$this->q2','$this->w2','$this->q3','$this->w3','$this->tv','$date')";
					$n++;
				}
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
		function check_table(){
			$sql="SELECT count(*) FROM $this->table";
			if(!(mysql_query($sql)))return -1;else {$this->sql($sql);
			return $this->num();}
		}
	}
?>
<?php
	class _News extends app_mysql{
		public $id,$text,$title,$url,$date,$date2,$login;
		protected $table="news";
		function init(){
			if($new = func_get_args()) $this->sql("SELECT * FROM $this->table WHERE id='$new[0]'");
			else $this->sql("SELECT * FROM $this->table");
			$this->reset1();
		}
		function initelse($where){
			$this->sql("SELECT * FROM $this->table WHERE ".$where);
		}
		function short($ii){
			$text_i='';
			$str=strip_tags($this->text);
			$text=explode(' ',$this->text);
			for($i=0;$i<$ii&&$text[$i]!='';$i++){
				$text_i.="$text[$i] ";
			}
			return $text_i;
		}
		function search($ii, $search){
			$text_i='';
			$str=strip_tags($this->text);
			$numstart=mb_strpos($this->text, $search,0, 'UTF-8');
			$numstop=mb_strrpos($this->text, $search,0, 'UTF-8');
			$numstart-=($ii+24);
			if($numstart<0)$numstart=0;
			$numstop+=($ii+7+mb_strlen($search, 'UTF-8'));
			if($numstop>mb_strlen($this->text, 'UTF-8'))$numstop=mb_strlen($this->text, 'UTF-8');

			$len=$numstop-$numstart;
			$text=mb_substr($this->text,$numstart,$len, 'UTF-8');
			return "$text ...";
		}
		function one(){
			if($article = func_get_args()){
				$this->sql("SELECT * FROM $this->table WHERE name='$article[0]'");
			}
			if($line=$this->line()){
				$this->id=$line['id'];
				$this->text=$line['text'];
				$this->title=$line['title'];
				$this->date2=$line['date'];
				$this->login=$line['login'];
				$this->date=date("m.d.Y h:i:s",$line['date']);
				$this->url="news.php?id=$line[id]";
				return true;
			}else return false;
		}
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  date int,title char(255) NOT NULL,
				  text text NOT NULL,login char(255) NOT NULL,
				  PRIMARY KEY (id)
				)");
		}
		function first_start(){
			$date=mktime();
			$this->sql("INSERT INTO $this->table (login,text,title,date) VALUES ('admin','Это просто текст
			наполнение самой категории и то что здесь будет
			написано никакого смысла в этом нет и быть не может.',
			'Термопласт автомат',$date)");
		}
		function add($POST){
			$date=$POST['date']?strtotime($POST['date']):mktime();
			$POST['title']=strip_tags($POST['title']);
			$this->sql("INSERT INTO $this->table (date,title,text) VALUES ('$date',
			'$POST[title]','$POST[text]')");
		}
		function edit($POST){
			$POST['title']=strip_tags($POST['title']);
			$this->sql("UPDATE $this->table SET date='$POST[date]',title='$POST[title]',
			text='$POST[text]',login='$POST[login]' WHERE id='$POST[id]'");
		}
		function deleteid($id){
			$this->sql("DELETE FROM $this->table WHERE id='$id' LIMIT 1");
		}
	}
?>
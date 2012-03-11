<?php
	class _Pages extends app_mysql{
		public $id,$title,$text,$date, $login, $name;
		protected $table='pages', $error;
		function init($act){
			$this->sql("SELECT * FROM $this->table WHERE name='$act'");
		}
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  title char(255), text text NOT NULL DEFAULT '',login char(255), name char(255), date int,
				  PRIMARY KEY (id)
				)");
		}
		function initelse($where){
			$this->sql("SELECT * FROM $this->table WHERE ".$where);
		}
		function one(){
			if($cat = func_get_args()){
				$this->sql("SELECT * FROM $this->table WHERE name='$cat[0]'");
			}
			if($line=$this->line()){
				$this->id=$line['id'];
				$this->name=$line['name'];
				$this->text=$line['text'];
				$this->title=$line['title'];
				$this->url="index.php?act=$line[name]";
				$this->date=$line['date'];
				$this->login=$line['login'];
				return true;
			}else return false;
		}
		function show(){
			if($_GET['act']=='')$_GET['act']='main';
			$sql="SELECT * FROM pages WHERE name='$_GET[act]'";
			$result=mysql_query($sql);
			$line=mysql_fetch_array($result);
			if($line==''){
				$sql="SELECT * FROM pages WHERE name='main'";
				$result=mysql_query($sql);
				$line=mysql_fetch_array($result);
			}
			echo "<h1>$line[title]</h1>";
			echo $line['text'];
		}
		function update($post){
			$this->verify_update($post);
			if(empty($this->error)){
				$text=strip_tags($post['text'],'<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody>');
				$title=strip_tags($post['title']);
				$name=ruslat($post['name']);
				$date=mktime();
				$this->sql("UPDATE $this->table SET text='$text', title='$title', name='$name', date='$date' WHERE id='$post[id]'");
				return 'Изменения произведены успешно';
			}else{
				return $this->error;
			}
		}
		function verify_update($post){
			$this->error=NULL;
			if(!isset($post))$this->error.='Нет данных для обработки';
			if(!isset($post['id']))$this->error.='Не заполнено поле ID';
			if(!isset($post['title']))$this->error.='Не заполнено поле TITLE';
			if(!isset($post['text']))$this->error.='Не заполнено поле TEXT';
			if($post['act']!=$this->table)$this->error.='Нет подтверждения редактирования этого раздела страниц';
		}
		function numall(){
			$this->sql("SELECT count(*) FROM $this->table");
			$num=$this->line();
			return $num[0];
		}
	}//				End Class app_page
?>
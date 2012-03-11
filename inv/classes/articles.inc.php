<?php
	require_once('mysql.inc.php');
	class _Article extends _Sqlite{
		public $id,$name,$icon,$text,$title,$url,$date,$date2,$parent;
		protected $table="article";
		function init(){
			if($article = func_get_args()) $this->sql("SELECT * FROM $this->table WHERE id='$article[0]'");
			else $this->sql("SELECT * FROM $this->table ORDER BY date");
			$this->reset1();
		}
		function initelse($where){
			$this->sql("SELECT * FROM $this->table WHERE ".$where);
		}
		function one(){
			if($article = func_get_args()){
				$this->sql("SELECT * FROM $this->table WHERE id='$article[0]'");
			}
			if($line=$this->line()){
				$this->id=$line['id'];
				$this->name=$line['name'];
				$this->icon=$line['icon'];
				$this->text=$line['text'];
				$this->title=$line['title'];
				$this->date2=$line['date'];
				$this->active=$line['active'];
				$this->cat=$line['category'];
				$this->subcat=$line['subcat'];
				$this->parent=$line['parent'];
				$desc=explode('</p>',$this->text);
				$this->desc=$desc[0];
				$this->date=date("m.d.Y h:i:s",$line['date']);
				$this->url="&article=$line[name]";
				return true;
			}else return false;
		}
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  active ENUM('on','off') DEFAULT 'on',date int,
				  login char(255) NOT NULL,name char(255) NOT NULL,icon char(255) NOT NULL,
				  text text NOT NULL,title char(255) NOT NULL, parent INT,
				  PRIMARY KEY (id)
				)");
		}
		function first_start(){
			$date=mktime();
			$this->sql("INSERT INTO $this->table (name,text,title,date,category) VALUES ('test-name','Это просто текст
			наполнение самой категории и то что здесь будет
			написано никакого смысла в этом нет и быть не может.',
			'Термопласт автомат',$date,'tpautomat')");
		}
		function add($POST){
				$title=strip_tags($POST['title']);
				$text=strip_tags($POST['text'],"<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody><br><ol><li><ul>");
				$category=strip_tags($POST['category']);
				$subcat=strip_tags($POST['subcat']);
				$parent=strip_tags($POST['parent']);
				if($POST['active']=='on')$active=$POST['active'];
				else $active='off';
				$date=mktime();
				if(empty($POST['name']))$POST['name']=ruslat($POST['title']);
				$name=strip_tags($POST['name']);
				$icon=strip_tags($POST['icon'],'<img>');
/*			mkdir("../content/".$POST['name']) or die("Ошибка записи");
			$r=fopen("../content/$POST[name]/index.php",'wt') or die();
			fwrite($r,stripcslashes($POST['text']));
			fclose($r);
			chmod("../content/$POST[name]/index.php",0666);*/
			$this->sql("INSERT INTO $this->table (date,title,text,login,name,icon,category, subcat, parent) VALUES ('$date',
			'$title','$text','$POST[login]','$name','$icon','$category', '$subcat', '$parent')");
			return 'Изменения произведены успешно';
		}
		function update($POST){
			$this->verify_update($POST);
			if(empty($this->error)){
				$title=strip_tags($POST['title']);
				$text=strip_tags($POST['text'],"<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody><br><ol><li><ul>");
				$category=strip_tags($POST['category']);
				$subcat=strip_tags($POST['subcat']);
				$parent=strip_tags($POST['parent']);
				$active=($POST['active']=='on')?'on':'off';
				$date=mktime();
				if(empty($POST['name']))$POST['name']=ruslat($POST['title']);
				$name=strip_tags($POST['name']);
				$icon=strip_tags($POST['icon'],'<img>');
	/*			if($POST['name']!=$POST['oldname']){
					mkdir("../content/".$POST['name']);
					unlink("../content/$POST[oldname]/index.php");
					rmdir("../content/$POST[oldname]");
				}
				$r=fopen("../content/$POST[name]/index.php",'wt') or die();
				fwrite($r,stripcslashes($POST['text']));
				fclose($r); */
				$this->sql("UPDATE $this->table SET date='$date',title='$title',
				text='$text', name='$name', icon='$icon', active='$active',
				category='$category', subcat='$subcat', parent='$parent' WHERE id='$POST[id]'");
				return 'Изменения произведены успешно';
			}elseif($POST['id']==0&&$POST['add']=='add'&&$this->error=='Не заполнено поле ID'){
				return $this->add($POST);
			}else return $this->error;
		}
		function verify_update($post){
			$this->error=NULL;
			if(!isset($post))$this->error.='Нет данных для обработки';
			if(!isset($post['id'])||$post['id']==0)$this->error.='Не заполнено поле ID';
			if(!isset($post['title']))$this->error.='Не заполнено поле TITLE';
			if(!isset($post['text']))$this->error.='Не заполнено поле TEXT';
			if($post['act']!=$this->table)$this->error.='Нет подтверждения редактирования этого раздела страниц';
		}
		function deleteid($id){
			$this->sql("DELETE FROM $this->table WHERE id='$id' LIMIT 1");
		}
		function parent(){
			if($article = func_get_args()){ 
				$this->sql("SELECT * FROM $this->table WHERE id='$article[0]'");
				$this->one();
				$this->sql("SELECT * FROM $this->table WHERE id='$this->parent'");
			}else $this->sql("SELECT * FROM $this->table WHERE id='$this->parent'");
			$this->reset1();
		}
	}
?>
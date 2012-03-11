<?php
	class _Content extends app_mysql{
		public $id,$name,$icon,$text,$title,$url,$date,$date2,$parent, $parents, $childs, $folder, $createdby;
		protected $table="content";
		function init(){
			if($where = func_get_args()) $this->sql("SELECT * FROM $this->table WHERE ".$where[0]);
			else $this->sql("SELECT * FROM $this->table");
		}
		function one(){
			if($where = func_get_args()){
				$this->sql("SELECT * FROM $this->table WHERE ".$where[0]);
			}
			if($line=$this->line()){
				$this->id=$line['id'];
				$this->name=$line['name'];
				$this->icon=$line['icon'];
				$this->text=$line['text'];
				$this->title=$line['title'];
				$this->date2=$line['date'];
				$this->active=$line['active'];
				$this->parent=$line['parent'];
				$this->parents=explode(' ',$line['parents']);
				$this->childs=explode(' ',$line['childs']);
				$this->date=date("m.d.Y h:i",$line['date']);
				$this->url="$_SERVER[PHP_SELF]?id=$this->id";
				return true;
			}else return false;
		}
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  active ENUM('0','1') DEFAULT '0',date int,
				  createdby int DEFAULT '0',name char(255) NOT NULL,icon char(255) NOT NULL,
				  text text NOT NULL,title char(255) NOT NULL, parent int DEFAULT '0',
				  parents char(255) NOT NULL,
				  childs int DEFAULT '0', folder ENUM('0','1') DEFAULT '0',
				  PRIMARY KEY (id)
				)");
		}
		function first_start(){
			$date=mktime();
			$this->sql("INSERT INTO $this->table (name,text,title,date) VALUES ('test-name','Это просто текст
			наполнение самой категории и то что здесь будет
			написано никакого смысла в этом нет и быть не может.',
			'Термопласт автомат',$date)");
		}
		function add($post){
			$pcontent=new app_content;
			$pcontent->one("id='$post[parent]'");

			$title=strip_tags($post['title']);
			$text=strip_tags($post['text'],$TAGS_STRIP);
			$parent=is_numeric($post['parent'])?$post['parent']:0;
			$parents=$pcontent->parents[0]!=0?"$parent ".implode(' ',$pcontent->parents):$parent;
			$createdby=is_numeric($post['createdby'])?$post['createdby']:0;
			$date=mktime();
			if(empty($post['name']))$post['name']=ruslat($post['title']);
			$name=strip_tags($post['name']);
			$icon=strip_tags($post['icon']);
			$this->sql("INSERT INTO $this->table (date,title,text,name,icon,parent, parents, createdby) VALUES ('$date',
			'$title','$text','$name','$icon', '$parent', '$parents', '$createdby')");
			$pcontent->set_update("folder='1', childs=childs+'1'");
			return 'Изменения произведены успешно';
		}
		function set_update($set){
			$this->sql("UPDATE $this->table SET ".$set." WHERE id='$this->id'");
			return 0;
		}
		function update($post){
			$this->verify_update($post);
			if(empty($this->error)){
				$title=strip_tags($post['title']);
				$text=strip_tags($post['text'],'<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody>');
				$category=strip_tags($post['category']);
				$subcat=strip_tags($post['subcat']);
				$parent=strip_tags($post['parent']);
				if($post['active']=='on')$active=$post['active'];
				else $active='off';
				$date=mktime();
				if(empty($post['name']))$post['name']=ruslat($post['title']);
				$name=strip_tags($post['name']);
				$icon=strip_tags($post['icon'],'<img>');
	/*			if($POST['name']!=$POST['oldname']){
					mkdir("../content/".$POST['name']);
					unlink("../content/$POST[oldname]/index.php");
					rmdir("../content/$POST[oldname]");
				}
				$r=fopen("../content/$POST[name]/index.php",'wt') or die();
				fwrite($r,stripcslashes($POST['text']));
				fclose($r); */
				$this->sql("UPDATE $this->table SET date='$date',title='$title',
				text='$text', name='$name', icon='$icon',
				parent='$parent', parents='$parents' WHERE id='$post[id]'");
				return 'Изменения произведены успешно';
			}elseif($post['id']==0&&$post['add']=='add'&&$this->error=='Не заполнено поле ID'){
				return $this->add($post);
			}else return $this->error;
		}
		function verify_post($post){
			$this->error=NULL;
			if(!isset($post))$this->error.='Нет данных для обработки';
			if(!isset($post['id'])||$post['id']==0)$this->error.='Не заполнено поле ID';
			if(!isset($post['title']))$this->error.='Не заполнено поле TITLE';
			if(!isset($post['text']))$this->error.='Не заполнено поле TEXT';
			if($post['act']!=$this->table)$this->error.='Нет подтверждения редактирования этого раздела страниц';
		}
		function deleteid($GET){
			$this->init($GET['id']);
			$this->one();
			$this->sql("DELETE FROM $this->table WHERE id='$GET[delete]' LIMIT 1");
			unlink("../content/$this->name/index.php");
			rmdir("../content/$this->name");
		}
	}
?>
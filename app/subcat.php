<?php
	class app_subcat extends app_mysql{
		public $id,$name,$title,$parent,$active, $icon;
		protected $table='subcat';
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  active ENUM('on','off') DEFAULT 'on',date int, icon char(255) NOT NULL,
				  name char(255) NOT NULL,title char(255) NOT NULL,parent char(255) NOT NULL,
				  text text NOT NULL,
				  PRIMARY KEY (id)
				)");
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
				$this->active=$line['active'];
				$this->parent=$line['parent'];
				$this->icon=$line['icon'];
				$desc=explode('</p>',$this->text);
				$this->desc=$desc[0];
				$this->date=date("m.d.Y h:i:s",$line['date']);
				$this->url="&subcat=$line[name]";
				return true;
			}else return false;
		}
		function first_start(){
			$date=mktime();
			$this->sql("INSERT INTO $this->table (name,text,title,date,parent)
			VALUES ('tpautomat','Описание категории. Длинный текст','Металлообработка',$date,'Оборудование')");
			$this->sql("INSERT INTO $this->table (name,text,title,date,parent)
			VALUES ('othod','Описание категории. Длинный текст','Перерабтка отходов',$date,'Оборудование')");
			$this->sql("INSERT INTO $this->table (name,text,title,date,parent)
			VALUES ('plast','Описание категории. Длинный текст','Переработка пластмасс',$date,'Оборудование')");
		}
		function init(){
			if($article = func_get_args()) $this->sql("SELECT * FROM $this->table WHERE id='$article[0]'");
			else $this->sql("SELECT * FROM $this->table");
			$this->reset1();
		}
		function initparent($parent){
			$this->sql("SELECT * FROM $this->table WHERE parent='$parent'");
		}
		function initelse($where){
			$this->sql("SELECT * FROM $this->table WHERE ".$where);
		}
		function add($POST){
			$date=mktime();
			$POST['title']=strip_tags($POST['title'],"<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody><br><ol><li><ul>");
			if(empty($POST['name'])){
				$POST['name']=app_common::ruslat($POST['title']);
				$POST['name'].=substr("_$POST[parent]", 3);
			}
			$this->sql("INSERT INTO $this->table (date,title,text,name, active, parent) VALUES ('$date',
			'$POST[title]','$POST[text]','$POST[name]','$POST[active]','$POST[parent]')");
			return true;
		}
		function update($POST){
			if($POST['id']==0){
				return $this->add($POST);
			}
			$POST['title']=strip_tags($POST['title']);
			if(empty($POST['name'])){
				$POST['name']=app_common::ruslat($POST['title']);
				$POST['name'].=substr("_$POST[parent]", 3);
			}
			$POST['text']=strip_tags($POST['text'],"<a><p><img><span><div><i><u><b><strong><em><sup><sub><blockquote><table><tr><td><th><tbody><br><ol><li><ul>");
			$this->sql("UPDATE $this->table SET title='$POST[title]',
			text='$POST[text]',name='$POST[name]', active='$POST[active]', parent='$POST[parent]',icon='$POST[icon]' WHERE id='$POST[id]'");
		}
		function deleteid($id){
			$this->sql("DELETE FROM $this->table WHERE id='$id' LIMIT 1");
		}
	}
?>
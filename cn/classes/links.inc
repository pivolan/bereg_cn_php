<?php
	class Linksleft extends app_mysql{
		public $id,$name,$url,$pageid,$title,$text,$number,$active, $position;
		protected $table='linkleft';
		public $cat;
		function create_db(){
			$this->sql("DROP TABLE IF EXISTS $this->table");
			$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  active char(255) NOT NULL,
				  pageid TINYINT(4), url char(255) NOT NULL, name char(255) NOT NULL,
				  number INT, position ENUM('left','top') DEFAULT 'left',
				  folder ENUM('0','1') DEFAULT '0', text TEXT NOT NULL,	title char(255) NOT NULL,	  
				  PRIMARY KEY (id)
				)");
		}
		function init(){
			$this->sql("SELECT * FROM $this->table ORDER BY number");
			if($par = func_get_args()){
				return true;
			}else
				return true;
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
				$this->url=$line['url'];
				$this->position="$line[position]";
				return true;
			}else return false;
		}
		function show_left(){
			$i=-1;
			$ii=1;
			while($this->one()==true){
				$url=$this->url();
				if($this->position=="left")echo "<a href=\"$url\" class=\"link_left$ii\">$this->title</a>";
				$ii=NULL;
			}
		}
		function width(){
			$this->sql("SELECT id FROM $this->table WHERE position='top'");
			return 142*$this->num()+30;
		}
		function show_top(){
			$category=new app_category;
			$i=-1;
			while($this->one()){
				$i++;
				$url=$this->url();
				if($this->position=="top"){
					echo "<li class=\"link\"><a href=\"$url\" class=\"link\">$this->title</a>\n";
					$category->initparent($this->title);
					if($category->num()){
						echo "<ul id=\"$this->title\" class=\"submenu\">\n";
						while($category->one()==true){
							echo "<li><a class=\"sublink\" href=\"$url$category->url\">$category->title</a></li>\n";
						}
						echo "</ul>\n";
					}
					echo "</li>\n";
				}
			}
		}
		function url(){
			if(empty($this->name)) $url1=$this->url;
			else $url1="index.php?act=".$this->name;
			return $url1;
		}
	}
?>

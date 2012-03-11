<?php
	class _Mysql{
		protected $result, $db;
		function sql($sql){
			$this->result=mysql_query($sql) or die(mysql_error());
			return $this->result;
		}
		function reset1(){
			if($this->num())
			mysql_data_seek($this->result,0);
		}
		function line(){
			return mysql_fetch_array($this->result);
		}
		function num(){
			return mysql_num_rows($this->result);
		}
		function lastid(){
			return mysql_insert_id();
		}
	}
	class _Sqlite{
		protected $result, $db,$file='invest.sqlite';
		function connect(){
			$this->db=sqlite_open($this->file);
		}
		function sql($sql){
			$this->result=sqlite_query($this->db,$sql) or die(sqlite_last_error($this->db));
		}
		function reset1(){
			if($this->num())
			sqlite_rewind($this->db);
		}
		function line(){
			return sqlite_fetch_array($this->result);
		}
		function num(){
			return sqlite_num_rows($this->result);
		}
		function lastid(){
			return sqlite_last_insert_rowid($db);
		}
	}
?>
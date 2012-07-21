<?php

class app_mysql
{
	protected $result;

	function sql($sql)
	{
		$this->result = mysql_query($sql) or die(mysql_error());
	}

	function reset1()
	{
		if ($this->num())
		{
			mysql_data_seek($this->result, 0);
		}
	}

	function line()
	{
		return mysql_fetch_array($this->result);
	}

	function num()
	{
		return mysql_num_rows($this->result);
	}

	function lastid()
	{
		return mysql_insert_id();
	}

	static function init_connection($db_login, $db_pass, $db_host, $db_name)
	{
		mysql_connect($db_host, $db_login, $db_pass) or die('cannot connect');
		mysql_select_db($db_name) or die('cannot select db');
		mysql_query('SET NAMES "utf8"');
	}

	public function setResult($result)
	{
		$this->result = $result;
	}

	public function getResult()
	{
		return $this->result;
	}
}

?>
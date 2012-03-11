<?php
	class app_order extends app_mysql
{
	public $id, $title, $text, $parent, $userid, $date, $date2, $ip, $trace;
	protected $table = 'orders', $post, $verify = array("title", "text", "parent", "userid", 'date', 'trace'), $feedback_table = 'feedback';

	function create_db()
	{
		$this->sql("DROP TABLE IF EXISTS $this->table");
		$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  title char(255), text text NOT NULL DEFAULT '', parent int DEFAULT '0', userid int, date int,
				  trace ENUM('in','out') DEFAULT 'out',
				  PRIMARY KEY (id)
				)");
	}

	function init($userid)
	{
		$this->sql("SELECT * FROM $this->table WHERE userid='$userid' AND parent='0'");
	}

	function initelse()
	{
		$this->sql("SELECT * FROM $this->table") or die('234');
	}

	function add($post)
	{
		$this->post = $post;
		$this->post['date'] = mktime();
		if ($this->verify())
		{
			while (list($arc, $val) = each($this->post))
			{
				if (in_array($arc, $this->verify))
				{
					$arcs .= "$l$arc";
					$values .= "$l'$val'";
					$l = ',';
				}
			}
		}
		$this->sql("INSERT INTO $this->table ($arcs) VALUES ($values)");
	}

	function verify()
	{
		return true;
	}

	function num_feedbacks()
	{
		$this->sql("SELECT * FROM $this->feedback_table");
		return $this->num();
	}

	function one()
	{
		if ($title = func_get_args())
		{
			$this->sql("SELECT * FROM $this->table WHERE userid='$title[1]' AND id='$title[0]' AND parent='0'");
		}
		if ($line = $this->line())
		{
			$this->id = $line['id'];
			$this->title = $line['title'];
			$this->text = $line['text'];
			$this->parent = $line['parent'];
			$this->userid = $line['userid'];
			$this->date2 = $line['date'];
			$this->trace = $line['trace'];
			$this->date = date("d.m.Y h:i", $line['date']);
			$this->ip = $_SERVER['REMOTE_ADDR'];
			return true;
		}
		else {
			return false;
		}
	}

	function onechain()
	{
		$this->sql("SELECT * FROM $this->table WHERE parent='$this->id'");
		return $this->one();
	}

	function show_form()
	{
		?>
	<div class="order_ask">
		<form name="" action="order_add.php" method="post">
			Ваши пожелания по этому заказу:
			<textarea name="text" rows=5 cols=20 wrap="off"></textarea>
			<input name="parent" type="hidden" value="<?=$this->id?>">
			<input name="userid" type="hidden" value="<?=$this->userid?>">
			<input name="title" type="hidden" value="<?=$this->title?>">
			<input name="trace" type="hidden" value="out">
			<input name="act" type="hidden" value="add">
			<input type="submit" value="Отправить">
		</form>
	</div>
	<?
	}
}

?>
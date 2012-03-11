<?php

class app_user extends app_mysql
{
	public $ip, $status, $id, $name, $fio, $sername, $lastname, $date, $birthdate, $company, $login, $pass, $date2, $birthdate2, $adress, $email, $error, $tel;
	protected $table = 'users';

	function create_db()
	{
		$this->sql("DROP TABLE IF EXISTS $this->table");
		$this->sql("
				CREATE TABLE $this->table (
				  id int NOT NULL auto_increment,
				  login char(255) UNIQUE, pass char(255), fio char(255), name char(255), sername char(255), lastname char(255),
				  status char(255), email char(255), date int, birthdate int, adress char(255), company char(255), tel char(255),
				  PRIMARY KEY (id)
				)");
	}

	function init()
	{
		$this->sql("SELECT * FROM $this->table WHERE id='$_SESSION[id]'");
		$line = $this->line();
		$this->id = $line['id'];
		$this->name = $line['name'];
		$this->fio = $line['fio'];
		$this->sername = $line['sername'];
		$this->lastname = $line['lastname'];
		$this->date = $line['date'];
		$this->birthdate = $line['birthdate'];
		$this->company = $line['company'];
		$this->login = $line['login'];
		$this->pass = $line['pass'];
		$this->adress = $line['adress'];
		$this->email = $line['email'];
		$this->tel = $line['tel'];
		$this->status = $line['status'];
		$this->date2 = date("d.m.Y", $line['date']);
		$this->birthdate2 = date("d.m.Y", $line['birthdate']);
		$this->ip = $_SERVER['REMOTE_ADDR'];
	}

	function update($POST)
	{
		$birthdate = strtotime($POST['birthdate']);
		if (empty($POST['password']))
		{
			$POST['password'] = $this->pass;
			$POST['valpass'] = $this->pass;
		}
		else
		{
			$POST['password'] = md5($POST['password']);
			$POST['valpass'] = md5($POST['valpass']);
		}
		if ($this->verifyreg($POST) == true)
		{
			$this->sql("UPDATE $this->table SET pass='$POST[password]', fio='$POST[fio]', name='$POST[name]', sername='$POST[sername]',
					lastname='$POST[lastname]', email='$POST[email]', birthdate='$birthdate',
					adress='$POST[adress]', company='$POST[company]', tel='$POST[tel]' WHERE id='$this->id'");
			$_SESSION['id'] = $this->id;
			$this->init();
		}
		else
		{
			return $this->error;
		}
		return "Изменения произведены успешно";
	}

	function encrypt($POST)
	{
	}

	function verifyreg($post)
	{
		$this->error = NULL;
		if (empty($post['act']))
		{
			$this->error .= "Нет события <b>act</b><br />";
		}
		if (empty($post['fio']))
		{
			$this->error .= "Не заполнено поле <b>ФИО</b><br />";
		}
		if (empty($post['email']))
		{
			$this->error .= "Не заполнено поле <b>email</b><br />";
		}
		if (empty($post['login']))
		{
			$this->error .= "Не заполнено поле <b>Логин</b><br />";
		}
		if (empty($post['password']))
		{
			$this->error .= "Не заполнено поле <b>Пароль</b><br />";
		}
		if ($post['act'] == 'add')
		{
			if (isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] == $_POST['keystring'])
			{
			}
			else
			{
				$this->error .= "<b>Код антибот</b> введен неверно<br />";
			}
		}
		if ($post['password'] != $post['valpass'])
		{
			$this->error .= "Не совпадает поле <b>Пароль</b> и <b>Подтверждение пароля</b><br />";
		}
		if ($this->verifyemail($post['email']))
		{
			$this->error .= $this->verifyemail($post['email']);
		}
		if (empty($this->error))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function verifyemail($email)
	{
		if (strstr($email, '@') == false)
		{
			return "Поле <b>email</b> заполнено неверно: Нет знака @";
		}
		else
		{
			return NULL;
		}
	}

	function num_orders()
	{
		$order = new app_order;
		$order->init($this->id);
		return $order->num();
	}

	function num_feedbacks()
	{
		$order = new app_order;
		return $order->num_feedbacks();
	}

	function register($POST)
	{
		if ($POST['act'] == 'add')
		{
			$date = mktime();
			$status = "registered";
			if ($this->verifyreg($POST))
			{
				$POST['password'] = md5($POST['password']);
				$this->sql("INSERT INTO $this->table (login,pass,fio,lastname,name,sername,email,company,birthdate,adress,date,status,tel)
					VALUES ('$POST[login]','$POST[password]','$POST[fio]','$POST[lastname]','$POST[name]','$POST[sername]',
					'$POST[email]','$POST[company]','$POST[birthdate]','$POST[adress]','$date','$status', '$POST[tel]')");
				$_SESSION['error'] = NULL;
				header('location:register.php?a=success');
			}
			else
			{
				$_SESSION['error'] = $this->error;
				header('location:register.php?a=error');
			}
		}
	}

	function recovery_password($email, $login)
	{
		$email = strip_tags($email);
		$login = strip_tags($login);
		$this->sql("SELECT * FROM $this->table WHERE email='$email' AND login='$login' LIMIT 1");
		if ($this->num())
		{
			$pass = app_common::randomPassword(8);
			$msg = "Ваш новый пароль: $pass";
			mail($email, "ООО 'Берег' Восстановление пароля", $msg);
			$this->sql("UPDATE $this->table SET pass='$pass' WHERE email='$email' AND login='$login' LIMIT 1");
			return "Новый пароль отправлен вам на email: $email";
		}
		else {
			return "Такого сочетания пользователя $login и e-mail: $email не существует. Попробуйте снова.";
		}
	}

	static function authOpenAPIMember()
	{
		$session = array();
		$member = FALSE;
		$valid_keys = array('expire', 'mid', 'secret', 'sid', 'sig');
		$app_cookie = $_COOKIE['vk_app_' . '2114231'];
		if ($app_cookie)
		{
			$session_data = explode('&', $app_cookie, 10);
			foreach ($session_data as $pair)
			{
				list($key, $value) = explode('=', $pair, 2);
				if (empty($key) || empty($value) || !in_array($key, $valid_keys))
				{
					continue;
				}
				$session[$key] = $value;
			}
			foreach ($valid_keys as $key)
			{
				if (!isset($session[$key]))
				{
					return $member;
				}
			}
			ksort($session);

			$sign = '';
			foreach ($session as $key => $value)
			{
				if ($key != 'sig')
				{
					$sign .= ($key . '=' . $value);
				}
			}
			$sign .= 'DgiMNfxutNEdgN5BKl70';
			$sign = md5($sign);
			if ($session['sig'] == $sign && $session['expire'] > time())
			{
				$member = array('id' => intval($session['mid']), 'secret' => $session['secret'], 'sid' => $session['sid']);
			}
		}
		return $member;
	}

	static function init_user_from_session()
	{
		global $user;
		if (!is_null($_SESSION['user']))
		{
			$user = $_SESSION['user'];
		}
	}
}

?>

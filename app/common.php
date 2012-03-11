<?php
class app_common
{
	static function short_news($str, $ii)
	{
		$text_i = '';
		$str = strip_tags($str);
		$text = explode(' ', $str);
		for ($i = 0; $i < $ii && $text[$i] != ''; $i++)
		{
			$text_i .= "$text[$i] ";
		}
		return $text_i;
	}

	static function utf8_substr($str, $from, $len)
	{
		# utf8 substr
		# www.yeap.lv
		return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' . '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str);
	}

	static function randomPassword($length, $allow = "abcdefghijklmnopqrstuvwxyz0123456789")
	{
		$i = 1;
		while ($i <= $length)
		{
			$max = strlen($allow) - 1;
			$num = rand(0, $max);
			$temp = substr($allow, $num, 1);
			$ret = $ret . $temp;
			$i++;
		}
		return $ret;
	}

	static function LoginQuery()
	{
		if (!$_SESSION['user'])
		{
			header("location:index.php");
		}
	}

	static function search_text($ii, $search, $text1)
	{
		$text1 = str_replace($search, "<span class='highlight'>$search</span>", $text1);
		$numstart = mb_strpos($text1, $search, 0, 'UTF-8');
		$numstop = mb_strrpos($text1, $search, 0, 'UTF-8');
		$numstart -= ($ii + 24);
		if ($numstart < 0)
		{
			$numstart = 0;
		}
		$numstop += ($ii + 7 + mb_strlen($search, 'UTF-8'));
		if ($numstop > mb_strlen($text1, 'UTF-8'))
		{
			$numstop = mb_strlen($text1, 'UTF-8');
		}

		$len = $numstop - $numstart;
		$text = mb_substr($text1, $numstart, $len, 'UTF-8');
		return "$text ...";
	}

	static function ruslat($string)
	{ # Задаём функцию перекодировки кириллицы в транслит.
		$string = ereg_replace("ж", "zh", $string);
		$string = ereg_replace("ё", "yo", $string);
		$string = ereg_replace("й", "i", $string);
		$string = ereg_replace("ю", "yu", $string);
		$string = ereg_replace("ь", "", $string);
		$string = ereg_replace("ч", "ch", $string);
		$string = ereg_replace("щ", "sh", $string);
		$string = ereg_replace("ц", "c", $string);
		$string = ereg_replace("у", "u", $string);
		$string = ereg_replace("к", "k", $string);
		$string = ereg_replace("е", "e", $string);
		$string = ereg_replace("н", "n", $string);
		$string = ereg_replace("г", "g", $string);
		$string = ereg_replace("ш", "sh", $string);
		$string = ereg_replace("з", "z", $string);
		$string = ereg_replace("х", "h", $string);
		$string = ereg_replace("ъ", "", $string);
		$string = ereg_replace("ф", "f", $string);
		$string = ereg_replace("ы", "y", $string);
		$string = ereg_replace("в", "v", $string);
		$string = ereg_replace("а", "a", $string);
		$string = ereg_replace("п", "p", $string);
		$string = ereg_replace("р", "r", $string);
		$string = ereg_replace("о", "o", $string);
		$string = ereg_replace("л", "l", $string);
		$string = ereg_replace("д", "d", $string);
		$string = ereg_replace("э", "yе", $string);
		$string = ereg_replace("я", "jа", $string);
		$string = ereg_replace("с", "s", $string);
		$string = ereg_replace("м", "m", $string);
		$string = ereg_replace("и", "i", $string);
		$string = ereg_replace("т", "t", $string);
		$string = ereg_replace("б", "b", $string);
		$string = ereg_replace("Ё", "yo", $string);
		$string = ereg_replace("Й", "I", $string);
		$string = ereg_replace("Ю", "YU", $string);
		$string = ereg_replace("Ч", "CH", $string);
		$string = ereg_replace("Ь", "", $string);
		$string = ereg_replace("Щ", "SH'", $string);
		$string = ereg_replace("Ц", "C", $string);
		$string = ereg_replace("У", "U", $string);
		$string = ereg_replace("К", "K", $string);
		$string = ereg_replace("Е", "E", $string);
		$string = ereg_replace("Н", "N", $string);
		$string = ereg_replace("Г", "G", $string);
		$string = ereg_replace("Ш", "SH", $string);
		$string = ereg_replace("З", "Z", $string);
		$string = ereg_replace("Х", "H", $string);
		$string = ereg_replace("Ъ", "", $string);
		$string = ereg_replace("Ф", "F", $string);
		$string = ereg_replace("Ы", "Y", $string);
		$string = ereg_replace("В", "V", $string);
		$string = ereg_replace("А", "A", $string);
		$string = ereg_replace("П", "P", $string);
		$string = ereg_replace("Р", "R", $string);
		$string = ereg_replace("О", "O", $string);
		$string = ereg_replace("Л", "L", $string);
		$string = ereg_replace("Д", "D", $string);
		$string = ereg_replace("Ж", "Zh", $string);
		$string = ereg_replace("Э", "Ye", $string);
		$string = ereg_replace("Я", "Ja", $string);
		$string = ereg_replace("С", "S", $string);
		$string = ereg_replace("М", "M", $string);
		$string = ereg_replace("И", "I", $string);
		$string = ereg_replace("Т", "T", $string);
		$string = ereg_replace("Б", "B", $string);
		$string = ereg_replace(" ", "_", $string);
		return $string;
	}
}

?>
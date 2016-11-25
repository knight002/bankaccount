<?php

class Debug
{
	public static function dump($str, $label = '')
	{
		echo "$label: " . print_r($str, true)."\n";
	}
}

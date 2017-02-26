<?php
	/**
	* pre
	*
	* print the passed value in proper format
	*
	* @param $var <-> mixed <-> contains value that is going to print
	* @param $die <-> bool <-> specify termination functionality
	*							(0 = Not terminate an excecution)
	*							(1 = Terminate an excecution)
	*
	* @return null
	*
	*/
	function pre($var,$die=0)
	{
		echo "<pre>";
		print_r($var);
		if($die)
		{
			die;
		}
		echo "</pre>";
	}

	/**
	* h
	*
	* return value by escaping html
	*
	* @param $value <-> string <-> contains value that is going to escape
	*
	* @return null
	*
	*/
	function h($value)
	{
		return htmlentities($value);
	}
?>
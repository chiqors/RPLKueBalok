<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('asset'))
{
	function asset($data)
	{
		return base_url().'public/'.$data;
	}
}

if ( ! function_exists('countdown_timer'))
{
	function countdown_timer($data)
	{
		$diwali = strtotime($data);
		$current = strtotime('now');
		$diffference = ($diwali-$current);
		$days = floor($diffference / (60*60*24));
		echo "$days hari lagi";
	}
}

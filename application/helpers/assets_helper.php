<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('asset_url'))
{
	function asset_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->site_url($uri).'assets/';
	}
}
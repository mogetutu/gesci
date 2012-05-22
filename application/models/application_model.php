<?php if (! defined('BASEPATH')) exit('No direct script access');

class Application_model extends MY_Model {

	public $before_create = array('join_tables');
	//php 5 constructor
	function __construct()
	{
		parent::__construct();
	}

	function join_tables()
	{

	}

}
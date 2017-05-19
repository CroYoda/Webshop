<?php

class Db extends mysqli 
{
	public function __construct()
	{
		parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_BASENAME);
		$this->set_charset('utf8');
	}
}

?>
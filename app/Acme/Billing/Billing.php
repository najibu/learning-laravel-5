<?php namespace Acme\Billing;

use Mail;

class Billing {
	public function __construct()
	{
		Mail::send();
	}
}
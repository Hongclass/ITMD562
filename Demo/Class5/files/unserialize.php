<?php

class User
{
	public $firstName = '';
	public $lastName = '';
	public $extension = '';
}

$data = 'O:4:"User":3:{s:9:"firstName";s:5:"Brian";s:8:"lastName";s:6:"Bailey";s:9:"extension";s:5:"45334";}';

$user = unserialize($data);

print_r($user);

?>
<?php

class User
{
	public $firstName = '';
	public $lastName = '';
	public $extension = '';
}

$aUser = new User();
$aUser->firstName = 'Brian';
$aUser->lastName = 'Bailey';
$aUser->extension = '45334';

$sUser = serialize($aUser);

print $sUser;

?>
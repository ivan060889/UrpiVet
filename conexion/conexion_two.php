<?php
try
{
	$bdd = new PDO('mysql:host=localhost:3310;dbname=urpivet;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

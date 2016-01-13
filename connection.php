<?php

function connex($param)
{
	include_once($param.".php");
	$idcom= oci_connect('SYSTEM','root','localhost/XE');
	if(!$idcom | !$idbase)
	{
	echo "<script type=text/javascript>";
	echo "alert('Connexion Impossible � la base $base')</script>";
}
return $idcom;
}
?>
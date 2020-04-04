<?php
	$banco = new mysqli("localhost", "root", "", "dblend");
	if($banco->connect_errno){
		echo "<p> Encontrei um erro $banco->errno --> $banco->connect_error</P>";
		die();
	}
	$banco->query("SET NAMOES 'utf8'");
	$banco->query("SET character_set_connection=utf8");
	$banco->query("SET character_set_client=utf8");
	$banco->query("SET character_set_results=utf8");
?>
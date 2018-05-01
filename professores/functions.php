<?php 

	require_once('../config.php');
	require_once(DBAPI);

	$professores = null;
	$professor = null;

	function index() {

		global $professores;
		$professores = find_all('professores');

	}
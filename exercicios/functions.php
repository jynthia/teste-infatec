<?php 

	require_once('../config.php');
	require_once(DBAPI);

	$exercicios = null;
	$exercicio = null;

	$perguntas = null;
	$pergunta = null;

	function index() {

		global $exercicios;
		$exercicios = find_all('exercicios');

	}

	function perguntas() {

		global $perguntas;
		$perguntas = find_all('perguntas');
	}
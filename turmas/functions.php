<?php 

	require_once('../config.php');
	require_once(DBAPI);

	$turmas = null;
	$turma = null;

	$alunos = null;
	$aluno = null;

	function index() {

		global $turmas;
		$turmas = find_all('turmas');

	}

	function alunos() {

		global $alunos;
		$alunos = find_all('alunos');
	}
<?php

namespace framework\controller;

class Teste {

	public function index()
	{
		/**
		$dados = array('Projeto: Teste de Framework', 'Desenvolvedor: Alex Sandro Juchem','E-mail: alexsandrojuchem@gmail.com');
		\framework\config\Framework::viewShow('teste', $dados);
		*/
		
		$unicoObj = new \framework\model\tabela\Usuarios();
		$unicoObj->nome = 'Alex Sandro Juchem';
		$unicoObj->email = 'alexsandrojuchem@gmail.com';
		if (count($unicoObj::$arrErros)) {
			foreach ($unicoObj::$arrErros as $erro) {
				echo $erro['msg'] . '<br>';
			}
		} else {
			$unicoObj->save();
		}
	}

	public function sobre()
	{
		$dados = array('Sobre');
		\framework\config\Framework::viewShow('teste', $dados);
	}

}
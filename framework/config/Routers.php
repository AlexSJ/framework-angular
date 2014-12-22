<?php

namespace framework\config;

class Routers {

	/**
	 * Retorna o nome do controle
	 */
	public static function controle()
	{
		/**
		 * Retorna o conteúdo do 1º parametro da URL
		 * http://site.com/{sobre}/produto/10
		 */
		$controle = Routers::param(0);

		/**
		 * Verifica se existe o 1° parametro da URL, se
		 * não existir vamos chamar o controle padrão definido
		 * em \framework\config\Framework::$defaultController
		 */
		if (!$controle) {
			$controle = \framework\config\Framework::$defaultController;
		}

		$controle = ucfirst($controle);
		
		/**
		 * Agora é preciso saber se existe o arquivo .php (classe)
		 * com o nome deste controle, se não existir carregamos o
		 * controle definido em \framework\config\Framework::$defaultController404
		 * este controle é exibido como se fosse um erro 404 (page not found)
		 */
		if (!file_exists('framework/controller/' . $controle . '.php')) {
			$controle = \framework\config\Framework::$defaultController404;
		}

		return $controle;
	}

	/**
	 * Retorna a ação que está na url
	 */
	public static function acao()
	{
		$acao = Routers::param(1);
		if ($acao) {
			return $acao;
		}
		return false;
	}

	/**
	 * Retorna um array com os parametros da url
	 * @param int $id número do parametro para retornar 0 = Controle, 1 = Ação, 2 = id...
	 */
	private static function param($id)
	{
		$params = (isset($_GET['params']) ? $_GET['params'] : false);
		if ($params) {
			$arrParams = explode('/', $params);
			return @$arrParams[$id];
		}
		return false;
	}

}
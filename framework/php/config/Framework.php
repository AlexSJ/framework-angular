<?php

namespace framework\php\config;

class Framework {

	/**
	 * URL do site, pode ser útil na criação de links
	 */
	public static $url = "http://venus.solucoesglobais.com.br/alex.juchem/framework-angular/";

	/**
	 * Se não for informado um controle na URL o 
	 * framework buscará o controlle padrão aqui definido
	 */
	public static $defaultController = "teste";

	/**
	 * Controle padrão caso não seja encontrado o controle
	 * que for declarado na URL (404)
	 */
	public static $defaultController404 = "erro404";

	public static function viewShow($view, $dados)
	{
		if ($dados) {
			extract($dados);
		}
		include 'framework/view/' . $view . '.php';
	}

}
<?php

namespace framework\php\model\tabela;

class Usuarios extends \framework\php\config\Models {

	public function __construct()
	{
		parent::__construct('schema.un_unico');
	}

	public function setFields()
	{
		$this->addField(array(
			'pk' => true,
			'name' => 'id',
			'max' => 11,
			'isNull' => false,
			'sequence' => true
			));

		$this->addField(array(
			'name' => 'nome',
			'max' => 100,
			'isNull' => false,
			'validar' => 'Usuario.nome'
			));

		$this->addField(array(
			'name' => 'email',
			'max' => 50,
			'isNull' => false,
			'validar' => 'Usuario.email'
			));
	}

}
<?php

namespace framework\php\config;

class Models {

	private $arrFields = array();
	
	public static $arrErros = array();

	public function __construct($tabela)
	{
		$this->setFields();
	}

	public function __get($name) 
	{
        return $this->getVal($name);
    }

    public function __set($name, $value) 
    {
        $this->setVal($name, $value);
    }

    public function getVal($field) 
    {
        if (isset($this->arrFields[$field])) {
            if (isset($this->arrFields[$field]['value'])) {
                $val = $this->arrFields[$field]['value'];
                return $val;
            }
        }
        return null;
    }

    protected function setVal($field, $val) 
    {
        if (isset($this->arrFields[$field])) {
			$isValid = $this->validar($val, $field);
			if ($isValid) {
				$this->arrFields[$field]['value'] = $val;
			} else {
				$this->arrFields[$field]['value'] = null;
			}
        }
    }
	
	/**
	 * Adiciona um campo ao modelo
	 * @param $field array
	 */
	public function addField($field = array())
	{
		/**
		 * Exemplo de campo que virá em $field
		 * pk 		 bool 		Obrigatório		Define se o campo será primary key
		 * name 	 string 	Obrigatório		Nome da coluna identica a que está na tabela no banco de dados
		 * max 		 int 		opcional 		Tamanho do campo
		 * isNull    bool 		opcional 		Indica se o campo pode ser vazio
		 * sequence  string 	opcional 		É o próximo valor que virá caso a coluna seja serial/autoincrement
		 * validar   string     opcional        Classe e Método que irá validar o valor deste campo
		 */
		if (isset($field['name']) && strlen($field['name'])) {
			$this->arrFields[$field['name']] = array(
				'field' => $field['name'],
				'validar' => (isset($field['validar']) && !empty($field['validar']) ? $field['validar'] : FALSE)
				);
		}
	}

	public function getFieldVal($field)
	{
		if (isset($this->arrFields[$field]['value'])) {
            $val = $this->arrFields[$field]['value'];
            return $val;
        }
        return false;
	}
	
	/**
	 * Valida o valor do campo em seu devido método
	 */
	private function validar($val, $field)
	{
		if (isset($this->arrFields[$field]['validar']) and !empty($this->arrFields[$field]['validar'])) {
			/**
			 * Por padrão o valor de $this->arrFields[$name]['validar'] vem da seguinte maneira
			 * classe.metodo() onde:
			 * classe é o nome do arquivo e também da classe em framework\model\validar\
			 * método é o nome do método dentro dessa classe e que vai validar $val
			 */
			$classMetodoArr = explode('.', $this->arrFields[$field]['validar']);
			$class = $classMetodoArr[0];
			$metodo = $classMetodoArr[1];

            if (method_exists('framework\php\model\validar\\' . $class, $metodo)) {
                $isValid = false;
                eval('$isValid = framework\php\model\validar\\' . $class . '::' . $metodo . '($field, $val);');
                return $isValid;
            }
        }
        return true;
	}

	public function save()
	{
		foreach ($this->arrFields as $field => $arrField) {
			$valor = $this->getFieldVal($field);
			if ($valor) {
				echo 'Salvando novo registro ...' . $field . ' => ' . $valor . '<br>';
			}
		}
	}

}
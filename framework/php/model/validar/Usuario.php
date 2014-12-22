<?php

namespace framework\php\model\validar;

class Usuario extends \framework\php\config\Models {
	
	public static function nome($field, $val)
	{
		if (strlen($val) < 5) {
			self::$arrErros[$field]['msg'] = 'Erro no nome';
			return false;
		}
		return true;
	}
	
	public static function email($field, $val)
	{
		if (strlen($val) < 9) {
			self::$arrErros[$field]['msg'] = 'Erro no email';
			return false;
		}
		return true;
	}
	
}
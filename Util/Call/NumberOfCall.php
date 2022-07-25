<?php

namespace AppBundle\Tests\Call;

use AppBundle\Tests\Call\Ordinals;

/**
 * @author José Ramirez jramirez@optimeconsulting.com
 */
class NumberOfCall extends Ordinals
{
	private $stack;
	private $current;

	function __construct()
	{
		$this->stack = array();
	}

	/**
	 * Establece el número de la llamada del nombre del método dado
	 * @param string $nameMethod Nombre del método
	 * @param  bool $sameCall Si es la misma llamada
	 * @return $this
	 */
	public function push($nameMethod, $sameCall = false)
	{
		$this->current = $nameMethod;
		if(array_key_exists($nameMethod, $this->stack)) { // si existe
			if(!$sameCall)
				$this->stack[$nameMethod] += 1;
		} else {
			$this->stack[$nameMethod] = 1;
		}
		return $this;
	}

	public function get()
	{
		return "In the " . parent::get()[$this->stack[$this->current]]." call to $this->current method";
	}

}



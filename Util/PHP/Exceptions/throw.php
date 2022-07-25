<?php
	
	function suma($va1, $va2 = null)
	{
		if(is_null($va2)) {
			throw new Exception("two values must be passed", 1);			
		}

		return $va1 + $va2;
	}

	echo suma(1,5);

?>
<?php
	
	function suma($va1, $va2 = null)
	{
		if(is_null($va2)) {
			throw new Exception("two values must be passed", 1);			
		}

		return $va1 + $va2;
	}



	function preSuma() {
		try {
			suma(1,6);
		} catch (Exception $e) {
			echo '<pre>';
				//echo var_dump($e);
				echo $e->getMessage();
			echo '</pre>';

		} finally {
			echo 'finally, si no se ha lanzado la exception';
		}
	}

	preSuma();

	echo 'script continuing';
?>
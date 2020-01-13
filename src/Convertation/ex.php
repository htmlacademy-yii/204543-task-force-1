<?php 

	$format = 'INSERT INTO %1$s (%2$s) VALUES (%3$s)'; 
		
		$sqlData = printf ($format, 'category', 'name, icon', 'Уборка, clean'); 

		return $sqlData;
    	
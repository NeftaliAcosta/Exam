<?php 
	//Main folder
	$base = __DIR__.'/../app/';

	//Directories to include automatically 
	$folders = [
		'controllers',
		'models',
		'validations'
	];
	//Inclusión automática de los ficheros
	foreach ($folders as $f) {
		foreach (glob($base . "$f/*.php") as $k => $archivo) {
			require_once $archivo;
		}
	}

<?php

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$pdo->exec('ALTER TABLE videos ADD COLUMN image_path TXT');



como resolver esse problema ,Your requirements could not be resolved to an installable set of packages. Problem 1 - Root composer.json requires php ^8.1 but your php version (7.2.34) does not satisfy that requirement. Problem 2 - Root composer.json requires laravel/sanctum ^3.2 -> satisfiable by laravel/sanctum[v3.2.0, ..., v3.2.5]. - laravel/sanctum[v3.2.0, ..., v3.2.5] require php ^8.0.2 -> your php version (7.2.34) does not satisfy that requirement. Problem 3 - laravel/framework[v10.8.0, ..., v10.9.0] require php ^8.1 -> your php version (7.2.34) does not satisfy that requirement. - Root composer.json requires laravel/framework ^10.8 -> satisfiable by laravel/framework[v10.8.0, v10.9.0].

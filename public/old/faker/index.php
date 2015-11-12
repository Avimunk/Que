<?php
// require the Faker autoloader
require_once 'autoload.php';
require_once 'rb.php';
R::setup( 'mysql:host=localhost;dbname=que','root', '' );



// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

$date = new DateTime();
$timestart = time();
for ($i=0; $i < 2150; $i++) {
	$item = R::dispense('guests');
	$item->name = $faker->name;
	$item->phone = $faker->isbn10;
	$item->time_reg = 'CURRENT_TIMESTAMP';
	$item->is_inside = 0;
	$item->status = 'לא הגיע';
	$id = R::store($item);
}
echo time()- $time;
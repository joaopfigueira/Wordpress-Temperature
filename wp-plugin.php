<?php
/**
* Plugin Name: Temperature
* Description: Displays current temperature for a given local
* Version: 0.1
* Author: João Paulo Figueira
* License: MIT
*/

/**
* Usage example:
* [temperature country="pt" city="lisbon"]
*/

include_once('autoload.php');

use Temperature\Temperature;

add_action('init', 'temperatureRegisterShortCodes');

function temperatureRegisterShortCodes()
{
	add_shortcode('temperature', 'temperature');
}

function temperature($args)
{
	$temperature = new Temperature;
	return $temperature->setCountry($args['country'])->setCity($args['city'])->fetch();
}

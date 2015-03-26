<?php namespace Temperature;

/**
 * Fetch temperature data from openweathermap.org.
 *
 * @package    	Temperature
 * @author 		João Paulo Figueira <joao.figueira@webnation.pt>
 * @copyright  	2015 João Paulo Figueira <joao.figueira@webnation.pt>
 * @license    	MIT
 */

class Temperature
{
	protected 	$country = 'pt',
				$city    = 'Lisbon';

	/**
	* Set the country.
	* Warning: use 3166-1 country codes
	*
	* @param string $country
	* @return $this
	*/
	public function setCountry($country)
	{
		$this->country = $country;
		return $this;
	}

	/**
	* Set the city.
	*
	* @param string $city
	* @return $this
	*/
	public function setCity($city)
	{
		$this->city = $city;
		return $this;
	}

	/**
	* returns the temperature data in Celsius
	*
	* @return $this
	*/
	public function fetch()
	{
		$request = "http://api.openweathermap.org/data/2.5/weather?q={$this->city},{$this->country}";
		$temperature = json_decode(file_get_contents($request));
		
		//convert from Kelvin to Celcius
		return round($temperature->main->temp - 273.15, 1);
	}
}

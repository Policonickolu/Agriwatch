<?php

namespace Agriwatch\Domain;

class Cooltainer
{

	/**
	 * Cooltainer id.
	 *
	 * @var integer
	 */
	private $id;

	/**
	 * Cooltainer reference.
	 *
	 * @var string
	 */
	private $reference;

	/**
	 * Cooltainer address.
	 *
	 * @var string
	 */
	private $address;

	/**
	 * Cooltainer latitude.
	 *
	 * @var float
	 */
	private $latitude;

	/**
	 * Cooltainer longitude.
	 *
	 * @var float
	 */
	private $longitude;

	/**
	 * Cooltainer temperature.
	 *
	 * @var float
	 */
	private $temperature;

	/**
	 * Cooltainer humidity.
	 *
	 * @var float
	 */
	private $humidity;

	/**
	 * Cooltainer if the bees box is open.
	 *
	 * @var boolean
	 */
	private $beesBoxOpen;


	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function getReference() {
		return $this->reference;
	}

	public function setReference($reference) {
		$this->reference = $reference;
		return $this;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}

	public function getLatitude() {
		return $this->latitude;
	}

	public function setLatitude($latitude) {
		$this->latitude = $latitude;
		return $this;
	}

	public function getLongitude() {
		return $this->longitude;
	}

	public function setLongitude($longitude) {
		$this->longitude = $longitude;
		return $this;
	}

	public function getTemperature() {
		return $this->temperature;
	}

	public function setTemperature($temperature) {
		$this->temperature = $temperature;
		return $this;
	}

	public function getHumidity() {
		return $this->humidity;
	}

	public function setHumidity($humidity) {
		$this->humidity = $humidity;
		return $this;
	}

	public function isBeesBoxOpen() {
		return $this->beesBoxOpen;
	}

	public function setIsBeesBoxOpen($beesBoxOpen) {
		$this->beesBoxOpen = $beesBoxOpen;
		return $this;
	}

}

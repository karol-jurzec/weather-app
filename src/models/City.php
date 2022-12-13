
<?php
class City {
    private $name;
    private $country;

    public function __construct(string $name, string $country) {
        $this->name = $name;
        $this->country = $country;
    }
    public function setName(string $name) {
        $this->name= $name;
    }
    public function getName() : string {
        return $this->name;
    }
    public function setCountry(string $country) {
        $this->country = $country;
    }
    public function getCountry() : string {
        return $this->country;
    }

}
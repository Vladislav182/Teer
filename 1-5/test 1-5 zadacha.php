<?php  

// zad. 1

for ($i = 15; $i >= -5; $i--) {
    echo "$i \r\n";
}

// zad. 2

class Car{

    private $model;
    private $speed;
    private $color;
    //set setter 
    public function setModel($model){
        $this->model = $model;
        return $this;
    }

    public function setSpeed($speed){
        $this->speed = $speed;
        return $this;
    }

    public function setColor($color){
        $this->color = $color;
        return $this;
    }

    // zad. 3
    
    public function toString(){
        foreach($this as $key => $value){
            if($value != null){
                echo "$value <br>";
            }
        }
    }

}

$object = new Car();

echo '<br><br>';

$object->setModel('Mercedes');
$object->setSpeed(360);
$object->setColor('Carbon Black');

$object->toString();

echo '<br><br>';

// zad.4

function Accelerate(){
    //Верен отговор - (Б)
}

echo '<br><br>';

// zad.5

$mazda = new Car();
$desiredSpeed = 0;  
$mazda->setSpeed($desiredSpeed);
$mazda->toString();

?>
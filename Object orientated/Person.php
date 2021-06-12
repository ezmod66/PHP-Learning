<?php
/*BAse class used for the inheritence. protected age will allow usage of variable through inheritence
using ? before a type will allow assignment of a null value to the variable*/
class Person
{
    public string $name;
    public string $surname;
    protected ?int $age; //int but also accepts null values
    public static int $counter = 0; //increase counter per instance created

    public function __construct($name,$surname)
    {
        $this->name = $name;
        $this->surname = $surname;
        self::$counter++;
        //::scope Resolution Operator  allows the static variable to be used on the class itself
    }

    public function setAge($age) 
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public static function getCounter()
    {
        return self::$counter;
    }//get current counter
}

?>
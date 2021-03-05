<?php

class Employee extends DataBoundObject {

        protected $id;
        protected $first_name;
        protected $last_name;
        protected $age;
        protected $address;
        protected $city;
        

        protected function DefineTableName() {
                return("Employee");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "id",
                        "first_name" => "first_name",
                        "last_name" => "last_name",
                        "age" => "age",
                        "address" => "address",
                        "city" => "city"));
        }
}

?>

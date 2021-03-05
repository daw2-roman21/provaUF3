<?php

class Logs extends DataBoundObject {

        protected $id;
        protected $first_name;
        protected $last_name;
        protected $age;
        protected $address;
        protected $city;
        protected $loglevel;
        protected $effectime;
        protected $operacio;
        protected $idemployee;

        protected function DefineTableName() {
                return("logEmployee");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "id",
                        "first_name" => "first_name",
                        "last_name" => "last_name",
                        "age" => "age",
                        "address" => "address",
                        "city" => "city",
                        "loglevel" => "loglevel",
                        "effecttime" => "effecttime",
                        "operacio" => "operacio",
                        "idemployee" => "idemployee"));
        }
}

?>

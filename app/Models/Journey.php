<?php 

    class Journey {
         //Assign variables to types
         private $input;
         private $decodedArray;

        //extract file contents and convert from json
        function __construct($file) {
            //try / catch test for json file with correct schema input?
            $this->input = file_get_contents($file);
            $this->decodedArray = json_decode($this->input, true);
        }

        //Create origins and destinations arrays
        private function originsAndDestinations($decodedArray) {
            foreach($decodedArray as $arr) {
                array_push($origins, $arr['from']);
                array_push($destinations, $arr['to']);
            }       
        }

        //Find unique origin to get start point
        private function setStartPoint($origins, $destinations) {
            foreach($this->origins as $origin) {
                if(!in_array($origin, $this->destinations)) {
                    array_push($this->final, $origin);
                    $this->start = $origin;
                }
            }

        }

    }

?>
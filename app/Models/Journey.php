<?php 

    namespace App\Models;

    class Journey {
        //Assign variables to types
        private $origins = [];
        private $destinations = [];
        private $final = [];
        private $start;
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
                array_push($this->origins, $arr['from']);
                array_push($this->destinations, $arr['to']);
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

        //Loop through main array matching previous destinations to origins
        //Delete array item once its destination pushed to final array until decodedArray is empty
        private function completeArray($decodedArray = null) {
            while($this->decodedArray) {
                foreach($this->decodedArray as $key => $arr) {
                    if(in_array($this->start, $arr)) {
                        array_push($this->final, $arr['to']);
                        unset($this->decodedArray[$key]);
                        $this->start = $arr['to'];
                    }
                }
            }
        }

        function process() {
            $this->originsAndDestinations($this->decodedArray);
            $this->setStartPoint($this->origins, $this->destinations);
            $this->completeArray($this->decodedArray);
            return json_encode($this->final);
        }

    }

    // $file = '../..//input/input.json';
    // $journey = new Journey($file);
    // print_r($journey->process());

?>
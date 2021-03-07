<?php 

    class Journey {
         //Assign variables to types
         private $input;
         private $decodedArray;

        //extract file contents and convert from json
        function __construct($file) {
            //try / catch test for json file with correct schema input
            $this->input = file_get_contents($file);
            $this->decodedArray = json_decode($this->input, true);
        }
    }

?>
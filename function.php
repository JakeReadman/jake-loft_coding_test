<?php 

    $file = 'input.json';

    function run($input_file) {

        //extract file contents and convert from json
        $input = file_get_contents($input_file);
        $decodedArray = json_decode($input, true);
        //Assign variables to types
        $origins = [];
        $destinations = [];
        $final = [];
        $start;
        //Create origins and destinations arrays
        foreach($decodedArray as $arr) {
            array_push($origins, $arr['from']);
            array_push($destinations, $arr['to']);
        }        
        //Find unique origin to get start point
        foreach($origins as $origin) {
            if(!in_array($origin, $destinations)) {
                array_push($final, $origin);
                $start = $origin;
            }
        }      
        //Loop through main array matching previous origins to destinations
        //Delete array item once its destination pushed to final array until decodedArray is empty
        while(!!$decodedArray) {
            foreach($decodedArray as $key => $arr) {
                if(in_array($start, $arr)) {
                    array_push($final, $arr['to']);
                    unset($decodedArray[$key]);
                    $start = $arr['to'];
                }
            }
        }
        //convert back to json
        $output = json_encode($final);
        print_r($output);
    }

    run($file);


?>
<?php  

    use PHPUnit\Framework\TestCase;

    class JourneyTest extends TestCase {
    
        public function testProcessFunction() {
            $journey = new \App\Models\Journey('input/input2.json');
            $this->assertEquals($journey->process(), json_encode(["A", "B", "C", "D"]));
        }

        public function testProcessFunctionMultipleCalls() {
            $journey = new \App\Models\Journey('input/input2.json');
            $this->assertEquals($journey->process(), json_encode(["A", "B", "C", "D"]));
            $this->assertEquals($journey->process(), json_encode(["A", "B", "C", "D"]));
        }


    }
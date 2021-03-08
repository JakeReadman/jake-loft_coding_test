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

        public function testErrorThrownWhenNonLinearJourney() {
            $journey = new \App\Models\Journey('input/input3.json');
            $this->expectException(\Exception::class);
            $this->expectExceptionMessage("non-linear Journey");
            $journey->process();
        }

        public function testErrorThrownWhenEmptyJsonArrayProvided() {
            $journey = new \App\Models\Journey('input/input4.json');
            $this->expectException(\Exception::class);
            $this->expectExceptionMessage("Empty journey array provided");
            $journey->process();
        }

    }
<?php
	class HourDegreeHandler {
		private $hourDegree;
		private $hours;
		private $minutes;
		private $seconds;
		private $timeArray; 

		function __construct($degree) {
	       $this->hourDegree = $degree;
	       $this->countHoursF();
	       $this->countMinutesF();
	       $this->countSecondsF();
	       $this->makeTimeArray();
	    }

	    public function getHours() {
	    	return floor($this->hours);
	    }

	   	public function getMinutes() {
	    	return floor($this->minutes);
	    }

	   	public function getSeconds() {
	    	return floor($this->seconds);
	    }

	    public function getTimeArray() {
	    	return $this->timeArray;
	    }

	    public function getTimeString() {
	    	$str = implode(':', $this->timeArray);
	    	$new_str = date("H:i:s",strtotime($str));
	    	return $new_str;
	    }

	    public function makeTimeArray() {
	    	$this->timeArray = array(
					'hours' => floor($this->hours), 
					'minutes' => floor($this->minutes), 
					'seconds' => floor($this->seconds)
			);
	    }

	    private function countHoursF() {
	    	$this->hours = $this->hourDegree*12/360;
	    }

	   	private function countMinutesF() {
	    	$this->minutes = ($this->hours - floor($this->hours))*60;
	    }

	   	private function countSecondsF() {
	    	$this->seconds = ($this->minutes - floor($this->minutes))*60;
	    }

	}

	$t = new HourDegreeHandler(50.3);
	$a = $t->getTimeArray();
	$str = $t->getTimeString();

?>
<?php 
class DictScraper{
	private $spanish = false;

	public function __construct($spanish=false){
		$this->spanish = $spanish;
	}

	function add0($i){
		if($i < 10){
			$i = "0".$i;
		}
		return $i;
	}

	private function getURL(){
		$base = rand(1, 15) * 2 - 1;
		$num1 = $this->add0($base);
		$num2 = $this->add0($base+1);
		$url = "http://www.paulnoll.com/Books/Clear-English/words-".$num1."-".$num2."-hundred.html";
	}

	private function grabWords($url){
		$contents = file_get_contents($url);
		$reg = "|<li>(.*?)<li>|s";
		$li = [];
		$words = [];
		preg_match_all($reg, $contents, $li);
		foreach($li[0] as $value){
			$words[] = trim($value);
		}
		return $words;
	}

	private function grabFromSpanish(){
		
	}

	public function scrapeDefault(){
		$page1 = $this->getURL();
		$page2 = $this->getURL();

		$list1 = $this->grabWords($page1);
		$list2 = $this->grabWords($page2);

		$list3 = [];
		if($this->spanish){
			$list3 = $this->grabFromSpanish();
		}

		return array_merge($list1, $list2, $list3);
	}
}


?>
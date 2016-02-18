<?php 
/**
 * Grabs most common words from paulnoll.com and should give an array of words to the passgenerator
 */
class DictScraper{

	/**
	 * Reformats single digit numbers for indexing paulnoll's list of words. Helper to getURL()
	 * @param  int $i - number that could be between 1 to 30
	 * @return String - string of number $i where single digit numbers like 1 are returned as "01"
	 */
	private function add0($i){
		if($i < 10){
			$i = "0".$i;
		}
		return $i;
	}

	/**
	 * Formats the url based on the random page found
	 * @return String - url to paulnoll
	 */
	private function getURL(){
		$base = rand(1, 15) * 2 - 1;
		$num1 = $this->add0($base);
		$num2 = $this->add0($base+1);
		$url = "http://www.paulnoll.com/Books/Clear-English/words-".$num1."-".$num2."-hundred.html";
		
		return $url;	
	}

	/**
	 * Goes through html of the site, and grabs the words where the words are in <li> elements
	 * @param  String $url - the page from paulnoll that has the list of words
	 * @return String[] - List of words
	 */
	private function grabWords($url){
		
		// Grab <li>
		$contents = file_get_contents($url);
		$reg = "~<li>(.+?)</li>~s";
		$li = [];	
		preg_match_all($reg, $contents, $li);

		// Extract from <li> tags
		$words = array_map("trim", $li[1]);

		return $words;
	}

	/**
	 * Main public function to start scraping words from paul noll's site
	 * @return String[] - the wordlist
	 */
	public function scrapeDefault(){
		$page1 = $this->getURL();
		$page2 = $this->getURL();

		$list1 = $this->grabWords($page1);
		$list2 = $this->grabWords($page2);

		return array_merge($list1, $list2);
	}
}


?>
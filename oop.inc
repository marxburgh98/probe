<?php
class LetterTile {
	var $position
	var $letterValue
	var $pointValue
	var $revealStatus

# instantiate LetterTile will define in parantheseis as the letter.

	function __construct($tileLetter) {
		$this->letterValue = $tileLetter;
		$this->revealStatus = no;
	}
	function setLetter($newLetter) {
		$this->letter = $newLetter;
	}
	function reveal() {
		$this->revealStatus = yes;
	}
	function getPosition() {
		return $this->position;
	}
	function getLetterValue() {
		return $this->letterValue;
	}
	function getPointValue() {
		return $this->pointValue;
	}
	function getRevealStatus() {
		return $this->revealStatus;
	}
}


for var i=0, i<16, i++ {
	hand[i] = new letterTile(wordArray[i]);
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Probe</title>
		
	</head>
	<body>
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
	function setPointValue($pointValue) {
		$this->pointValue = $pointValue
	}
	function setPosition($position) {
		$this->position = $position
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

# define wordArray
wordArray = array();
wordArray[]='empty';

# define player



class hand {

	var $player
	var $i
	const pointValues = array(5,10,15,15,10,5,5,10,15,15,10,5);
	var $tiles = array();
	
#	for $i=0, $i<12, $i++ {
#		var ${'tile'.$i};
#	}
	
# does variable variables work for tile?
	function __construct {
		for $i=0, $i<12, $i++ {
			$newTile = new letterTile(wordArray[$i]);
			array_push($this->tiles,$newTile);
			$this->tiles[i]->setPointValue(pointValues[$i]);
			$this->tiles[i]->setPosition($i+1);
		}
		
		
#		for $i=0, $i<12, $i++ {
#			$this->{'tile'.$i} = new letterTile(wordArray[$i]);
#			$this->{'tile'.$i}->setPointValue(pointValues[$i]);
#			$this->{'tile'.$i}->setPosition($i+1);
#		}

#		tiles01 = new letterTile
		

	}

}




?>
	</body>
</html>

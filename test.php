<html>
<body>
Test.php.  Learning private public properties on classes.<br />
<?php

	class person {  
		var $name;  

		public $height;  
		protected $social_insurance;  
		private $pinn_number;
		  
		function __construct($persons_name){   
		   $this->name = $persons_name;  
		}       
 		function setPin() {
		$this->pinn_number = '1234'; 
		}
		private function get_pinn_number(){
			return
			$this->pinn_number;  
		} 
		function get_name() {
			return $this->name;
		}	

	}   
			$stefan = new person("Stefan Mischook");   
			echo "Stefan's full name: " .  $stefan->get_name() ;  
				$stefan->setPin();
			/*  
			Since $pinn_number was declared private, this line of code 
			will generate an error. Try it out!   
			*/  
			echo "Tell me private stuff: ".$stefan->get_pinn_number();

			echo "Tell me private stuff: ".$stefan->pinn_number;
?>





<?php
/*
	This SQL query will create the table to store your object.

	CREATE TABLE `hand` (
	`handid` int(11) NOT NULL auto_increment,
	`tile1` letterTile NOT NULL,
	`tile2` letterTile NOT NULL,
	`tile3` letterTile NOT NULL,
	`tile4` letterTile NOT NULL,
	`player` VARCHAR(255) NOT NULL, PRIMARY KEY  (`handid`)) ENGINE=MyISAM;
*/

/**
* <b>hand</b> class with integrated CRUD methods.
* @author Php Object Generator
* @version POG 3.0e / PHP5
* @copyright Free for personal & commercial use. (Offered under the BSD license)
* @link http://www.phpobjectgenerator.com/?language=php5&wrapper=pog&objectName=hand&attributeList=array+%28%0A++0+%3D%3E+%27tile1%27%2C%0A++1+%3D%3E+%27tile2%27%2C%0A++2+%3D%3E+%27tile3%27%2C%0A++3+%3D%3E+%27tile4%27%2C%0A++4+%3D%3E+%27player%27%2C%0A%29&typeList=array+%28%0A++0+%3D%3E+%27letterTile%27%2C%0A++1+%3D%3E+%27letterTile%27%2C%0A++2+%3D%3E+%27letterTile%27%2C%0A++3+%3D%3E+%27letterTile%27%2C%0A++4+%3D%3E+%27VARCHAR%28255%29%27%2C%0A%29
*/
include_once('class.pog_base.php');
class hand extends POG_Base
{
	public $handId = '';

	/**
	 * @var letterTile
	 */
	public $tile1;
	
	/**
	 * @var letterTile
	 */
	public $tile2;
	
	/**
	 * @var letterTile
	 */
	public $tile3;
	
	/**
	 * @var letterTile
	 */
	public $tile4;
	
	/**
	 * @var VARCHAR(255)
	 */
	public $player;
	
	public $pog_attribute_type = array(
		"handId" => array('db_attributes' => array("NUMERIC", "INT")),
		"tile1" => array('db_attributes' => array("TEXT", "LETTERTILE")),
		"tile2" => array('db_attributes' => array("TEXT", "LETTERTILE")),
		"tile3" => array('db_attributes' => array("TEXT", "LETTERTILE")),
		"tile4" => array('db_attributes' => array("TEXT", "LETTERTILE")),
		"player" => array('db_attributes' => array("TEXT", "VARCHAR", "255")),
		);
	public $pog_query;
	
	
	/**
	* Getter for some private attributes
	* @return mixed $attribute
	*/
	public function __get($attribute)
	{
		if (isset($this->{"_".$attribute}))
		{
			return $this->{"_".$attribute};
		}
		else
		{
			return false;
		}
	}
	
	function hand($tile1='', $tile2='', $tile3='', $tile4='', $player='')
	{
		$this->tile1 = $tile1;
		$this->tile2 = $tile2;
		$this->tile3 = $tile3;
		$this->tile4 = $tile4;
		$this->player = $player;
	}
	
	
	/**
	* Gets object from database
	* @param integer $handId 
	* @return object $hand
	*/
	function Get($handId)
	{
		$connection = Database::Connect();
		$this->pog_query = "select * from `hand` where `handid`='".intval($handId)."' LIMIT 1";
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$this->handId = $row['handid'];
			$this->tile1 = $this->Unescape($row['tile1']);
			$this->tile2 = $this->Unescape($row['tile2']);
			$this->tile3 = $this->Unescape($row['tile3']);
			$this->tile4 = $this->Unescape($row['tile4']);
			$this->player = $this->Unescape($row['player']);
		}
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param string $sortBy 
	* @param boolean $ascending 
	* @param int limit 
	* @return array $handList
	*/
	function GetList($fcv_array = array(), $sortBy='', $ascending=true, $limit='')
	{
		$connection = Database::Connect();
		$sqlLimit = ($limit != '' ? "LIMIT $limit" : '');
		$this->pog_query = "select * from `hand` ";
		$handList = Array();
		if (sizeof($fcv_array) > 0)
		{
			$this->pog_query .= " where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$this->pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) != 1)
					{
						$this->pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						if ($GLOBALS['configuration']['db_encoding'] == 1)
						{
							$value = POG_Base::IsColumn($fcv_array[$i][2]) ? "BASE64_DECODE(".$fcv_array[$i][2].")" : "'".$fcv_array[$i][2]."'";
							$this->pog_query .= "BASE64_DECODE(`".$fcv_array[$i][0]."`) ".$fcv_array[$i][1]." ".$value;
						}
						else
						{
							$value =  POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$this->Escape($fcv_array[$i][2])."'";
							$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
						}
					}
					else
					{
						$value = POG_Base::IsColumn($fcv_array[$i][2]) ? $fcv_array[$i][2] : "'".$fcv_array[$i][2]."'";
						$this->pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." ".$value;
					}
				}
			}
		}
		if ($sortBy != '')
		{
			if (isset($this->pog_attribute_type[$sortBy]['db_attributes']) && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$sortBy]['db_attributes'][0] != 'SET')
			{
				if ($GLOBALS['configuration']['db_encoding'] == 1)
				{
					$sortBy = "BASE64_DECODE($sortBy) ";
				}
				else
				{
					$sortBy = "$sortBy ";
				}
			}
			else
			{
				$sortBy = "$sortBy ";
			}
		}
		else
		{
			$sortBy = "handid";
		}
		$this->pog_query .= " order by ".$sortBy." ".($ascending ? "asc" : "desc")." $sqlLimit";
		$thisObjectName = get_class($this);
		$cursor = Database::Reader($this->pog_query, $connection);
		while ($row = Database::Read($cursor))
		{
			$hand = new $thisObjectName();
			$hand->handId = $row['handid'];
			$hand->tile1 = $this->Unescape($row['tile1']);
			$hand->tile2 = $this->Unescape($row['tile2']);
			$hand->tile3 = $this->Unescape($row['tile3']);
			$hand->tile4 = $this->Unescape($row['tile4']);
			$hand->player = $this->Unescape($row['player']);
			$handList[] = $hand;
		}
		return $handList;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $handId
	*/
	function Save()
	{
		$connection = Database::Connect();
		$this->pog_query = "select `handid` from `hand` where `handid`='".$this->handId."' LIMIT 1";
		$rows = Database::Query($this->pog_query, $connection);
		if ($rows > 0)
		{
			$this->pog_query = "update `hand` set 
			`tile1`='".$this->Escape($this->tile1)."', 
			`tile2`='".$this->Escape($this->tile2)."', 
			`tile3`='".$this->Escape($this->tile3)."', 
			`tile4`='".$this->Escape($this->tile4)."', 
			`player`='".$this->Escape($this->player)."' where `handid`='".$this->handId."'";
		}
		else
		{
			$this->pog_query = "insert into `hand` (`tile1`, `tile2`, `tile3`, `tile4`, `player` ) values (
			'".$this->Escape($this->tile1)."', 
			'".$this->Escape($this->tile2)."', 
			'".$this->Escape($this->tile3)."', 
			'".$this->Escape($this->tile4)."', 
			'".$this->Escape($this->player)."' )";
		}
		$insertId = Database::InsertOrUpdate($this->pog_query, $connection);
		if ($this->handId == "")
		{
			$this->handId = $insertId;
		}
		return $this->handId;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $handId
	*/
	function SaveNew()
	{
		$this->handId = '';
		return $this->Save();
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function Delete()
	{
		$connection = Database::Connect();
		$this->pog_query = "delete from `hand` where `handid`='".$this->handId."'";
		return Database::NonQuery($this->pog_query, $connection);
	}
	
	
	/**
	* Deletes a list of objects that match given conditions
	* @param multidimensional array {("field", "comparator", "value"), ("field", "comparator", "value"), ...} 
	* @param bool $deep 
	* @return 
	*/
	function DeleteList($fcv_array)
	{
		if (sizeof($fcv_array) > 0)
		{
			$connection = Database::Connect();
			$pog_query = "delete from `hand` where ";
			for ($i=0, $c=sizeof($fcv_array); $i<$c; $i++)
			{
				if (sizeof($fcv_array[$i]) == 1)
				{
					$pog_query .= " ".$fcv_array[$i][0]." ";
					continue;
				}
				else
				{
					if ($i > 0 && sizeof($fcv_array[$i-1]) !== 1)
					{
						$pog_query .= " AND ";
					}
					if (isset($this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes']) && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'NUMERIC' && $this->pog_attribute_type[$fcv_array[$i][0]]['db_attributes'][0] != 'SET')
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$this->Escape($fcv_array[$i][2])."'";
					}
					else
					{
						$pog_query .= "`".$fcv_array[$i][0]."` ".$fcv_array[$i][1]." '".$fcv_array[$i][2]."'";
					}
				}
			}
			return Database::NonQuery($pog_query, $connection);
		}
	}
}
?>











</body>
</html>
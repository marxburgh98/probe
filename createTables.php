<?php



# Define MySQL Settings
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "root");
define("MYSQL_PASS", "rayoflight");
define("MYSQL_DB", "probe");

$conn = mysql_connect("".MYSQL_HOST."", "".MYSQL_USER."", "".MYSQL_PASS."") or die(mysql_error());
mysql_select_db("".MYSQL_DB."",$conn) or die(mysql_error());


$sql="CREATE TABLE users (id int(6) NOT NULL auto_increment,first varchar(15) NOT NULL,last varchar(15) NOT NULL,phone varchar(20) NOT NULL,mobile varchar(20) NOT NULL,fax varchar(20) NOT NULL,email varchar(30) NOT NULL,web varchar(30) NOT NULL,PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
    * Users
          o user
          o password
          o TurnOrder
          o word
    * Guesses
          o Guesser
          o Guessee
          o letter
          o turn

$sql = "CREATE TABLE users (user varchar(20) NOT NULL, password varchar(20) NOT NULL, turnorder tinyint unsigned, ,";   //////////EDIT ME


$res = mysql_query($sql);




// while ($field = mysql_fetch_array($res))
// {
// $id = $field['id'];
// $name = $field['name'];
//
// echo 'ID: ' . $field['id'] . '<br />';
// echo 'Name: ' . $field['name'] . '<br /><br />';
//
// }


mysql_close();

?>
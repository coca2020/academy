<?php
require_once('Conn.php');

class aboutUs extends Conn

{

protected $error;
//----------------------------------------------
public function fnUpdateAboutUs($title, $content)
{
try {
    //$error;
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE about_us SET title=:title, content=:content");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    // insert another row
    $stmt->execute();
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
return $this->error;
}
//-----------------------------------
public function fnGetAboutUs()
{
try {
    //$error;
    $id=1;
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM  about_us WHERE id=:id");
    $stmt->bindParam(':id', $id);
    // insert another row
    $stmt->execute();
    $result = $stmt->fetchAll();
     //var_dump($result);
return  $result;
    }
catch(PDOException $e)
    {
  //  echo "Error: " . $e->getMessage();
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
if($this->error)
{
    return $this->error;
}

}




}
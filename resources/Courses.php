<?php
require_once('Conn.php');

class Courses extends Conn

{

protected $error;

public function fnAddCat($cat_name)
{
try {
    //$error;
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO cats (cat_name) VALUES (:cat_name)");
    $stmt->bindParam(':cat_name', $cat_name);
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
public function fnGetCats()
{
try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM  cats");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
return  $result;
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
if($this->error)
{
    return $this->error;
}
}



//---------------------DELETE cat-----------------------------------------------
public function deleteCat($id)
{
  try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM cats WHERE  id=?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    }
    catch(PDOException $e) {
    $error= "Error: " . $e->getMessage();
    return $error;
    }
    $conn = null;
 
}

//---------add course
public function fnAddCourse($cat_name,$course_name,$course_content)
{
try {
    //$error;
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO courses (cat_name,course_name,course_content) 
        VALUES (:cat_name,:course_name,:course_content)");
    $stmt->bindParam(':cat_name', $cat_name);
    $stmt->bindParam(':course_name', $course_name);
    $stmt->bindParam(':course_content', $course_content);
    $stmt->execute();
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
return $this->error;
}


//----------------get course names-------------------
public function fnGetCoursesList($cat_name)
{
try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT course_name FROM  courses WHERE  cat_name=?");
    $stmt->bindValue(1, $cat_name);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
return  $result;
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
if($this->error)
{
    return $this->error;
}
}
//----------------get course co0ntent-------------------
public function fnGetCourseContent($course_name)
{
try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM  courses WHERE  course_name=?");
    $stmt->bindValue(1, $course_name);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
return  $result;
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
if($this->error)
{
    return $this->error;
}
}

//----------------get course co0ntent-------------------
public function fnGetCourses()
{
try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // prepare sql and bind parameters
    $stmt = $conn->prepare("SELECT * FROM  courses");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
return  $result;
    }
catch(PDOException $e)
    {
    $this->error = "Error: " . $e->getMessage();
    }
$conn = null;
if($this->error)
{
    return $this->error;
}
}

//---------------------DELETE uSER-----------------------------------------------
public function deleteCourse($id)
{
  try {
    $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlAction = $conn->prepare("DELETE FROM courses WHERE  id=?");
    $sqlAction->bindValue(1, $id);
    $sqlAction->execute();
    }
    catch(PDOException $e) {
    $error= "Error: " . $e->getMessage();
    return $error;
    }
    $conn = null;
 
}

}
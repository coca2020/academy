<?php
/*add relation
ALTER TABLE courses
ADD CONSTRAINT FK_cats
FOREIGN KEY (cat_name) REFERENCES cats(cat_name)
ON UPDATE CASCADE
ON DELETE CASCADE
*/
/*remove relation
ALTER TABLE courses
DROP FOREIGN KEY FK_cats
*/

   require_once('resources/courses.php');
    $coursesModel=new Courses;

    if(isset($_POST['cat_name']))
    {
    	    $cat_name=$_POST['cat_name'];
    $coursesList=$coursesModel->fnGetCoursesList($cat_name);
    echo json_encode($coursesList);

    }

    if(isset($_POST['course_name']))
    {
    $course_name=$_POST['course_name'];
    $coursesContent=$coursesModel->fnGetCourseContent($course_name);
    echo json_encode($coursesContent);
    }

 
 








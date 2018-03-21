<?php 
use Model\Student;
$levelCorrespondance = [
    Student::LEVEL_NORMAL => "NORMAL",
    Student::LEVEL_GOOD => "GOOD",
    Student::LEVEL_SUPER => "VERY GOOD",
];
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Student Creation</title>
    </head>
    <body>
    
    
    <FORM method="POST">
        <input type="text" id="studentName" name="studentName" placeholder="Student name ? ..." >
        <select name="level">
    		<option value="<?php echo Student::LEVEL_NORMAL; ?>"><?php echo $levelCorrespondance[Student::LEVEL_NORMAL]; ?></option>    	
    		<option value="<?php echo Student::LEVEL_GOOD; ?>"><?php echo $levelCorrespondance[Student::LEVEL_GOOD]; ?></option>
    		<option value="<?php echo Student::LEVEL_SUPER; ?>"><?php echo $levelCorrespondance[Student::LEVEL_SUPER]; ?></option>
        </select>
        <button type="submit">CREATE</button>
        <button onclick="location.href='../index.php'" type="button">CANCEL</button>
    </FORM>
    
    
    </body>
</html>








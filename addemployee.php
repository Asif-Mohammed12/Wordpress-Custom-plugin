<?php

global $wpdb;

// Add record
if(isset($_POST['but_submit'])){

  $name = $_POST['txt_name'];
  $uname = $_POST['txt_uname'];
  $email = $_POST['txt_email'];
  $position = $_POST['txt_position'];
  $salary = $_POST['txt_salary'];
  $currentproject = $_POST['txt_currentproject'];
  $tablename = $wpdb->prefix."employee";

  if($name != '' && $uname != '' && $email != ''){
     $check_data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE username='".$uname."' ");
     if(count($check_data) == 0){
       $insert_sql = "INSERT INTO ".$tablename."(name,username,email,position,salary,currentproject) values('".$name."','".$uname."','".$email."','".$position."','".$salary."','".$currentproject."') ";
       $wpdb->query($insert_sql);
       echo "Save sucessfully.";
     }
   }
}
?>
<h1>Add New Entry</h1>
<form method='post' action=''>
  <table>
    <tr>
      <td>Name</td>
      <td><input type='text' name='txt_name'></td>
    </tr>
    <tr>
     <td>Username</td>
     <td><input type='text' name='txt_uname'></td>
    </tr>
    <tr>
     <td>Email</td>
     <td><input type='text' name='txt_email'></td>
    </tr>
    <tr>
     <td>Position</td>
     <td><input type='text' name='txt_position'></td>
    </tr>
    <tr> 
     <td>Salary</td>
     <td><input type='text' name='txt_salary'></td>
    </tr>
    <tr>
     <td>Current Project</td>
     <td><input type='text' name='txt_currentproject'></td>
    </tr>
    <tr>
     <td>&nbsp;</td>
     <td><input type='submit' name='but_submit' value='Submit'></td>
    </tr>
 </table>
</form>
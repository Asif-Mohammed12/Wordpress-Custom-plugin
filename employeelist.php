<?php


global $wpdb;
$tablename = $wpdb->prefix."employee";

// Delete record
if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Entries</h1>

<table class="styled-table">
  <tr class="active-row">
   <th>S.no</th>
   <th>Name</th>
   <th>Username</th>
   <th>Email</th>
   <th>Position</th>
   <th>Salary</th>
   <th>Current Project</th>
   <th>&nbsp;</th>
  </tr>
  <?php
  // Select records
  $entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($entriesList) > 0){
    $count = 1;
    foreach($entriesList as $entry){
      $id = $entry->id;
      $name = $entry->name;
      $uname = $entry->username;
      $email = $entry->email;
      $position = $entry->position;
      $salary = $entry->salary;
      $currentproject = $entry->currentproject;

      echo "<tr>
      <td>".$count."</td>
      <td>".$name."</td>
      <td>".$uname."</td>
      <td>".$email."</td>
      <td>".$position."</td>
      <td>".$salary."</td>
      <td>".$currentproject."</td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No record found</td></tr>";
 }
?>
</table>
<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 1.5em;
    font-family: sans-serif;
    min-width: 90%;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    text-align: left;

}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
</style>
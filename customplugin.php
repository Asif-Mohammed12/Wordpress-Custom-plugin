<?php
/*
   Plugin Name: Employee details plugin
   Plugin URI: asifdesk.herokuapp.com
   description: A simple custom plugin
   Version: 1.0.0
   Author: Asif
   Author URI: asifdesk.herokuapp.com
*/

// Create a new table
function employee_table(){

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
  
    $tablename = $wpdb->prefix."employee";
  
    $sql = "CREATE TABLE $tablename (
    id mediumint(11) NOT NULL AUTO_INCREMENT,
    name varchar(80) NOT NULL,
    username varchar(80) NOT NULL,
    email varchar(80) NOT NULL,
    position varchar(80) NOT NULL,
    salary varchar(80) NOT NULL,
    currentproject varchar(80) NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";
  

    require_once( ABSPATH . 'wp-admin/includes/update.php' );
    dbDelta( $sql );
  
  }
  register_activation_hook( __FILE__, 'employee_table' );

// Add menu
function employeeplugin_menu() {

  add_menu_page(" Employee Plugin", "Employee Plugin","manage_options", "employeeplugin", "employeeList",plugins_url('/asifplugin/icon.png' ));
  add_submenu_page("employeeplugin","All Employee", "All Employee","manage_options", "allemployee", "employeeList");
  add_submenu_page("employeeplugin","Add new Employee", "Add new Employee","manage_options", "addnewemployee", "addEmployee");

}
add_action("admin_menu", "employeeplugin_menu");

function employeeList(){
include "employeelist.php";
}

function addEmployee(){
include "addemployee.php";
}
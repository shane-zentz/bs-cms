<?php

/* Class: Activity
   Author: Shane Zentz 2020
   Desc: This class is built to track important events within a CMS. Events could be creating a page, editing
         a page, deleting a page, creating a backup, logging in, logging out, updating password, etc.
		 
*/

class Activity {

// properties:
// main activity log file:
protected $activityLog = "activityLog.txt";
// parts of the activity:
protected $time = '';		// time of activity
protected $date = '';		// date of activity
protected $event = '';		// the event/activity that has occured
protected $user = '';		// the user who caused the event

// Constructor
  public function __construct()
  {
  }
 
// method to get all of the events in the event/activity log file
public function getActivities(){
  $output = file_get_contents($this->activityLog);
  //return $output;
  return nl2br(htmlentities($output));
}	
  
// method to add an event to the event / activity log file
public function addActivity($user, $event){
	// get current date of activity
	$date = $this->currentDate();
	// get current time of activity
	$time = $this->currentTime();
	// get user who did activity
	$users = $this->user;
	// get the event/activity
	$act = $this->event;
	// string of text
	$input = "User: ".$user."\t"."Event: ".$event."\t"."Date: ".$date."\t"."Time: ".$time."\t\n";
	// the activity file
	$file = $this->activityLog;
	// open the activity log file for writing/appending
	
	file_put_contents($file, $input, FILE_APPEND | LOCK_EX);
}

public function clearActivity(){
	$file = $this->activityLog;
	// open the activity file in write mode
	$fp = fopen($file, "r+");
    // clear content to 0 bits
    ftruncate($fp, 0);
    //close file
    fclose($fp);
	// alert user..
	echo '<script type="text/javascript">alert("Activity History Cleared...");</script>';
header("refresh:2; index.php"); // really should be a fully qualified URI';
}

public function currentDate(){
	$date = date('m/d/Y');
	return $date;
}

public function currentTime(){
	$time = date('H:i:s');
	return $time;
}

}
?>
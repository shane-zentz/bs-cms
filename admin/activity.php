<h2>Activity Logs</h2>
<?php
/* BS-CMS (c) 2020 by Shane Zentz
   this file just gets all activities from the CMS
*/
header('Content-Type: text/plain');
require 'activityClass.php';

$act = new Activity();

// get the entire activities file...?
echo $act->getActivities();
echo '<br><hr><br>';
// button to clear out the activities file...
echo '<form action="clearActivity.php" method="post"><button type="submit" class="btn btn-primary btn-lg" name="action" >Clear Activity History</button></form>'; 

?>
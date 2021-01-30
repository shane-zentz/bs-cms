<h2>Backup Your BS-CMS Installation / Website</h2>
<p>Please click on the 'Backup Now' button to create a new backup</p>

<form action="backup.php" method="post">
	<button type="submit" class="btn btn-primary btn-lg" name="action" >Create Backup Now!</button></form>

<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<h3>Previous Backups</h3>

<?php
//echo '<ul>';
if ($handle = opendir('../backups')) {
   // echo "Directory handle: $handle\n";
   // echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
        echo '<div class="row"><div class="col-sm border p-2 text-center"><strong>Filename:</strong> '.$entry.'</div><div class="col-sm border p-2 text-center"><a href="../backups/'.$entry.'" download> <strong>Download:</strong> '.$entry.'</a></div><div class="col-sm border p-2 text-center"><form action="deleteBackup.php" method="POST"><input type="submit" id="deleteButton'.$entry.'" class="btn btn-danger btn-sm" name="insert" value="DELETE FILE" /><input type="hidden" name="fileName" value="'.$entry.'" /></form></div></div>';
		
		}
    }


    closedir($handle);
	//echo '</ul>';
}

?>
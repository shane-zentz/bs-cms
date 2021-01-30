<?php
/* 
BS-CMS (c) 2020 by Shane Zentz
backup the whole cms directory, put in zip, then move to the /backups folder, just in case something goes wrong... skip backing up previous backups in the /backups folder */

// Get real path for our folder
$rootPath = realpath('../');
//echo 'Root Path: '.$rootPath.'<br>';

// Initialize archive object
$zip = new ZipArchive();
//$date = date('H:i:s-m-d-Y');
$date = date('m.d.Y-H.i.s');

$res = $zip->open( '../backups/'.$date.'_BACKUP.zip' , ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE );


// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
	// also skip previous backup files....assuming only zip files in dir are backups, 
	// probably a better way to do it, but for now it works...
    if (!$file->isDir() && (pathinfo($file, PATHINFO_EXTENSION) != 'zip'))
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
		//echo '$filePath: '.$filePath.'<br>';
        $relativePath = substr($filePath, strlen($rootPath) + 1);
        //echo '$relativePath: '.$relativePath.'<br>';
        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();

echo '<script type="text/javascript">alert("Backup Created...");</script>';
header("refresh:2; index.php"); // really should be a fully qualified URI

?>
<?php
  /*
  BS-CMS (c) 2020 by Shane Zentz
  This file just outputs basic info for the admin dashboard (entry point / start page for admin dashboard)
  UPDATED
  */
   session_start();

if (!isset($_SESSION['nID']))
{
    header("Location: admin-login.php");
    die();
} 
  include('cmsClass.php');
  include('updateCLASS.php');
  $cms = new CMS();
  $version = $cms->getVersion();
  $update = new updateCMS();
  $remoteVersion = $update->getLatestRemoteVersion();
  $shouldstUpdate = $update->checkForUpdates();
  echo '<div class="card-deck m-2"> <div class="card"><div class="card-header white text-center" style="font-weight: bold;font-size: large;background-color: #5a656f;color: white;font-size: 26px;">Server:</div><div class="card-body bg-light text-dark">';
  echo '<h5><strong>Server URI: </strong>'.$_SERVER[HTTP_HOST].'</h5>';
  echo '<h4><strong>Server Header Information: </strong></h4>';
  print_r(get_headers('https://'.$_SERVER[HTTP_HOST]));
  echo '</div></div>';
  
  $date = date('H:i:s m-d-Y');
  echo '<div class="card"><div class="card-header  white text-center" style="font-weight: bold;font-size: large;background-color: #5a656f;color: white;font-size: 26px;"><strong>Information:</strong></div><div class="card-body bg-light text-dark"><h5>'.$date.'</h5></div><p class="text-center mx-auto"><img src="images/bs-logo.jpg" alt="bs-logo" width="180px" class="align-img-center" /></p></div></div>';

  echo '<div class="card-deck m-2"><div class="card"><div class="card-header white text-center" style="font-weight: bold;font-size: large;background-color: #5a656f;color: white;font-size: 26px;">System:</div><div class="card-body bg-light text-dark">';
  echo '<h5><strong>BS-CMS Version: </strong>'.$version.'</h5>';
  echo '<h6><strong>Available Updates</strong></h6>';
  $updater = $update->checkForUpdates();
  echo $updater;
  //echo '<br>Remote Version: '.$remoteVersion;

  echo '</div></div>';
  echo '<div class="card"><div class="card-header white text-center" style="font-weight: bold;font-size: large;background-color: #5a656f;color: white;font-size: 26px;">User:</div><div class="card-body bg-light text-dark">';
  echo '<h5>Your Information</h5>';
  $yourBrowser = $_SERVER['HTTP_USER_AGENT'];
  echo '<h5><strong>Your Browser: </strong>'.$yourBrowser.'</h5>';
    $yourIP = $_SERVER['REMOTE_ADDR'];
  echo '<h5><strong>Your IP: </strong>'.$yourIP.'</h5>';
  echo '</div>';
  echo '</div></div>';
?>
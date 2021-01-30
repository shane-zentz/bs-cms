<?php
/*
Class: CMS
Author: Shane Zentz 2020
Desc: The main class or entry point of the BS-CMS.
      //please ignore the commented out code, its just for testing...

*/
class CMS {


 // constructor
  function __construct(){}
  /*
  // constructor
  function __construct($user){
  $this->user = $user;
  }
  
   // constructor
  function __construct($user, $password){
  $this->user = $user;
  $this->pass = $password;
  }
  */
  
  // What version is this cms?
  protected $cmsVersion = "1.0.3 (BETA)";
  
  // get the version of this here cms...
  public function getVersion(){ return $this->cmsVersion; }
  
  // start a session for the user...
  public function startSession ($userName) {
	 
	 session_start();
     if (!isset($_SESSION['count'])) {
     $_SESSION['count'] = 0;
     $_SESSION['username'] = $userName;
       } else {
          $_SESSION['count']++;}
  }
 
  // end a session for the user...
  public function endSession () {
	session_start();
    unset($_SESSION['count']);
  }
  
  
    // currently need to correctly check pass hash to compare to val->password
  public function verifry ($file, $user, $pass){
	  echo 'calling verifry...';
	  echo '<br>'.$file.'<br>';
	  $read = file_get_contents($file);
	  echo 'READ VAR...<br>';var_dump($read);echo '<br>';
	  if (json_decode($read, true)) {echo 'trues...';}
	  if (json_decode($read, true) === NULL)  {echo 'NULLL>...';}
	  $reads = json_decode($read, true);
	  //if (is_array($reads)){echo "<h2>Is Array</h2>";}
	  echo '<br>-----------------------------------------------------------------<br><br>';
	  var_dump($reads);
	//echo "<h1>".$pass."</h1>";

    $login = false;                      // the var to return
	$userExists = false;
	$passCorrect = false;
	$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($reads,
    RecursiveIteratorIterator::SELF_FIRST));
	
	foreach ($jsonIterator as $key => $val) {
		//echo "KEY: ".$key."<br>VAl: ".$val."<br>";

	if ($key == 'User' && $val == $user) {
		//echo '<h3>Username Verified...</h3>';
		$userExists = true;}
    if($key =='Password' && password_verify($pass, $val))
		{//echo "<h4>match...</h4>";
		$passCorrect = true;
		}
	if($userExists && $passCorrect) {$login = true;}
  
    }
   return $login;

  }
  
  
}
?>
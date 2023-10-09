<?php
//this file includes all the basic functions

//magic quotes tp cater for unknown use input for all php versions
function mysql_prep($value){
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string"); // php v4.3
	if($new_enough_php){//php v4.3 or higher
	//undo any magic quote effects so mysql_real_escape_string can do its work
		if($magic_quotes_active){
			$value = stripslashes($value);
			}
			$value = mysql_real_escape_string($value);
	}else{//below php v4.3 add the slashes if they are not active
		if(!$magic_quotes_active){
			$value = addslashes($value);
			}//if magic quotes are active then the slashes already exist
		}
		return $value;
	}
	
//function to redirect pages and content
function redirect_to($location = NULL){
	if($location !=NULL){
		header("Location: {$location}");
		exit;
		}
	}
		
//function to confirm a query to check sql
function confirm_query($result_set){
	if (!$result_set) {
		die("Database query failed: " . mysql_error());
	}
	}


/*function close the connection */
function close() {
	return (@mysql_close($connection));
	}
?>

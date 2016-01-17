<?php
function monthDay ($date) {
	$months = array(
					'01' => 'January',
					'02' => 'February',
					'03' => 'March',
					'04' => 'April',
					'05' => 'May',
					'06' => 'June',
					'07' => 'July',
					'08' => 'August',
					'09' => 'September',
					'10' => 'October',
					'11' => 'November',
					'12' => 'December'
					);
	$monthNum = substr($date,5,2);
	$mon = substr($months[$monthNum],0,3);
	$day = substr($date,8,2);
	$monDay[0] = $mon;
	$monDay[1] = $day;
	
	return $monDay;	
}
function getMonthName ($value) {
	$months = array(
					'01' => 'January',
					'02' => 'February',
					'03' => 'March',
					'04' => 'April',
					'05' => 'May',
					'06' => 'June',
					'07' => 'July',
					'08' => 'August',
					'09' => 'September',
					'10' => 'October',
					'11' => 'November',
					'12' => 'December'
					);
	return $months[$value];
}

function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
// limit sentences
function limit_sentence($string, $word_limit)
{
    $words = explode(". ",$string);
    return implode(". ",array_splice($words,0,$word_limit));
}

function email_validation ($email) {
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	if(!preg_match($email_exp,$email)) {
    	return false;
  	}
	else {
		return true;
	}
}
// uta email validation; email_validation is required before using this
function uta_email_validation ($email) {
	$atEmail = explode ('@',$email);
	$dotEmail = explode('.', $atEmail[1]);
	foreach ($dotEmail as $dot) {
		if (strtolower($dot) == 'uta')
			return true;
		else false;
	}
}
// url validation
function isValidURL($url) {
	if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url) or strlen($url)==0)
		return true;
	return false;
}
// current date
function currentDate () {
	$currentDate = date("Y-m-d");
	return $currentDate;
}
// if isset the post value return the post value
function returnPostValue ($postValue, $success_message) {
	if (isset($success_message)) 
		return "";
	elseif(isset($postValue)) 
		return $postValue;
}
// sendd email
function sendEmail ($from, $to, $subject, $message, $bcc) {
	$contentType = 'text/html;charset="UTF-8"';
	
	// create email headers
	$headers = 'From: '.$from."\r\n".
	'Bcc: '.$bcc."\r\n".
	'Content-Type: '.$contentType."\r\n".
	'Reply-To: '.$from."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	@mail($to, $subject, $message, $headers); 
}
// clear string
function clean_string ($string) {
	$bad = array("content-type","bcc:","to:","cc:","href");
	return str_replace($bad,"",$string);
}
// date in US format
function dateInUS ($string) {
	$date = explode("-", $string);
	$day = $date[2];
	$year = $date[0];
	$month = getMonthName($date[1]);
	$dateInUS = $month." ".$day.", ".$year;
	return $dateInUS;
}
// string = mysql timestamp
function dateInUS2 ($string) {
	$timestamp = explode(" ", $string);
	$date = $timestamp[0];
	$date = explode("-", $date);
	$day = $date[2];
	$year = $date[0];
	$month = getMonthName($date[1]);
	$dateInUS = $month.", ".$year;
	return $dateInUS;
}
// date and time for the forum
function dateAndTime ($string) {
	$timestamp = explode(" ", $string);
	$date = $timestamp[0];
	$time = $timestamp[1];
	$time = explode(":", $time);
	$hour = $time[0];
	$minute = $time[1];	
	if ($hour > 12) {
		$ampm = 'PM';
	}
	else {
		$ampm = 'AM';
	}
	// today
	if ($date == date('Y-m-d')) {
		return "Today at $hour:$minute $ampm";
	}
	// yesterday
	else if ($date == date('Y-m-d',strtotime("-1 days"))) {
		return "Yesterday at $hour:$minute $ampm";
	}
	// previous dates
	else {
		return dateInUS($date);
	}
		
}
/** date: month and day **/
function dateMD ($string) {
	$date = explode("-", $string);
	$day = $date[2];
	$year = $date[0];
	$month = getMonthName($date[1]);
	$dateMD = $month." ".$day;
	return $dateMD;
}
/** date: MON, DD **/
function dateMONDD ($string) {
	$date = explode("-", $string);
	$day = $date[2];
	$year = $date[0];
	$month = strtoupper(substr(getMonthName($date[1]),0,3));
	$dateMONDD = $month." ".$day;
	return $dateMONDD;
}
/**
	load images
	input: folder path
	return: file count, file names
**/
function  getFileNames ($folder) {
	$f_path = array ();
	$count = 0;
	if ($handle = opendir("images/events/$folder")) {
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != ".." && strpos($entry, '.jpg',1)) {
				$f_path[$count] = "images/events/$folder/$entry";	
				$count++;
			}	
		}
		closedir($handle);
	}
	return $f_path;
}
/** get thumbs **/
function  getThumbNames ($folder) {
	$f_path = array ();
	$count = 0;
	if ($handle = opendir("images/events/$folder")) {
		while (false !== ($entry = readdir($handle))) {
			if ($entry != "." && $entry != ".." && strpos($entry, '.jpg',1)) {
				$f_path[$count] = "images/events/$folder/thumbs/$entry";	
				$count++;
			}	
		}
		closedir($handle);
	}
	return $f_path;
}
/** fetch IPC Blog **/
function fetch_IPC_blog () {
	$data = file_get_contents('http://blog.ipc.org/feed/');
	$data = simplexml_load_string($data);
	
	$items = array();
	
	foreach ($data->channel->item as $item) {
		$movie = (string)$item->title;
		$items[] = array(
			
			'title'	=> (string)$item->title,
			'date'	=> (string)$item->pubDate,
			'description' => (string)$item->description,
			'link'	=> (string)$item->link
		);
		
	}
	return $items;
}
/** start session if not already started **/
function startSession () {
	//if (session_status() == PHP_SESSION_NONE) {
	
	if (!isset($_SESSION)) {
		session_start();
		session_set_cookie_params(43200);
	}
	
}
?>
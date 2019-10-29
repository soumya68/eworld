<?php

$a='1';
$b=&$a; //& used here for reference of a set to b
$b="2$a";

echo $a.'<br>'; //21
echo $b //21

//out put of below ?

var_dump(0123==123);//bool(false)

var_dump('0123'==123);//bool(true)

var_dump('0123'===123);//bool(false)

///////////

$x=true and false;

var_dump($x);//bool(true

$x=(true and false);

var_dump($x);//bool(false)

///////////////////

$arr=array("0"=>'even',"1"=>'odd');

$check=13;

echo $arr[$check%2];

///////////

unlink(filename) //to delete file

unset(var) //to destroy a variable

/////////////

//class

class Person{


	public $name;
	public $age;

	function __construct($name,$age)
	{
		$this->name=$name;
		$this->age=$age;

	}

	function getUserDetails(){
		return "Hi my name is ".$this->name."my age is".$this->age;
	}

}

//to create php object we have to use a new operator

$obj= new Person("soumya",27);
echo $obj->getUserDetails();



////////

//URL : http://example.com/search.php?search=<script>alert('test')</script>

$search=$_GET['search'];

echo 'Result '.$search;
/// to prevent css (cross-site-scripting)

$search =htmlspecialchars($variable,ENT_QUOTES,'UTF-8');

echo '<br>Result 2 '.$search;

///////////////

//sql injection prevention tips

//$sql="select * from user_data where id='".$id."';

// $sql="select * from user_data where id=:id";

// $sth=$dbh->prepare($sql,[PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY]);

// $sth->execute([':id'=>$id]);

// $users=$sth->fetchAll();

///////////////////////////////////////
//print_r($_SERVER);
echo $_SERVER['SERVER_NAME'];//localhost

The simplest way to get the visitor’s/client’s IP address is using the 
$_SERVER['REMOTE_ADDR'] or $_SERVER['REMOTE_HOST'] variables.

/////////////////////////////////////////
$arr=['1,2,3,4,5'];

foreach ($arr as  $key=>$value) {
	echo $value;
}
////////////

print_r(getdate()['mon']);//// current time & date

//////////////////
setcookie('sample','ram',time()+3600);

//////////////////////////////////////////////


$VAR = 'SOUMYA RANJAN MISHRA';

echo(substr($VAR,0,6));

/////////////////////////////////////

// echo $_SERVER[];


/////////////////////////////////////////////
$file = fopen("test.txt","r");
//Output lines until EOF is reached
while(! feof($file)) {
	$line = fgets($file);
	echo $line. "<br>";
}

fclose($file);


///////////////////////////////////////////

// Opening a file using fopen() function 
// in read/write mode  
$myfile = fopen("gfg.txt", "w+"); 

// writing to file 
fwrite($myfile, 'geeksforgeeks'); 

// Setting the file pointer to 0th  
// position using rewind() function 
rewind($myfile); 

// writing to file on 0th position 
fwrite($myfile, 'geeksportal'); 
rewind($myfile); 

// displaying the contents of the file 
echo fread($myfile, filesize("gfg.txt")); 
fclose($myfile); 


//////////////////////////////////////////////////
//PDF READING

// Store the file name into variable 
$file = 'filename.pdf'; 
$filename = 'filename.pdf'; 

// Header content type 
header('Content-type: application/pdf'); 

header('Content-Disposition: inline; filename="' . $filename . '"'); 

header('Content-Transfer-Encoding: binary'); 

header('Accept-Ranges: bytes'); 

// Read the file 
@readfile($file); 


/////////OR///


// The location of the PDF file 
// on the server 
$filename = "/path/to/the/file.pdf"; 

// Header content type 
header("Content-type: application/pdf"); 

header("Content-Length: " . filesize($filename)); 

// Send the file to the browser. 
readfile($filename);
//////////////////////////////////////

// SWAP 2 NUM WITHOUT THIRD VARIABLE

$a=20;   
$b=30;

$a=$a+$b;//20+30=50
$b=$a-$b;//50-30=20

$a=$a-$b;//50-20=30


//// SWAP 2 NUM WITH HELP OF A THIRD VARIABLE

$a=30;
$b=50;

$temp=$a;// 30
$a=$b;//50

$b=$teml;//30



///////////////////////////////////
//PRINT A TRIANGLE

for($i=0;$i<=5;&i++)
{
	for($a=0;$a<=$i;$a++){
		echo '*';
	}
	echo '<br>'
}


////////////////////////////

init_set('display_errors',1)   // it will show errors if value is 1,not 0


///////////////////////////////

/// to remove duplicate items from an array

$array=array(2,3,4,3,2,5,6,3,7,6,5,9,2);

$array2=[];

foreach ($array as $key => $value) {
	$array2[$value]=$value;
}

print_r($array2);

$array=array(2,3,4,3,2,5,6,3,7,6,5,9,2);

//$array2=array_unique($array); to remove duplicate items

//$array2=array_reverse($array);  to print reverse a array

//$array2=array_sum($array); to add all items values

in_array("playing", $hobbies_array)

$array2=array_r($array);



print_r($array2);

////////////////////////////////////////////

SQL INJECTION PREVENTION

$stmt = $conn->prepare('SELECT * FROM employees WHERE name = ?');
$stmt->bind_param('s', $name); // 's' specifies the variable type => 'string'

$stmt->execute();

$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    // Do something with $row
}

OR

$stmt = $dbh->prepare("INSERT INTO Customers (CustomerName,Address,City)
	VALUES (:nam, :add, :cit)");
$stmt->bindParam(':nam', $txtNam);
$stmt->bindParam(':add', $txtAdd);
$stmt->bindParam(':cit', $txtCit);
$stmt->execute();

//////////////////////////////////////

///REST INSERT API



$con=mysqli_connect('localhost','root','','apitest');


$name=$_POST['name'];
$mob=$_POST['mob'];

$query=mysqli_query($con,"insert into data (name,mob) values ('$name','$mob')");


if ($query==true) {


// Get last insert id 
	$lastid = mysqli_insert_id($con); 

	$user = array(
		'status'=>true, 
		'result'=>$lastid,
	);
}
else{
	$user = array(
		'status'=>false, 
		'result'=>'',
	);
 //adding the user data in response 
}

echo json_encode($user);


///////////////////////////////REST RETRIVE API

$con=mysqli_connect('localhost','root','','apitest');

$data=[];

$query=mysqli_query($con,"select * from data");

while($row=mysqli_fetch_assoc($query))
{
	array_push($data,$row);
}

if(count($data)>0)
{
	json_encode($data);

	$d['status']=true;
	$d['result']=$data;

}
else{
	json_encode($data);

	$d['status']=false;
	$d['result']=$data;

}

echo json_encode($d);

////////////////////////////////////////////


// initial timings 
echo date('h:i:s') . "\n"; 

// halt for 5 seconds 
sleep(5); ////////////////sleep function holds the script for 5 seconds

// timings after halt 
echo date('h:i:s'); 

//////////////////
# PHP code to convert the first letter to Upper Case 
function firstUpper($string){ 
	return(ucfirst($string)); 
} 
Output:
Welcome to GeeksforGeeks
////////////////////////////////////////////////
# PHP code to convert the first letter  
# of each word to Upper Case 
function firstUpper($string){ 
	return(ucwords($string)); 
} 
Output:
Welcome To GeeksforGeeks 

///////////////////////////////////////////

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day 1day * 30=30 days

here "/" , for cookie avalabale for entire website

To delete a cookie, use the setcookie() function with an expiration date in the past:
// set the expiration date to one hour ago
setcookie("user", "", time() - 3600);


//////////////////////////////////////////check cookies are enable or not
setcookie("user", "", time()+3600,'/');

if(count($_COOKIE) > 0) {
	echo "Cookies are enabled.";
} else {
	echo "Cookies are disabled.";
}

///////////////////////////////////////
The following example uses the filter_var() function to remove all HTML tags from a string:

Example

$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;

////////////////////////////////////////////////////////

json_decode() will return an object or array if second value it's true:

$json = '{"countryId":"84","productId":"1","status":"0","opId":"134"}';
$json_data = json_decode($json, true);
echo $json_data['countryId'];
echo $json_data['productId'];
echo $json_data['status'];
echo $json_data['opId'];                        '

/////////////////////////////////////////
Amazon Elastic Compute Cloud (Amazon EC2) is a web service that provides secure, resizable compute capacity in the cloud. It is designed to make web-scale cloud computing easier for developers.







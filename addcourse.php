<?php
$name=$_POST['addcourse'];
if(!empty($name)){#code...
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="project"; 
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
die('Connect error('.mysqli_connect_error().')'.mysqli_connect_error());

}else{
  $select="SELECT name FROM addcourse WHERE name=? LIMIT 1";
  $insert="INSERT INTO addcourse(name) values(?)";
  $stmt=$conn->prepare($select);
  $stmt->bind_param("s",$name);
  $stmt->execute();
  $stmt->bind_result($name);
  $stmt->store_result();
  $rnum=$stmt->num_rows;
  if($rnum==0){$stmt->close();
  $stmt=$conn->prepare($insert);
$stmt->bind_param("s",$name);
$stmt->execute();
echo "Added";
}else{echo" Already added!";}
}
$stmt->close();
$conn->close();

}
else{
  echo "Required";
  die();
}
  ?>
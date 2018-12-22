

<?php
$serverName = "1.179.194.123\\sqlexpress"; //serverName\instanceName
$connectionInfo = array( "Database"=>"TX", "UID"=>"sa", "PWD"=>"Cnu@!#12345xyz","CharacterSet"=>"UTF-8");
$connTX = sqlsrv_connect( $serverName, $connectionInfo) ;

if( $conn ) {
$res_array = array(); 
$arrCol = array(); 
$sql = "SELECT TOP 20 StudentID , NameTH , SurNameTH FROM Student";
$qr = sqlsrv_query($connTX , $sql) or die("SQL Error!!!");
 while ($rs=sqlsrv_fetch_array($qr)) {
     $arrCol['StudentID'] = $rs['StudentID'];
     $arrCol['NameTH'] = $rs['NameTH'];
     $arrCol['SurNameTH'] = $rs['SurNameTH'];
     array_push($res_array,$arrCol);
 }
     echo json_encode($res_array);

sqlsrv_close($connTX);

}else{
     die( print_r( sqlsrv_errors(), true));
}
?>
<?php
$vncFile=file("/var/log/uvncrepeater.log");
$vncIniFile=file("/etc/uvnc/uvncrepeater.ini");
$string1="Virtual Address,Common Name,Real Address,Last Ref";
$string2="GLOBAL STATS";
$connected="isCodeInIdList";
$users=array();
$usersFound=array();
$startList=0;
for($i=0; $i<count($vncIniFile); $i++){ 							         //example: idlist0=9734734;Username
	if(	strpos($vncIniFile[$i],"idlist") 			    !== false && 
		explode("idlist",$vncIniFile[$i])[0]		    == ""		  &&   // nothing before the string
		($string=explode("=",$vncIniFile[$i])[1])	  != ""   	&& 	 // 9734734;Username	
		($idListStr=explode("=",$vncIniFile[$i])[0])!= ""   	&& 	 // idlist0	
		($usrID=explode(";",$string)[0])			      != ""   	&& 	 // 9734734
		(	
		  ($usrName=trim(explode(";",$string)[1]))		    != "" || // 9734734		
		  ($usrName=trim(explode("=",$vncIniFile[$i])[0]))!= ""		 // if there is no username use the idlistString
		)														&&
		$usrID!="0"											    
	){	
		$info=array("name" 		=> $usrName,
					      "date" 		=> "");
		$users[$usrID] 		  =$info;
		$usersFound[$usrID] =false;
	}
}

$counter=0;
$goalCounter=count($users);
for($i=count($vncFile); $i>0 && $counter<$goalCounter; $i--){
	foreach ($usersFound as $usrID => $value){
		if(	strpos($vncFile[$i],strval($usrID)) !== false && 
		  	strpos($vncFile[$i],$connected)		  !== false
		){
			$line=$vncFile[$i];
			$p1=explode("Vnc", $line)[1];
			$data=explode(">",$p1)[0];
			$users[$usrID]["date"]=$data;
			unset($usersFound[$usrID]);
			$counter++;
			break;
		}
	
	}
}

?>
<html>
<head>
	<title>
		Online VNC Viewer
	</title>
	<style>
	table, td, th {  
	  border: 1px solid #ddd;
	  text-align: left;

	}

	table {
	  border-collapse: collapse;
	  width: 40%;
	}

	th, td {
	  padding: 15px;
	}
	</style>
</head>
<body>
	<h3>Last seen</h3>
	<table>
	<tr>
		<th>
			Name
		</th>
		<th>
			ID
		</th>
		<th>
			Date
		</th>
	</tr>
	<?php foreach ($users as $key => $value){ ?>
			<tr>
				<td>
					<?= $users[$key]["name"] ?>
				</td>
				<td>
					<?= $key ?>
				</td> 
				<td>
					<?= $users[$key]["date"] ?>
				</td>
			</tr>
	<?php } ?>
	</table>
	<br><br>
<script>setTimeout(function(){ location.reload(); }, 10000);</script>
</body>
</html>

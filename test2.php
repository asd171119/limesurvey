<!----Rhoda 2017/12/010 修改---->
<?php
include( 'connect.php' );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	<?php 
		$ans="SELECT  `12X9X8591` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X775D101` IS NOT NULL GROUP BY  `12X9X8591`";
    	$result_ans = mysql_query($ans) or die('query error0');
		$count_ans=mysql_num_rows($result_ans); 
	?>
<table width="200" border="1" style="text-align: center;" RULES=ALL>
  <tbody>
    <tr>
	<?php //印題目
		/*$sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS Where Table_Name ='lime_survey_12' and DATA_TYPE not like 'datetime'";
 		$result = mysql_query($sql);
 		$count_all=mysql_num_rows($result); 
     	for($i=0;$i<$count_all;$i++){ 
 			$array_all[$i]=mysql_fetch_array($result);
 	 	};
         //第一題
 		$sql_x="SELECT * FROM `lime_questions` WHERE `qid`='860' AND `language`='zh-Hant-TW'";
 		$result_x = mysql_query($sql_x);
 		while($w_x = mysql_fetch_assoc($result_x)){
 			echo "<td>";
 			echo $w_x['question'];
 			echo "</td>";
 		}
 		//正常的後面
 		for($i=6;$i<$count_all;$i++){
             $j=$i+1;
             $first=explode("X",$array_all[$i]['COLUMN_NAME']);
			 $second=explode("X",$array_all[$j]['COLUMN_NAME']);
             $firstQid= mb_substr($first[2],0,3,"utf-8"); //取qid碼 
             $secondQid= mb_substr($second[2],0,3,"utf-8"); //取下次qid碼 
 			if($firstQid!=$secondQid){  //比對這次的qid是否與下次相同
 				$sql_x="SELECT * FROM `lime_questions` WHERE `qid`='$firstQid' AND `language`='zh-Hant-TW'";
 				$result_x = mysql_query($sql_x);
 				while($w_x = mysql_fetch_assoc($result_x)){	
 					if($w_x['type']=='M'||$w_x['type']=='F'){
 						$sql_title="SELECT * FROM `lime_questions` WHERE `parent_qid`='$firstQid' AND `language`='zh-Hant-TW'";
 						$result_title = mysql_query($sql_title);
 						while($w_title = mysql_fetch_assoc($result_title)){
 							echo "<td>";
 							echo $w_x['question'].$w_title['question'];
 							echo "</td>";	
 						}
 					}else{
 						echo "<td>";
 						echo $w_x['question'];
 						echo "</td>";
 					}
 					if($w_x['other']=='Y'){
 						echo "<td>";
 						echo $w_x['question']."其他";
 						echo "</td>";
 					}
 				}
 				
 			}	
 	 	}*/
		?> 
		</tr>
  	</tbody>
</table>
<!-------------------------------------------------------------------------------------------------------------------------------------->
	<?php
		//lime_survey_12
		$all="SELECT * FROM `lime_survey_12`";
 		$result_all = mysql_query($all);
		$count_all=mysql_num_rows($result_all);
		while($rs = mysql_fetch_assoc($result_all)){
				//取key
				$array_key=array();
				$ABC=array();
				$D=array();
 				foreach ($rs as $key=>$value){
					array_push($array_key,$key);
				}//print_r($array_key);
				$count_key=count($array_key);
				//刪除前8個
				for($i=0;$i<8;$i++){
					unset($array_key[$i]);
				}
				
		}
		for($i=8;$i<$count_key;$i++){
			$abc=explode("X",$array_key[$i]);
			if($abc[1]=='12'){
				array_push($D,$array_key[$i]);
			}else{
				array_push($ABC,$array_key[$i]);
			 }
		}//print_r($ABC);
		$count_abc=count($ABC);
		$count_d=count($D);
		for($a=0;$a<$count_abc;$a++){
			for($b=0;$b<$count_d;$b++){
				$abcd="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `$D[$b]` IS NOT NULL GROUP BY  `$ABC[$a]`";
    			$result_abcd = mysql_query($abcd) or die('query error0');
				$count_abcd=mysql_num_rows($result_abcd); 
			}
		}
		for($j=0;$j<$count_abcd;$j++){ 
			$array_abcd[$j]=mysql_fetch_array($result_abcd);	
	 	}print_r($array_abcd);
				
	?>
</body>
</html>
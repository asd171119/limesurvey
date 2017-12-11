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
<table width="200" border="1" style="text-align: center;" RULES=ALL>
  <tbody>
    <tr>	
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
		//key分類ABC
		for($i=8;$i<$count_key;$i++){
			$abc=explode("X",$array_key[$i]);
			if($abc[1]!='12'){
				array_push($ABC,$array_key[$i]);
			}
		}//print_r($ABC);
		$count_abc=count($ABC);
		//sex
		$sql_sex="SELECT `code` FROM `lime_answers` WHERE `qid`='775' AND `language`='zh-Hant-TW'";
 		$result_sex = mysql_query($sql_sex);
		$count_sex=mysql_num_rows($result_sex); 
	//echo $count_sex;
     	for($i=0;$i<$count_sex;$i++){ 
 			$array_sex[$i]=mysql_fetch_array($result_sex);
 	 	};
 		//age
		$sql_age="SELECT `code` FROM `lime_answers` WHERE `qid`='776' AND `language`='zh-Hant-TW'";
 		$result_age = mysql_query($sql_age);
		$count_age=mysql_num_rows($result_age); 
	
     	for($i=0;$i<$count_age;$i++){ 
 			$array_age[$i]=mysql_fetch_array($result_age);
 	 	};//print_r($array_age);
		//education
		$sql_educaton="SELECT `code` FROM `lime_answers` WHERE `qid`='777' AND `language`='zh-Hant-TW'";
 		$result_educaton = mysql_query($sql_educaton);
		$count_educaton=mysql_num_rows($result_educaton); 
	
     	for($i=0;$i<$count_educaton;$i++){ 
 			$array_educaton[$i]=mysql_fetch_array($result_educaton);
 	 	};//print_r($array_educaton);
		//job
		$sql_job="SELECT `code` FROM `lime_answers` WHERE `qid`='778' AND `language`='zh-Hant-TW'";
 		$result_job = mysql_query($sql_job);
		$count_job=mysql_num_rows($result_job); 
	
     	for($i=0;$i<$count_job;$i++){ 
 			$array_job[$i]=mysql_fetch_array($result_job);
 	 	};//print_r($array_job);
		//money
		$sql_money="SELECT `code` FROM `lime_answers` WHERE `qid`='779' AND `language`='zh-Hant-TW'";
 		$result_money = mysql_query($sql_money);
		$count_money=mysql_num_rows($result_money); 
	
     	for($i=0;$i<$count_money;$i++){ 
 			$array_money[$i]=mysql_fetch_array($result_money);
 	 	};//print_r($array_money);
		//live
		$sql_live="SELECT `code` FROM `lime_answers` WHERE `qid`='780' AND `language`='zh-Hant-TW'";
 		$result_live = mysql_query($sql_live);
		$count_live=mysql_num_rows($result_live); 
	
     	for($i=0;$i<$count_live;$i++){ 
 			$array_live[$i]=mysql_fetch_array($result_live);
 	 	};//print_r($array_live);
		
		//sql_sex
		for($b=0;$b<$count_sex;$b++){
			for($a=0;$a<$count_abc;$a++){
				//echo $count_sex;
				$aa=$array_sex[$b]['code'];
				//echo $aa."<br>";
				$sex="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X775D101`='$aa' GROUP BY  `$ABC[$a]`";
				//echo $sex."<br>";
    			$result_sqlsex = mysql_query($sex) or die('query error0');
				$count_sqlsex=mysql_num_rows($result_sqlsex); 
			
				for($j=0;$j<$count_sqlsex;$j++){ 
					$array_sqlsex[$j]=mysql_fetch_array($result_sqlsex);	
					//echo "<tr><td>".$array_sqlsex[$j][0]."</td>";
					//echo "<td>".$array_sqlsex[$j]['COUNT( * )']."</td></tr>";
					print_r($array_sqlsex);
	 			}
			}
		}
		for($j=0;$j<$count_sqlsex;$j++){ 
					$array_sqlsex[$j]=mysql_fetch_array($result_sqlsex);	
					//echo "<tr><td>".$array_sqlsex[$j][0]."</td>";
					//echo "<td>".$array_sqlsex[$j]['COUNT( * )']."</td></tr>";
					//print_r($array_sqlsex);
	 		}
	?>
		</tr>
  	</tbody>
</table>
</body>
</html>
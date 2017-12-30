<!----Rhoda 2017/12/23 修改---->
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
 		$sql_x="SELECT * FROM `lime_answers` WHERE `qid`='859' AND `language`='zh-Hant-TW'";
 		$result_x = mysql_query($sql_x);
 		while($w_x = mysql_fetch_assoc($result_x)){
 			echo "<td>";
 			echo $w_x['answer'];
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
 					if($w_x['type']=='M'){//||$w_x['type']=='F'
 						$sql_title="SELECT * FROM `lime_questions` WHERE `parent_qid`='$firstQid' AND `language`='zh-Hant-TW'";
 						$result_title = mysql_query($sql_title);
 						while($w_title = mysql_fetch_assoc($result_title)){
 							echo "<td>";
 							echo $w_title['question'];
 							echo "</td>";	
 						}
 					}else{
						$sql_ans="SELECT * FROM `lime_answers` WHERE `qid`='$firstQid' AND `language`='zh-Hant-TW'";
 						$result_ans = mysql_query($sql_ans);
 						while($w_ans = mysql_fetch_assoc($result_ans)){
 							echo "<td>";
 							echo $w_ans['answer'];
 							echo "</td>";	
 						}
 					}
 					if($w_x['other']=='Y'){
 						echo "<td>";
 						echo "其他";
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
		//answer
		$sql_answer="SELECT `qid`,`code` FROM `lime_answers` WHERE `language`='zh-Hant-TW'";
 		$result_answer = mysql_query($sql_answer);
		$count_answer=mysql_num_rows($result_answer); 
	
     	for($i=0;$i<$count_answer;$i++){ 
 			$array_answer[$i]=mysql_fetch_array($result_answer);
 	 	};//print_r($array_answer);
		
		//question
		$sql_question="SELECT `qid`,`type` FROM `lime_questions` WHERE `language`='zh-Hant-TW'";
 		$result_question = mysql_query($sql_question);
		$count_question=mysql_num_rows($result_question); 
	
     	for($i=0;$i<$count_question;$i++){ 
 			$array_question[$i]=mysql_fetch_array($result_question);
 	 	};//print_r($array_question);
		
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
					if (preg_match("/other/i", $key)==false) {
						array_push($array_key,$key);
					}
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
		
		/*//sex
		$sql_sex="SELECT `code` FROM `lime_answers` WHERE `qid`='775' AND `language`='zh-Hant-TW'";
 		$result_sex = mysql_query($sql_sex);
		$count_sex=mysql_num_rows($result_sex); 
	
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
		$sql_education="SELECT `code` FROM `lime_answers` WHERE `qid`='777' AND `language`='zh-Hant-TW'";
 		$result_education = mysql_query($sql_education);
		$count_education=mysql_num_rows($result_education); 
	
     	for($i=0;$i<$count_education;$i++){ 
 			$array_education[$i]=mysql_fetch_array($result_education);
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
 	 	};//print_r($array_live);*/
//sql----------------------------------------------------------------------------------------------------------------------------------//
		//問題:重複了很多次
		
		//sql_sex
		$f=array();
		$xx=array();
		//for($b=0;$b<$count_sex;$b++){
			echo "<tr>";
			echo "<td>選項</td>";	
			echo "<td>統計</td>";	
			//echo "<td>選項</td>";s	
			//echo "<td>統計</td>";	
			for($a=0;$a<$count_abc;$a++){
				
				if($ABC[$a]!='12X9X794'&&$ABC[$a]!='12X12X788'&&$ABC[$a]!='12X11X810'&&$ABC[$a]!='12X11X809'){
					$first=explode("X",$ABC[$a]);
					$firstQid=mb_substr($first[2],0,3,"utf-8");
					$type="SELECT  `type` FROM  `lime_questions` WHERE `qid`='$firstQid'";
					$result_sqltype = mysql_query($type) or die('query error0');
					$count_sqltype=mysql_num_rows($result_sqltype); 
					for($i=0;$i<$count_sqltype;$i++){ 
 						$array_type[$i]=mysql_fetch_array($result_sqltype);
						echo $array_type[$i]['type'];
						if($array_type[$i]['type']=='M'){
							$sex="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X775D101` GROUP BY  `12X12X775D101`,`$ABC[$a]`";
    						$result_sqlsex = mysql_query($sex) or die('query error0');
							$count_sqlsex=mysql_num_rows($result_sqlsex); 
							
							for($j=0;$j<$count_sqlsex;$j++){ 
								$array_sqlsex[$j]=mysql_fetch_array($result_sqlsex);
								if($array_sqlsex[$j][0]=='-oth-'){//$array_sqlsex[$j][0]==''||
									unset($array_sqlsex[$j]);
								}
					
								if($array_sqlsex[$j][0]==""){
									echo "<td>空</td>";
								}else{
									echo "<td>".$array_sqlsex[$j][0]."</td>";
								}
					
								echo "<td>".$array_sqlsex[$j][1]."</td>";
							}
 	 					}else{
							/*for($j=0;$j<$count_sqlsex;$j++){
								echo "<td>".$array_sqlsex[$j][0]."</td>";
								echo "<td>".$array_sqlsex[$j][1]."</td>";
							}*/
							//echo "<td>".$array_sqlsex[$j][1]."</td>";
						}//print_r($array_type);
					
					
				} echo "</tr>";
				//print_r($array_sqlsex);
				/*$first=explode("X",$ABC[$a]);
				$second=explode("X",$ABC[$a+1]);
				$firstQid=mb_substr($first[2],0,3,"utf-8");
				$secondQid=mb_substr($second[2],0,3,"utf-8");//echo $firstQid." ".$secondQid."<br>";	
				if($firstQid!=$secondQid){
					for($i=0;$i<$count_question;$i++){ 	
						if($firstQid==$array_question[$i]['qid']){	
							if($array_question[$i]['type']=='L'||$array_question[$i]['type']=='F'){//如果不是多選
								for($ii=0;$ii<$count_answer;$ii++){ //比對選項數量
									if($firstQid==$array_answer[$ii]['qid']){
										$f_count+=1;
									}
								}
								for($x=1;$x<=$f_count;$x++){
									array_push($xx,$x);
								}//print_r($xx);echo "<br>";
								if(in_array($xx,$array_sqlsex[$j][0])==false){
									echo "<td>n</td>";
								}else{
									echo "<td>".$array_sqlsex[$j][1]."</td>";
								}
								//print_r($xx);
								//in_array($x,$array_sqlsex[$j][0])==false
								//echo $f_count."<br>";
								$f_count=0;
							}else{
								//echo "<td>".$array_sqlsex[$j][1]."</td>";
							}
						}
					}
				}*/
				
				}
			}
		//}
		echo "</tr>";
		//sql_age
		for($b=0;$b<$count_age;$b++){
			echo "<tr>";
			for($a=0;$a<$count_abc;$a++){
				$aa=$array_age[$b]['code'];
				$age="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X776`='$aa' GROUP BY  `$ABC[$a]`";
    			$result_sqlage = mysql_query($age) or die('query error0');
				$count_sqlage=mysql_num_rows($result_sqlage); 
			
				for($j=0;$j<$count_sqlage;$j++){ 
					$array_sqlage[$j]=mysql_fetch_array($result_sqlage);	
					//echo "<tr><td>".$array_sqlage[$j][0]."</td>";
					//echo "<td>".$array_sqlage[$j]['COUNT( * )']."</td>";
					//print_r($array_sqlsex);
	 			}
			}
		}echo "</tr>";
		//sql_education
		for($b=0;$b<$count_education;$b++){
			echo "<tr>";
			for($a=0;$a<$count_abc;$a++){
				$aa=$array_education[$b]['code'];
				$education="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X777SQ301`='$aa' GROUP BY  `$ABC[$a]`";
    			$result_sqleducation = mysql_query($education) or die('query error0');
				$count_sqleducation=mysql_num_rows($result_sqleducation); 
			
				for($j=0;$j<$count_sqleducation;$j++){ 
					$array_sqleducation[$j]=mysql_fetch_array($result_sqleducation);	
					//echo "<tr><td>".$array_sqleducation[$j][0]."</td>";
					//echo "<td>".$array_sqleducation[$j]['COUNT( * )']."</td>";
					//print_r($array_sqlsex);
	 			}
			}
		}echo "</tr>";
		//sql_job
		for($b=0;$b<$count_job;$b++){
			echo "<tr>";
			for($a=0;$a<$count_abc;$a++){
				$aa=$array_job[$b]['code'];
				$job="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X778`='$aa' GROUP BY  `$ABC[$a]`";
    			$result_sqljob = mysql_query($job) or die('query error0');
				$count_sqljob=mysql_num_rows($result_sqljob); 
			
				for($j=0;$j<$count_sqljob;$j++){ 
					$array_sqljob[$j]=mysql_fetch_array($result_sqljob);	
					//echo "<tr><td>".$array_sqljob[$j][0]."</td>";
					//echo "<td>".$array_sqljob[$j]['COUNT( * )']."</td>";
					//print_r($array_sqlsex);
	 			}
			}
		}echo "</tr>";
		//sql_money
		for($b=0;$b<$count_money;$b++){
			echo "<tr>";
			for($a=0;$a<$count_abc;$a++){
				$aa=$array_money[$b]['code'];
				$money="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X779D501`='$aa' GROUP BY  `$ABC[$a]`";
    			$result_sqlmoney = mysql_query($money) or die('query error0');
				$count_sqlmoney=mysql_num_rows($result_sqlmoney); 
			
				for($j=0;$j<$count_sqlmoney;$j++){ 
					$array_sqlmoney[$j]=mysql_fetch_array($result_sqlmoney);	
					//echo "<tr><td>".$array_sqlmoney[$j][0]."</td>";
					//echo "<td>".$array_sqlmoney[$j]['COUNT( * )']."</td>";
					//print_r($array_sqlsex);
	 			}
			}
		}echo "</tr>";
		//sql_live
		for($b=0;$b<$count_live;$b++){
			echo "<tr>";
			for($a=0;$a<$count_abc;$a++){
				$aa=$array_live[$b]['code'];
				$live="SELECT  `$ABC[$a]` , COUNT( * ) FROM  `lime_survey_12` WHERE  `12X12X780`='$aa' GROUP BY  `$ABC[$a]`";
    			$result_sqllive = mysql_query($live) or die('query error0');
				$count_sqllive=mysql_num_rows($result_sqllive); 
			
				for($j=0;$j<$count_sqllive;$j++){ 
					$array_sqllive[$j]=mysql_fetch_array($result_sqllive);	
					//echo "<tr><td>".$array_sqllive[$j][0]."</td>";
					//echo "<td>".$array_sqllive[$j]['COUNT( * )']."</td>";
					//print_r($array_sqlsex);
	 			}
			}
		}echo "</tr>";
	?>
		</tr>
  	</tbody>
</table>
</body>
</html>
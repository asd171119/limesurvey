<!----Rhoda 2017/12/010 修改---->
<?php
include( 'connect.php' );
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>問卷統整</title>
</head>


<body>
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
 						foreach ($rs as $key=>$value){
							array_push($array_key,$key);
						}$count_key=count($array_key);
						//刪除前8個
						for($i=0;$i<8;$i++){
							unset($array_key[$i]);
						}
					}
					
			
					//answer
					$ans="SELECT * FROM `lime_answers`";
    				$result_ans = mysql_query($ans) or die('query error0');
					$count_ans=mysql_num_rows($result_ans); 

    				for($j=0;$j<$count_ans;$j++){ 
						$array_ans[$j]=mysql_fetch_array($result_ans);
						if($array_ans[$j]['language']!='zh-Hant-TW'){
							unset($array_ans[$j]);
						}
	 				};
			
					//question
					$qen="SELECT * FROM `lime_questions`";
    				$result_qen = mysql_query($qen) or die('query error0');
					$count_qen=mysql_num_rows($result_qen); 

    				for($k=0;$k<$count_qen;$k++){ 
						$array_qen[$k]=mysql_fetch_array($result_qen);
						if($array_qen[$k]['language']!='zh-Hant-TW'){
							unset($array_qen[$k]);
						}
						//print_r($array_qen[$k]);echo '<br><br>';
	 				};
					//第一題
					for($ak=0;$ak<$count_qen;$ak++){
							if('860'==$array_qen[$ak]['qid']){
								echo "<td>";
								echo $array_qen[$ak]['question']."&nbsp;&nbsp;";
								echo "</td>";
							}
					}
					//找題目
					for($i=9;$i<$count_key;$i++){
						$a=$i+1;
						$first=explode("X",$array_key[$i]);
						$second=explode("X",$array_key[$a]);
            			$firstQid=mb_substr($first[2],0,3,"utf-8"); //取qid碼 
            			$secondQid=mb_substr($second[2],0,3,"utf-8"); //取下次qid碼 
					
						if($firstQid!=$secondQid){$cc=array(); //array_push($cc,$firstQid); print_r($cc);
							for($k=0;$k<$count_qen;$k++){
								if($firstQid==$array_qen[$k]['qid']){
									if($array_qen[$k]['type']=='M'||$array_qen[$k]['type']=='F'){
										for($kk=0;$kk<$count_qen;$kk++){
											if($firstQid==$array_qen[$kk]['parent_qid']){
												echo "<td>";
												echo $array_qen[$k]['question'].$array_qen[$kk]['question']."&nbsp;&nbsp;";
												echo "</td>";
											}
										}
									}else{
												echo "<td>";
												echo $array_qen[$k]['question']."&nbsp;&nbsp;";
												echo "</td>";
											}
										
										
								if($array_qen[$k]['other']=='Y'){
								echo "<td>".$array_qen[$k]['question']."其他&nbsp;&nbsp;</td>";
								}
							}
									
						}
								
					}
					}
					
					//內容
					$all="SELECT * FROM `lime_survey_12`  WHERE `submitdate` is not null";
 					$result_all = mysql_query($all);
					$count_all=mysql_num_rows($result_all);
 					while($rs = mysql_fetch_assoc($result_all)){
						echo "<tr>";
 						foreach ($rs as $key=>$value){
							if($key!='id' && $key!='token' && $key!='submitdate' && $key!='lastpage' && $key!='startlanguage' && $key!='startdate' && $key!='datestamp' && $key!='ipaddr'){
								echo "<td>".$value."&nbsp;&nbsp;</td>";	
							}
						}
						echo "</tr>";
					}
				?>
     			<?php
					//lime_survey_12
					/*$all="SELECT * FROM `lime_survey_12`";
    				$result_all = mysql_query($all) or die('query error0');
					$count_all=mysql_num_rows($result_all); 

    				for($i=0;$i<$count_all;$i++){ 
						$array_all[$i]=mysql_fetch_array($result_all);
	 				};*/
				?>
	
 </tr>
  </tbody>
</table>

</body>

</html>
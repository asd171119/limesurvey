<!----Rhoda 2017/12/03 修改---->
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
    		
    			<?php
					//lime_survey_12
					$all="SELECT * FROM `lime_survey_12`";
    				$result_all = mysql_query($all) or die('query error0');
					$count_all=mysql_num_rows($result_all); 

    				for($i=0;$i<$count_all;$i++){ 
						$array_all[$i]=mysql_fetch_array($result_all);
	 				};
					
					//answer
					$ans="SELECT * FROM `lime_answers`";
    				$result_ans = mysql_query($ans) or die('query error0');
					$count_ans=mysql_num_rows($result_ans); 

    				for($j=0;$j<$count_ans;$j++){ 
						$array_ans[$j]=mysql_fetch_array($result_ans);
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
					
					for($i=8;$i<$count_all;$i++){
						$a=$i+1;
						$first=explode("X",$array_all[$i]);
						$second=explode("X",$array_all[$a]);
            			$firstQid=mb_substr($first[2],0,3,"utf-8"); //取qid碼 
            			$secondQid=mb_substr($second[2],0,3,"utf-8"); //取下次qid碼 
						echo $firstQid;
						/*if($firstQid!=$secondQid){
							if($firstQid==$array_qen[$k]['qid']){
								echo '01';
							}
						}*/
					}
					/*for($i=0;$i<$count_all;$i++){ 
						echo "<tr><td>";
						echo $array_all[$i]['id'];
						echo "</tr></td>";
	 				};*/
				?>
     			<?php
					//lime_survey_12`
					/*$all="SELECT * FROM `lime_survey_12` WHERE `submitdate` is not null ";
 					$result_all = mysql_query($all);
 					while($rs = mysql_fetch_assoc($result_all)){
 						echo '<tr>';
 						foreach ($rs as $key=>$value){
 							if($key!='id' && $key!='token' && $key!='submitdate' && $key!='lastpage' && $key!='startlanguage' && $key!='startdate' && $key!='datestamp' && $key!='ipaddr'){
								echo "<td>";
								echo $value;
								echo "</td>";
 				
 							}
						}
					}*/
				?>
  </tbody>
</table>


</body>

</html>
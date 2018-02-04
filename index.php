<?php
include('connect.php');

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
		}//print_r($array_key);
		//key分類ABC
		$all_Atitle=array();
		$all_Btitle=array();
		$all_Ctitle=array();
		$Aqid=array();
		$Bqid=array();
		$Cqid=array();
		for($i=8;$i<$count_key;$i++){
			$abc=explode("X",$array_key[$i]);
			switch($abc[1]){
				case '9':
					$cut=explode("X",$array_key[$i]);
					$Qid= mb_substr($cut[2],0,3,"utf-8"); 
					array_push($all_Atitle,$array_key[$i]);
					array_push($Aqid,$Qid);
					$count_Aqid=count($Aqid);
					break;
				case '10':
					$cut=explode("X",$array_key[$i]);
					$Qid= mb_substr($cut[2],0,3,"utf-8"); 
					array_push($all_Btitle,$array_key[$i]);
					array_push($Bqid,$Qid);
					$count_Bqid=count($Bqid);
					break;
				case '11':
					$cut=explode("X",$array_key[$i]);
					$Qid= mb_substr($cut[2],0,3,"utf-8"); 
					array_push($all_Ctitle,$array_key[$i]);
					array_push($Cqid,$Qid);
					$count_Cqid=count($Cqid);
					break;
			}
		}

	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>無標題文件</title>
</head>

<body>
	<table width="400" border="1" style="border:1px #000000 solid;float: left" RULES=ALL>
  <tbody>
    <tr>
      <td>A部分</td>
    </tr>
    
     <?php 
	  //question
		for($ii=0;$ii<$count_Aqid;$ii++){
			$j=$ii+1;
			if($Aqid[$ii]!=$Aqid[$j]){
				$asql_question="SELECT `question` FROM `lime_questions` WHERE `language`='zh-Hant-TW' AND `qid`='$Aqid[$ii]' ";
 				$aresult_question = mysql_query($asql_question);
				$acount_question=mysql_num_rows($aresult_question); 
			
				for($i=0;$i<$acount_question;$i++){
					$aarray_question[$i]=mysql_fetch_array($aresult_question);
					echo '<tr><td><a href=#?qid='.$Aqid[$ii].'&title='.$all_Atitle[$ii].'>'.$aarray_question[$i]['question'].'</a></td></tr>';
				}
			}
		}
	  
	  ?>
    
  </tbody>
</table>
<table width="430" border="1" style="border:1px #000000 solid;margin: 0 0 0 10px;float: left" RULES=ALL>
  <tbody>
    <tr>
      <td>B部分</td>
    </tr>
    
     <?php 
	  //question
	  $BB=array();
	  $P_BB=array();
	  $P_ans=array();
		for($ii=0;$ii<$count_Bqid;$ii++){
			$j=$ii+1;
				//題目
				$bsql_question="SELECT `question` FROM `lime_questions` WHERE `language`='zh-Hant-TW' AND `qid`='$Bqid[$ii]' ";
 				$bresult_question = mysql_query($bsql_question);
				$bcount_question=mysql_num_rows($bresult_question); 
			
				for($i=0;$i<$bcount_question;$i++){
					$barray_question[$i]=mysql_fetch_array($bresult_question);
					//array_push($BB,$barray_question[$i]['question']);
					
				}
				//選項
				if($Bqid[$ii]!=$Bqid[$j]){
					$bsql_ans="SELECT `question` FROM  `lime_questions` WHERE  `parent_qid` ='$Bqid[$ii]' AND  `language` =  'zh-Hant-TW' ";
 					$bresult_ans = mysql_query($bsql_ans);
					$bcount_ans=mysql_num_rows($bresult_ans);
				
					for($j=0;$j<$bcount_question;$j++){
					for($i=0;$i<$bcount_ans;$i++){
						$barray_ans[$i]=mysql_fetch_array($bresult_ans);
						//array_push($P_ans,$barray_ans[$i]['question']);
						echo '<tr><td><a href=#?qid='.$Bqid[$ii].'&title='.$all_Btitle[$ii].'>'.$barray_question[$j]['question'].'  '.$barray_ans[$i]['question'].'</a></td></tr>';
						
					}
					}
				}
		}
	  ?>
    
  </tbody>
</table>
<table width="480" border="1" style="border:1px #000000 solid;margin: 0 0 0 10px;float: left" RULES=ALL>
  <tbody>
    <tr>
      <td>C部分</td>
    </tr>
    
     <?php 
	  //question
		for($ii=0;$ii<$count_Cqid;$ii++){
			$j=$ii+1;
			if($Cqid[$ii]!=$Cqid[$j]){
				$csql_question="SELECT `question` FROM `lime_questions` WHERE `language`='zh-Hant-TW' AND `qid`='$Cqid[$ii]' ";
 				$cresult_question = mysql_query($csql_question);
				$ccount_question=mysql_num_rows($cresult_question); 
			
				for($i=0;$i<$ccount_question;$i++){
					$carray_question[$i]=mysql_fetch_array($cresult_question); 
					preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$carray_question[$i]['question'] , $matches);
					$carray_question[$i]['question'] = join('', $matches[0]);
					//echo $carray_question[$i]['question'];
					echo '<tr><td><a href=#?qid='.$Cqid[$ii].'&title='.$all_Ctitle[$ii].'>'.$carray_question[$i]['question'].'</a></td></tr>';
				}
			}
		}
	  
	  ?>
    
  </tbody>
</table>
</body>
</html>
<?php
	include( 'connect.php' );
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>數據分析</title>
</head>

<body>
	<?php 	
		
		//統計樣本數
		$all="SELECT * FROM `lime_survey_12` WHERE `submitdate` is not null";
		$result_all = mysql_query($all);
		$count_all=mysql_num_rows($result_all); 
	
		//統計選項
		$ans=array();
		for($i=1;$i<=5;$i++){
			$choose="SELECT * FROM `lime_survey_12` WHERE `12X9X8591`='$i'";
			$result_choose = mysql_query($choose);
			$count_choose=mysql_num_rows($result_choose); 
			array_push($ans,$count_choose);
		}
	
		//男
		$allboy="SELECT * FROM `lime_survey_12` WHERE `12X12X775D101`='1'";
		$result_allboy = mysql_query($allboy);
		$count_allboy=mysql_num_rows($result_allboy); 

		$ans_boy=array();
		for($j=1;$j<=5;$j++){
			$boy="SELECT * FROM `lime_survey_12` WHERE `12X12X775D101`='1' AND `12X9X8591`='$j'";
			$result_boy = mysql_query($boy);
			$count_boy=mysql_num_rows($result_boy);
			array_push($ans_boy,$count_boy);
		}
	
		//女
		$allgl="SELECT * FROM `lime_survey_12` WHERE `12X12X775D101`='2'";
		$result_allgl = mysql_query($allgl);
		$count_allgl=mysql_num_rows($result_allgl); 

		$ans_gl=array();
		for($j=1;$j<=5;$j++){
			$gl="SELECT * FROM `lime_survey_12` WHERE `12X12X775D101`='2' AND `12X9X8591`='$j'";
			$result_gl = mysql_query($gl);
			$count_gl=mysql_num_rows($result_gl);
			array_push($ans_gl,$count_gl);
		}
	?>
	<h2>請問您現在位於哪一個景點？</h2>
	<table width="852" border="1" style="text-align: center;" RULES=ALL>
  <tbody>
    <tr>
      <td colspan="2">項目</td>
      <td width="100">樣本數</td>
      <td width="100">桃米</td>
      <td width="100">水社</td>
      <td width="100">向山</td>
      <td width="100">伊達邵</td>
      <td width="100">車程</td>
    </tr>
    <tr>
      <td colspan="2">合計</td>
      <td width="100"><?php echo $count_all?></td>
      <td width="100"><?php echo $ans[0]?></td>
      <td width="100"><?php echo $ans[1]?></td>
      <td width="100"><?php echo $ans[2]?></td>
      <td width="100"><?php echo $ans[3]?></td>
      <td width="100"><?php echo $ans[4]?></td>
    </tr>
    <tr>
      <td width="100" rowspan="2">性別</td>
      <td width="100">男</td>
      <td><?php echo $count_allboy?></td>
      <td><?php echo $ans_boy[0]?></td>
      <td><?php echo $ans_boy[1]?></td>
      <td><?php echo $ans_boy[2]?></td>
      <td><?php echo $ans_boy[3]?></td>
      <td><?php echo $ans_boy[4]?></td>
    </tr>
    <tr>
      <td>女</td>
      <td><?php echo $count_allgl?></td>
      <td><?php echo $ans_gl[0]?></td>
      <td><?php echo $ans_gl[1]?></td>
      <td><?php echo $ans_gl[2]?></td>
      <td><?php echo $ans_gl[3]?></td>
      <td><?php echo $ans_gl[4]?></td>
    </tr>
    <tr>
      <td rowspan="6">年齡</td>
      <td>18-24歲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>25-34歲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>35-44歲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>35-54歲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>55-64歲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>65歲以上</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5">教育程度</td>
      <td>國中以下</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>高中職</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>專科</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>大學</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>研究所及以上</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="10">職業</td>
      <td>學生</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>軍警</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>公教人員</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>勞工</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>服務業</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>農林漁牧</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>自由業</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>家管</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>退休人員</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>待業中</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="5">國籍</td>
      <td>亞州</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>美洲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>歐洲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>大洋洲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>非洲</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

</body>
</html>
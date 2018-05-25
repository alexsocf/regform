<html>
<head>
<title>健康問卷調查</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/style.css">
<body>

<div>
<a href="index.php">填寫健康問卷調查</a> | 搜尋問卷調查資料
</div>

<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; $highlight = ''; ?></div>
<?php } ?>
<div class="content">
<form name="frmSearch" method="post" action="">

<table border="0" class="demo-table">

<tr>

<td>請輸入電話號碼:</td>
</tr>
<tr>

<td><input type="text" class="demoInputBox" name="inputphone" value="<?php if(isset($_SESSION['inputphone'])) echo $_SESSION['inputphone']; ?>"></td>


</tr>

<tr>

<td>
	<input type="submit" name="search-user" value="搜尋" class="btnRegister">
</td>


</tr>

</table>
</form>
<?php session_start(); 

 $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(isset($_POST)) {
	$_SESSION = $_POST;

	$inputphone = isset($_SESSION["inputphone"]);
}



if ($inputphone == "")
	{ 
		$error_message = "請輸入資料";
	
	}
	else {

			
				
			$host = "localhost";
			$user = "pos";
	 		$pass = "5fCaRQ5HKDnsYSrR";
	 		$database = "pos";
	 		

			$conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
				$sql = "select * from registered_users where mobile ='".@$_SESSION['inputphone']."'";
				
				if($res = $conn->query($sql)) {
					if($res->fetchColumn() == 0) {
							echo "NO RECORD";
						}
						else{ /* Search 到有 record */ 	?>
						

						<?php
						foreach ($conn->query($sql) as $row) {  ?>

						<div style="width:58%; display: inline-block">姓名 (中文): <?php print $row['cName'] . "\t"; ?></div><div style="width:40%; display: inline-block">電話號碼 : <?php print $row['mobile'] . "\t"; ?></div>
						<div>(英文): <?php print $row['eName'] . "\t"; ?></div>

						<div style="width:58%; display: inline-block">姓別: <?php print $row['gender'] . "\t"; ?></div><div style="width:40%; display: inline-block">高度 : <?php print $row['height_cm'] . "(CM)\t"; ?></div>

						<?php $dob = $row['dob_year'] ." 年 ". $row['dob_month'] ." 月 ". $row['dob_date'] ." 日 "; 
							  $age = 	date('Y') - $row['dob_year'];

						?>

						<div style="width:58%; display: inline-block">出生日期: <?php echo $dob . "\t"; ?></div><div style="width:40%; display: inline-block">年齡 : <?php print $age . " 歲\t"; ?></div>

						<div class="success-message">** 健康 ** </div>
						<div>關注健康問題 :
							<?php 
							
							$healthproblem = "";

							if ($row['hm_q1'] == 1) {$healthproblem = $healthproblem. "高血壓 / 高血糖/ 高血脂, ";}
							if ($row['hm_q2'] == 1) {$healthproblem = $healthproblem. "糖尿病問題, ";}
							if ($row['hm_q3'] == 1) {$healthproblem = $healthproblem. "痛症, ";}
							if ($row['hm_q4'] == 1) {$healthproblem = $healthproblem. "過重過輕, ";}
							if ($row['hm_q5'] == 1) {$healthproblem = $healthproblem. "失眠, ";}
							if ($row['hm_q6'] == 1) {$healthproblem = $healthproblem. "焦慮, ";}
							if ($row['hm_q7'] == 1) {$healthproblem = $healthproblem. "皮膚問題, ";}
							if ($row['hm_q8'] == 1) {$healthproblem = $healthproblem. "心臓問題, ";}
							if ($row['hm_q9'] == 1) {$healthproblem = $healthproblem. "骨質疏鬆, ";}
							
							if ($row['hm_q10'] == 1) 
								{$healthproblem = $healthproblem. "其他 - ".$row["hm_q_other"];
							}

							?></div>
						<div><?php print $healthproblem . "\t"; ?></div>

						<div style="width:58%; display: inline-block">負責同事 : <?php print $row['hm_team'] . "\t"; ?></div><div style="width:40%; display: inline-block">店舖 : <?php print $row['hm_shop'] . "\t"; ?></div>
						<div class="success-message">** 頭髮 ** </div>
						<div>關注頭部問題 : 
							<?php
							
							$hairproblem = "";

							if ($row['hc_q1'] == 1) {$hairproblem = $hairproblem. "脫髮, ";}
							if ($row['hc_q2'] == 1) {$hairproblem = $hairproblem. "生髮, ";}
							if ($row['hc_q3'] == 1) {$hairproblem = $hairproblem. "斑禿, ";}
							if ($row['hc_q4'] == 1) {$hairproblem = $hairproblem. "頭部皮膚 (如:敏感、濕疹、牛皮癬 、頭痕…等) , ";}
							if ($row['hc_q5'] == 1) {$hairproblem = $hairproblem. "產後脫髮, ";}
							if ($row['hc_q6'] == 1) {$hairproblem = $hairproblem. "頭瘡, ";}
							if ($row['hc_q7'] == 1) {$hairproblem = $hairproblem. "頭油, ";}
							if ($row['hc_q8'] == 1) 
								{$hairproblem = $hairproblem. "其他 - ".$row["hc_q_other"];
							}

							

						?></div>
						<div><?php print $hairproblem . "\t"; ?></div>
						<div style="width:58%; display: inline-block">負責同事 : <?php print $row['hc_team'] . "\t"; ?></div><div style="width:40%; display: inline-block">店舖 : <?php print $row['hc_shop'] . "\t"; ?></div>
						<div class="success-message">** 已選購優惠 ** </div>
						<div><?php print $row['hm_buy'] . "\t"; ?></div>
						<div><?php print $row['hc_buy'] . "\t"; ?></div>


						<form action="update.php">
								<input type="submit" value="更新資料" class="btnRegister">
								<input type="hidden" name="searchmobile" value="<?php print $row['mobile']; ?>" />
						</form>

						<?php 					        
							    		}

						/* Search 到有 record (END)*/


								}
						
						}

				
}

?>

</div>
</body>
</html>

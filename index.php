<?php
session_start();

			$host = "localhost";
			$user = "pos";
	 		$pass = "5fCaRQ5HKDnsYSrR";
	 		$db = "pos";
	 		

 $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    // set the PDO error mode to exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST)) {
	$_SESSION = $_POST;

	$cName = isset($_SESSION["cName"]);
	$eName = isset($_SESSION["eName"]);
	$gender = isset($_SESSION["gender"]);
	$mobile = isset($_SESSION["mobile"]);
	$promotion = isset($_SESSION["promotion"]);

	$hm_q1 = isset($_SESSION["hm_q1"]);
	$hm_q2 = isset($_SESSION["hm_q2"]);
	$hm_q3 = isset($_SESSION["hm_q3"]);
	$hm_q4 = isset($_SESSION["hm_q4"]);
	$hm_q5 = isset($_SESSION["hm_q5"]);
	$hm_q6 = isset($_SESSION["hm_q6"]);
	$hm_q7 = isset($_SESSION["hm_q7"]);
	$hm_q8 = isset($_SESSION["hm_q8"]);
	$hm_q9 = isset($_SESSION["hm_q9"]);
	$hm_q10 = isset($_SESSION["hm_q10"]);
	$hm_q_other = isset($_SESSION["hm_q_other"]);
	$hm_team = isset($_SESSION["hm_team"]);
	$hm_team_other = isset($_SESSION["hm_team_other"]);
	$hm_shop = isset($_SESSION["hm_shop"]);
	$hm_buy = isset($_SESSION["hm_buy"]);

	$hc_q1 = isset($_SESSION["hc_q1"]);
	$hc_q2 = isset($_SESSION["hc_q2"]);
	$hc_q3 = isset($_SESSION["hc_q3"]);
	$hc_q4 = isset($_SESSION["hc_q4"]);
	$hc_q5 = isset($_SESSION["hc_q5"]);
	$hc_q6 = isset($_SESSION["hc_q6"]);
	$hc_q7 = isset($_SESSION["hc_q7"]);
	$hc_q_other = isset($_SESSION["hc_q_other"]);
	$hc_team = isset($_SESSION["hc_team"]);
	$hc_team_other = isset($_SESSION["hc_team_other"]);
	$hc_shop = isset($_SESSION["hc_shop"]);
	$hc_buy = isset($_SESSION["hc_buy"]);
	}


/*
if (empty(isset($_SESSION["cName"])) || empty(isset($_SESSION["eName"])) || 
		empty(isset($_SESSION["gender"])) || empty(isset($_SESSION["mobile"]))
	){ 
		$error_message = "請輸入資料";
	
	}
*/

if ($cName == "" || $eName == "" || $mobile == "" || $gender == "") 
	{ 
		$error_message = "請輸入資料";
	
	}

	else
	{
		$feet = $inch = 0;
		

		if (!is_numeric($_SESSION["mobile"])) {
			$error_message = "電話請輸入數字";
		}


		if (!isset($_SESSION["height_feet"]) || $_SESSION["height_feet"] == '') { 
			$feet=0;		}
		else {$feet = $_SESSION["height_feet"]*30.48;}

		if (!isset($_SESSION["height_inch"]) || $_SESSION["height_inch"] == '') { 
			$inch=0;		}
		else {$inch = $_SESSION["height_inch"]*2.54;}

		if (is_numeric($feet) && is_numeric($inch)) {
			$_SESSION["height_cm"] = intval($feet) + intval($inch);
		}

		if(!isset($error_message)) {
			require_once("dbcontroller.php");
			$db_handle = new DBController();
		
				
			$host = "localhost";
			$user = "pos";
	 		$pass = "5fCaRQ5HKDnsYSrR";
	 		$database = "pos";
	 		

			$conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			//$query = "select * from registered_users where mobile ='".@$_SESSION['mobile']."'";
			
			
		$sql = "select * from registered_users where mobile ='".@$_SESSION['mobile']."'";
		if($res = $conn->query($sql)) {
		if($res->fetchColumn() > 0) {
				$error_message = "此電話號碼已登記";
				
			} else {
				
				if(!empty($_SESSION["userEmail"])) {
					if(!isset($error_message)) {
						if (!filter_var($_SESSION["userEmail"], FILTER_VALIDATE_EMAIL)) {
							$error_message = "電郵地址不正確";
							}
						}
					}

				
				if(!isset($error_message)) {
						require_once("dbcontroller.php");
						$db_handle = new DBController();
						$query = "INSERT INTO registered_users (cName, eName, gender, hkid, dob_year, dob_month, dob_date, height_cm, promotion, hm_q1, hm_q2, hm_q3, hm_q4, hm_q5, hm_q6, hm_q7, hm_q8, hm_q9, hm_q10, hm_q_other, hm_team, hm_team_other, hm_shop, hm_buy, hc_q1, hc_q2, hc_q3, hc_q4, hc_q5, hc_q6, hc_q7, hc_q_other, hc_team, hc_team_other, hc_shop, hc_buy, mobile, userEmail, regtime) VALUES
						(
						 '" . $_SESSION["cName"] . "',
						 '" . $_SESSION["eName"] . "', 
						 '" . $_SESSION["gender"] . "', 
						 '" . $_SESSION["hkid"] . "',
						 '" . $_SESSION["dob_year"] . "',
						 '" . $_SESSION["dob_month"] . "',
						 '" . $_SESSION["dob_date"] . "',
						 '" . $_SESSION["height_cm"] . "',
						 '" . $_SESSION["promotion"] . "',
						 '" . $_SESSION["hm_q1"] . "','" . $_SESSION["hm_q2"] . "',
						 '" . $_SESSION["hm_q3"] . "','" . $_SESSION["hm_q4"] . "',
						 '" . $_SESSION["hm_q5"] . "','" . $_SESSION["hm_q6"] . "',
						 '" . $_SESSION["hm_q7"] . "','" . $_SESSION["hm_q8"] . "',
						 '" . $_SESSION["hm_q9"] . "','" . $_SESSION["hm_q10"] . "',
						 '" . $_SESSION["hm_q_other"] . "',
						 '" . $_SESSION["hm_team"] . "', '" . $_SESSION["hm_team_other"] . "',
						 '" . $_SESSION["hm_shop"] . "',
						 '" . $_SESSION["hm_buy"] . "',
						 '" . $_SESSION["hc_q1"] . "','" . $_SESSION["hc_q2"] . "',
						 '" . $_SESSION["hc_q3"] . "','" . $_SESSION["hc_q4"] . "',
						 '" . $_SESSION["hc_q5"] . "','" . $_SESSION["hc_q6"] . "',
						 '" . $_SESSION["hc_q7"] . "','" . $_SESSION["hc_q_other"] . "',
						 '" . $_SESSION["hc_team"] . "','" . $_SESSION["hc_team_other"] . "',
						 '" . $_SESSION["hc_shop"] . "',
						 '" . $_SESSION["hc_buy"] . "',						 
						 '" . $_SESSION["mobile"] . "',
						 '" . $_SESSION["userEmail"] . "',
						 '" . $_SESSION["regtime"] . "'


						)";

						$result = $db_handle->insertQuery($query);
					
					//	if(!empty($result)) {
						if ($result == "1"){
							$error_message = "";
							$success_message = "已成功登記";
							$_SESSION = "";
							session_destroy();
		
						} else {
							$error_message = "連線有問題，請重新再試";	
						}
					}
				}
			}
		}
	}

?>

<html>
<head>
<title>健康問卷調查</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>



</head>
<body>
<div>
填寫健康問卷調查 | <a href="search.php">搜尋問卷調查資料</a>
</div>


<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; $highlight = ''; ?></div>
<?php } ?>

<div class="content">
<form name="frmRegistration" method="post" action="">

<table border="0" class="demo-table">

<tr>

<?php if (!isset($_SESSION["cName"]) || $_SESSION["cName"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>姓名 (中文) <?php echo $highlight; ?></td>
<td><input type="text" class="demoInputBox" name="cName" value="<?php if(isset($_SESSION['cName'])) echo $_SESSION['cName']; ?>"></td>


<?php if (!isset($_SESSION["eName"]) || $_SESSION["eName"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>姓名 (英文)  <?php echo $highlight; ?></td>
<td><input type="text" class="demoInputBox" name="eName" value="<?php if(isset($_SESSION['eName'])) echo $_SESSION['eName']; ?>"></td>
</tr>

<tr>



<?php if (!isset($_SESSION["gender"]) || $_SESSION["gender"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>


<td>姓別 <?php echo $highlight; ?></td>
<td><input type="radio" name="gender" value="男" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="男") { ?>checked<?php  } ?>> 男
<input type="radio" name="gender" value="女" <?php if(isset($_SESSION['gender']) && $_SESSION['gender']=="女") { ?>checked<?php  } ?>> 女
</td>
<td>身份証號碼 /<br> 護照號碼:</td>
<td><input type="text" class="demoInputBox" name="hkid" value="<?php if(isset($_SESSION['hkid'])) echo $_SESSION['hkid']; ?>"></td>
</tr>

<tr>


<?php if (!isset($_SESSION["mobile"]) || $_SESSION["mobile"] == '') { $highlight = "(請輸入)";}else {$highlight = '';}?>

<td>電話號碼 <?php echo $highlight; ?></td>
<td>
	<input type="text" class="demoInputBox" name="mobile" value="<?php if(isset($_SESSION['mobile'])) echo $_SESSION['mobile']; ?>">
	
</td>

<td>Email</td>
<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_SESSION['userEmail'])) echo $_SESSION['userEmail']; ?>"></td>
</tr>


<tr>
<td colspan=4>
	**** 健康檢測必須填寫 出生日期 及 高度 ****
</td>
</tr>

<tr>
<td colspan=4>出生日期
<select name="dob_year" class="dob-class" value="<?php if(isset($_SESSION['dob_year'])) echo $_SESSION['dob_year']; ?>">
<?PHP
    $dob_year = date("Y") - 80; 
    
    for ($i = 0; $i < 80; $i++) 
        {   
            $dob_year++;
            
            if ($dob_year == date("Y")) {
                echo "<option selected>$dob_year</option>";
                }

            echo "<option>$dob_year</option>";
        }
?>
</select>年

<select name="dob_month" class="dob-class" value="<?php if(isset($_SESSION['dob_month'])) echo $_SESSION['dob_month']; ?>">
<?PHP
        
    for ($i = 1; $i < 13; $i++) 
        {   
            $dob_month++;
            
            echo "<option>$dob_month</option>";
        }
?>
</select>月

<select name="dob_date" class="dob-class" value="<?php if(isset($_SESSION['dob_date'])) echo $_SESSION['dob_date']; ?>">
<?PHP
       
    for ($i = 1; $i < 32; $i++) 
        {   
            $dob_date++;
          
            echo "<option>$dob_date</option>";
        }
?>
</select>日
	</td>
</tr>
<tr>

<td colspan=4>高度 
	<input type="text" class="height-class" name="height_cm" value="<?php if(isset($_SESSION['height_cm'])) echo $_SESSION['height_cm']; ?>"> (cm) 或 <input type="text" class="height-class" name="height_feet" value="<?php if(isset($_SESSION['height_feet'])) echo $_SESSION['height_feet']; ?>"> 呎 <input type="text" class="height-class" name="height_inch" value="<?php if(isset($_SESSION['height_inch'])) echo $_SESSION['height_inch']; ?>"> 吋
	
</td>
</tr>



<tr>
<td colspan=4>


<div class="container">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">健康問題</a></li>
    <li><a href="#tabs-2">頭部問題</a></li>
    
  </ul>
  <div id="tabs-1">
   
	<span>關注健康問題 : (可選多項) </span><BR>

	<span colspan=2>
	<?php 
		if(isset($_SESSION['hm_q1']) && ($_SESSION['hm_q1']) =='1')	{$checked = "checked"; } 
			else {$checked = 2;}
	?>
		
		<label>		
		    <input type="checkbox" name="hm_q1" value="1" <?php echo $checked; ?>>
		    高血壓 / 高血糖/ 高血脂
	    </label>

	<?php 
		if(isset($_SESSION['hm_q2']) && ($_SESSION['hm_q2']) =='1')	{$checked2 = "checked"; } 
			else {$checked2 = 2;}
	?>
	    
		<label>		
		    <input type="checkbox" name="hm_q2" value="1" <?php echo $checked2; ?>>
		    糖尿病問題
	    </label>
		
	<?php 
		if(isset($_SESSION['hm_q3']) && ($_SESSION['hm_q3']) =='1')	{$checked3 = "checked"; } 
			else {$checked3 = 2;}
	?>

	    <label>		
		    <input type="checkbox" name="hm_q3" value="1"  <?php echo $checked3; ?>>
		    痛症
	    </label>
	    
	<?php 
		if(isset($_SESSION['hm_q4']) && ($_SESSION['hm_q4']) =='1')	{$checked4 = "checked"; } 
			else {$checked4 = 2;}
	?>

	    <label>		
		    <input type="checkbox" name="hm_q4" value="1"  <?php echo $checked4; ?>>
		    過重過輕
	    </label>
	    
	<?php 
		if(isset($_SESSION['hm_q5']) && ($_SESSION['hm_q5']) =='1')	{$checked5 = "checked"; } 
			else {$checked5 = 2;}
	?>

	    <label>		
		    <input type="checkbox" name="hm_q5" value="1"  <?php echo $checked5; ?>>
		    失眠
	    </label>
	    

	<?php 
		if(isset($_SESSION['hm_q6']) && ($_SESSION['hm_q6']) =='1')	{$checked6 = "checked"; } 
			else {$checked6 = 2;}
	?>

	    <label>		
		    <input type="checkbox" name="hm_q6" value="1"  <?php echo $checked6; ?>>
		    焦慮
	    </label>
	    

	<?php 
		if(isset($_SESSION['hm_q7']) && ($_SESSION['hm_q7']) =='1')	{$checked7 = "checked"; } 
			else {$checked7 = 2;}
	?>
	    <label>		
		    <input type="checkbox" name="hm_q7" value="1"  <?php echo $checked7; ?>>
		    皮膚問題
	    </label>
	    

	<?php 
		if(isset($_SESSION['hm_q8']) && ($_SESSION['hm_q8']) =='1')	{$checked8 = "checked"; } 
			else {$checked8 = 2;}
	?>
	    <label>		
		    <input type="checkbox" name="hm_q8" value="1"  <?php echo $checked8; ?>>
		    心臓問題
	    </label>
	    

	<?php 
		if(isset($_SESSION['hm_q9']) && ($_SESSION['hm_q9']) =='1')	{$checked9 = "checked"; } 
			else {$checked9 = 2;}
	?>
	    <label>		
		    <input type="checkbox" name="hm_q9" value="1"  <?php echo $checked9; ?>>
		    骨質疏鬆
	    </label>
	    

	<?php 
		if(isset($_SESSION['hm_q10']) && ($_SESSION['hm_q10']) =='1')	{$checked10 = "checked"; } 
			else {$checked10 = 2;}
	?>
	    <label>		
		    <input type="checkbox" name="hm_q10" value="1"  <?php echo $checked10; ?>>
		    其他
	    </label>

	    <input type="text" class="height-class" name="hm_q_other" value="<?php if(isset($_SESSION['hm_q_other'])) echo $_SESSION['hm_q_other']; ?>">

	</span>


<BR>
<span>HM負責同事：</span>
<BR>	

<span colspan=3>
	<label>		
	    <input type="radio" name="hm_team" value="Rachel" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Rachel") { ?>checked<?php  } ?>>
	    Rachel
    </label>
    
	<label>		
	    <input type="radio" name="hm_team" value="Nicole" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Nicole") { ?>checked<?php  } ?>>
	    Nicole
    </label>
	
    <label>		
	    <input type="radio" name="hm_team" value="ShanShan" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="ShanShan") { ?>checked<?php  } ?>>
	    Shan Shan
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Paisley" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Paisley") { ?>checked<?php  } ?>>
	    Paisley
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Kitty" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Kitty") { ?>checked<?php  } ?>>
	    Kitty
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Yan" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Yan") { ?>checked<?php  } ?>>
	    Yan
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Regina" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Regina") { ?>checked<?php  } ?>>
	    Regina
    </label>
    
    <label>		
	    <input type="radio" name="hm_team" value="Yuki" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Yuki") { ?>checked<?php  } ?>>
	    Yuki
    </label>
        
    <label>		
	    <input type="radio" name="hm_team7" value="Other" <?php if(isset($_SESSION['hm_team']) && $_SESSION['hm_team']=="Other") { ?>checked<?php  } ?>>
	    其他
    </label>
    <input type="text" class="height-class" name="hm_team_other" value="<?php if(isset($_SESSION['hm_team_other'])) echo $_SESSION['hm_team_other']; ?>">
    
</span>

<BR>

	<span>負責店舖 (HM) : 
	
	<label>		
	    <input type="radio" name="hm_shop" value="TST" <?php if(isset($_SESSION['hm_shop']) && $_SESSION['hm_shop']=="TST") { ?>checked<?php  } ?>>
	    TST
    </label>
    
    <label>		
	    <input type="radio" name="hm_shop" value="CWB" <?php if(isset($_SESSION['hm_shop']) && $_SESSION['hm_shop']=="CWB") { ?>checked<?php  } ?>>
	    CWB
    </label>
    </span>


<BR>

	<span>選購優惠 :
		<label>		
		    <input type="radio" name="hm_buy" value="$698-三項健康" <?php if(isset($_SESSION['hm_buy']) && $_SESSION['hm_buy']=="698三項健康") { ?>checked<?php  } ?>>
		    $698三項健康 - 1）十二經絡磁叉x50 mins 及 2) PT x 60mins 及
							3)火療 x 45mins<BR>
	    </label>
     	<label>		
			    <input type="radio" name="hm_buy" value="NO" <?php if(isset($_SESSION['hm_buy']) && $_SESSION['hm_buy']=="NO") { ?>checked<?php  } ?>>
			    暫不選購
		    </label>
    </span>
	
 </div>


	<div id="tabs-2">
		
		
		<span>關注頭部問題 : (可選多項)</span><BR>
		
		<span colspan=2>
			<label>		

			<?php 
				if(isset($_SESSION['hc_q1']) && ($_SESSION['hc_q1']) =='1')	{$checkedc = "checked"; } 
					else {$checkedc = 2;}
			?>
				    <input type="checkbox" name="hc_q1" value="1" <?php echo $checkedc; ?>>脫髮</label>
			    
			<?php 
				if(isset($_SESSION['hc_q2']) && ($_SESSION['hc_q2']) =='1')	{$checkedc2 = "checked"; } 
					else {$checkedc2 = 2;}
			?>
				<label>		
				    <input type="checkbox" name="hc_q2" value="1" <?php echo $checkedc2; ?>>生髮</label>
				
			<?php 
				if(isset($_SESSION['hc_q3']) && ($_SESSION['hc_q3']) =='1')	{$checkedc3 = "checked"; } 
					else {$checkedc3 = 2;}
			?>
				<label>		
				    <input type="checkbox" name="hc_q3" value="1" <?php echo $checkedc3; ?>>斑禿</label>

			<?php 
				if(isset($_SESSION['hc_q4']) && ($_SESSION['hc_q4']) =='1')	{$checkedc4 = "checked"; } 
					else {$checkedc4 = 2;}
			?>
			    <label>		
				    <input type="checkbox" name="hc_q4" value="1" <?php echo $checkedc4; ?>>頭部皮膚 (如:敏感、濕疹、牛皮癬 、頭痕…等)</label>
			    
			<?php 
				if(isset($_SESSION['hc_q5']) && ($_SESSION['hc_q5']) =='1')	{$checkedc5 = "checked"; } 
					else {$checkedc5 = 2;}
			?>
			    <label>		
				    <input type="checkbox" name="hc_q5" value="1" <?php echo $checkedc5; ?>>產後脫髮</label>
			    
			<?php 
				if(isset($_SESSION['hc_q6']) && ($_SESSION['hc_q6']) =='1')	{$checkedc6 = "checked"; } 
					else {$checkedc6 = 2;}
			?>
			    <label>		
				    <input type="checkbox" name="hc_q6" value="1" <?php echo $checkedc6; ?>>頭瘡</label>
			    

			<?php 
				if(isset($_SESSION['hc_q7']) && ($_SESSION['hc_q7']) =='1')	{$checkedc7 = "checked"; } 
					else {$checkedc7 = 2;}
			?>
			    <label>		
				    <input type="checkbox" name="hc_q7" value="1" <?php echo $checkedc7; ?>>頭油</label>
			    

			<?php 
				if(isset($_SESSION['hc_q8']) && ($_SESSION['hc_q8']) =='1')	{$checkedc8 = "checked"; } 
					else {$checkedc8 = 2;}
			?>
			    <label>		
				<input type="checkbox" name="hc_q_other" value="1" <?php echo $checkedc8; ?>>其他</label>
			    <input type="text" class="height-class" name="hc_q_other" value="<?php if(isset($_SESSION['hc_q_other'])) echo $_SESSION['hc_q_other']; ?>">
			    
			</span>
		
		<BR>
		<span>HC負責同事：</span>
		
		<BR>
		<span colspan=3>
		   <label>		
			    <input type="radio" name="hc_team" value="Yoes"  <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Yoes") { ?>checked<?php  } ?>>
			    Yoes
		    </label>
		    
			<label>		
			    <input type="radio" name="hc_team" value="Ming" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Ming") { ?>checked<?php  } ?>>
			    Ming
		    </label>
			
		    <label>		
			    <input type="radio" name="hc_team" value="Kim"<?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Kim") { ?>checked<?php  } ?>>
			    Kim
		    </label>
		    
		    <label>		
			    <input type="radio" name="hc_team" value="Amy" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Amy") { ?>checked<?php  } ?>>
			    Amy
		    </label>
		    
		    <label>		
			    <input type="radio" name="hc_team" value="Ruby" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Ruby") { ?>checked<?php  } ?>>
			    Ruby
		    </label>
		    
		    <label>		
			    <input type="radio" name="hc_team" value="Yennis" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Yennis") { ?>checked<?php  } ?>>
			    Yennis
		    </label>
		    
		    <label>		
			    <input type="radio" name="hc_team" value="Moon" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Moon") { ?>checked<?php  } ?>>
			    Moon
		    </label>
		    
		    <label>		
			    <input type="radio" name="hc_team" value="Kenneth" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Kenneth") { ?>checked<?php  } ?>>
			    Kenneth
		    </label>
		    <label>		
			    <input type="radio" name="hc_team" value="Tina" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Tina") { ?>checked<?php  } ?>>
			    Tina
		    </label>
		    <label>		
			    <input type="radio" name="hc_team" value="Miu" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Miu") { ?>checked<?php  } ?>>
			    Miu
		    </label>
		    <label>		
			    <input type="radio" name="hc_team" value="Oscar" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Oscar") { ?>checked<?php  } ?>>
			    Oscar
		    </label>
		    <label>		
			    <input type="radio" name="hc_team" value="Car" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Car") { ?>checked<?php  } ?>>
			    Car
		    </label>
		    <label>		
			    <input type="radio" name="hc_team" value="Samuel" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Samuel") { ?>checked<?php  } ?>>
			    Samuel
		    </label>

		        
		    <label>		
			    <input type="radio" name="hc_team" value="Other" <?php if(isset($_SESSION['hc_team']) && $_SESSION['hc_team']=="Other") { ?>checked<?php  } ?>>
			    其他
		    </label>
		    <input type="text" class="height-class" name="hc_team_other" value="<?php if(isset($_SESSION['hc_team_other'])) echo $_SESSION['hc_team_other']; ?>">
		    
		</span>
		
		<BR>

			<span>負責店舖 (HC) :
			<label>		
			    <input type="radio" name="hc_shop" value="TST" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="TST") { ?>checked<?php  } ?>> TST

		    </label>
		    
		    <label>
		    	<input type="radio" name="hc_shop" value="CWB" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="CWB") { ?>checked<?php  } ?>> CWB
		    </label>
		    <label>		
		    	<input type="radio" name="hc_shop" value="MK" <?php if(isset($_SESSION['hc_shop']) && $_SESSION['hc_shop']=="MK") { ?>checked<?php  } ?>> MK
			    
		    </label>
		    </span>
		
		<BR>

			<span>選購優惠 :
			    
		    <label>
			    <input type="radio" name="hc_buy" value="$688/3次-純中藥外敷療程" <?php if(isset($_SESSION['hc_buy']) && $_SESSION['hc_buy']=="688-3times") { ?>checked<?php  } ?>>
			    $688/3次-純中藥外敷療程
		    </label>
		    <label>		
			    <input type="radio" name="hc_buy" value="$788/3次-中藥頭風療程" <?php if(isset($_SESSION['hc_buy']) && $_SESSION['hc_buy']=="788-3times") { ?>checked<?php  } ?>>
			    $788/3次-中藥頭風療程
		    </label>
		    <label>		
			    <input type="radio" name="hc_buy" value="NO" <?php if(isset($_SESSION['hc_buy']) && $_SESSION['hc_buy']=="NO") { ?>checked<?php  } ?>>
			    暫不選購
		    </label>
		    </span>
		
 		</div>
  

	</div>



</div>


<?php 
	if(isset($_SESSION['promotion']) && ($_SESSION['promotion']) =='1')
			{$checked = "checked"; } 
		else
			{$checked = null;}
	?>


<tr>
	<td>最新資訊及推廣優惠:</td>
	<td colspan=3><label>		
	 <input type="checkbox" name="promotion" value="1" <?php echo $checked; ?>>
	    本人不希望接收到德善醫療集團、健康管理及德善健髮的最新資訊及推廣優惠。
    </label></td>

</tr>

  
<tr>
	<td colspan=4>
	本公司會以合法及公正的方式收集、保存及使用各項個人資料，這些資料僅供本公司進行上述預約安排之用。閣下有權電郵至cs@chineseessence.com 或傳真至 28902218 向本公司查詢或更正任何個人資料。<BR><BR>
	<input type="submit" name="register-user" value="進行登記" class="btnRegister">
	<input type="hidden" name="regtime" value="<?php echo time(); ?>" />

	</td>
</tr>

</table>
</form>
</div>

</body></html>
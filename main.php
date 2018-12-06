<html>
	<head><title>职工信息管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
<body>
	<form action="main.php" method="post">
		<tr>
			<td>班组</td>
			<td><select name="class">
					<option value = "制动组">制动组</option>
					<option value = "库检甲班">甲班</option>
					<option value = "库检乙班">乙班</option>
					<option value = "库检丙班">丙班</option>
				  </select>
			<td>年度</td>
			<td><select name="year">
					<option value = "2018">2018</option>
					<option value = "2017">2017</option>
					</select>	  
			<td>月度</td>
			<td><select name="month">
					<option value = "september">九月</option>
					<option value = "october">十月</option>
					<option value = "november">十一月</option>
					<option value = "december">十二月</option>
				  </select>
			</td>
			<td colspan="2" align="center"><input type="submit" value="查询" /></td>
		</tr>
	</form>
	<?php
/*
	//$dbhost = 'localhost:3306';  // mysql服务器主机地址
	//$dbuser = 'root';            // mysql用户名
	//$dbpass = 'jiazijian';          // mysql用户名密码
	//$conn = mysqli_connect($dbhost, $dbuser, $dbpass,'basic_info',3306);
	$conn = mysqli_connect('localhost','root','jiazijian','basic_info',3306);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
echo '连接成功<br />';

mysqli_select_db($conn, 'emis' );
mysqli_close($conn);*/

@$class=$_POST['class'];
@$class='\''.$class.'\'';
echo '<p>'.$class.'</p>';
@ $db = new mysqli('localhost','root','jiazijian','eims');
if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
 //$charset=mysqli_character_set_name($db);  //返回数据库默认字符集的编码utf8
//echo "默认字符集为: " . $charset;
  
$query = "select * from basic_info WHERE class=$class";
  $result = $db->query($query);
  $num_results = $result->num_rows;

  echo "<p>Number of workers found: ".$num_results."</p>";
  	 echo "<tr>
	 <td>姓名</td><td>工号</td><td>班组</td>
	 </tr></br>";
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
	 echo 
	 stripslashes($row['name']);
	 echo stripslashes($row['woker_id']);
	 echo stripslashes($row['class']);
	 echo "</br>";
	 }
	?>
	
</body>
</html>
<html>
	<head><title>职工信息管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
<body>
	<form action="main.php" method="post">
		<tr>
			<td>班组</td>
			<td><select name="class">
					<option value = "zhidongshi">制动室</option>
					<option value = "jiaban">甲班</option>
					<option value = "yiban">乙班</option>
					<option value = "bingban">丙班</option>
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
	
	/*echo '<h4>班组岗位星级评价表</h4></br>'
	
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
@ $db = new mysqli('localhost','root','jiazijian','eims');
if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }
$query = "select * from basic_info";
  $result = $db->query($query);
  $num_results = $result->num_rows;

  echo "<p>Number of workers found: ".$num_results."</p>";
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     echo "<p><strong>".($i+1).". Title: ";
     echo htmlspecialchars(stripslashes($row['title']));
     echo "</strong><br />Author: ";
     echo stripslashes($row['author']);
     echo "<br />ISBN: ";
     echo stripslashes($row['isbn']);
     echo "<br />Price: ";
     echo stripslashes($row['price']);
     echo "</p>";
	?>
	
</body>
</html>
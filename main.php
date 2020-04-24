<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Kutsyn Vladymyr ITech 5 lab</title>
	<script src="ajax.js"></script>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

HEllo world
	<br>
<!--1-->
		<label>Статистика работы в сети клиента (по имени клиента):</label>
		<form action="UserStatistic.php" method="GET">
		<select name='username' id='username'>
			<?php
				include_once 'bd.php';
				$Name_Select = "SELECT name FROM client";
				$sth = $conn->prepare($Name_Select);
				$sth->execute();
				
				$result = $sth->fetchAll(PDO::FETCH_NUM);

				echo '<option selected = "selected">Выберите пользователя</option>';

				foreach($result as $name)
				{
					echo "<option>$name[0]</option>";
				}
				$conn=null;
			?>
			</select>
		</form>	
		<input class="input" type="button" value="Submit" onclick="ClientStats()">	
	
	<div id= "placeholder-UserStats"></div> 

<!--2-->
	<br>
	<!-- <form action="TimeIntervalStatistic.php" method="GET">2 -->
		<label>Статистика работы сети за указанный промужуток времени:</label>
		<br>
		с  <input type="datetime-local" name="startTime" id = "startTime">
		<br>
		по <input type="datetime-local" name="endTime" id = "endTime">
		<br>
		<input class="input" type="button" value="Submit" onclick="NetworkStats()">
	<!-- </form> -->
	<div id= "placeholder-TimeInterval"></div> 

<!--3-->
	<br>
	<!-- <form action="ZeroBalanceUsers.php" method="GET">  -->
		<label>Список клиентов с отрицательным балансом:</label>
		<br>
		<input class="input" type="button"  value="Submit" onclick="ZeroBalance()">
	<!-- </form>  -->
	
	<br>
	<div id="placeholder-zeroBalance"></div>
</body>
</html>

<html>
	<head>
		<meta charset="utf8">
		<title>Наш маленький сайт</title>
	</head>
	<body>
		<?php
		$filename='date.txt';
		
		if (isset($_POST['clearall'])){
			$handler=@fopen($filename,'w');
			if($handler===false) {
					echo 'Не удалось очистить чат';
			} else {
				fclose($handler);
		}
		}
		
		else if (isset($_POST['message'])){
			$handler=@fopen($filename,'a');
			if($handler===false) {
					echo 'Не удалось открыть файл';
			} else {
				$date=(new DateTime)->format('H:i');
				fwrite($handler,$date.': '.$_POST['message']."\n");
				fclose($handler);
			}
		}
			
			$handler=@fopen($filename,'r');
			if($handler===false) {
					echo 'Не удалось открыть файл';
			} else {
			while(!feof($handler)){
				$str=fgets($handler);
				echo "<div class='message'>";
				echo htmlspecialchars($str);
				echo "</div>";
			}
			fclose($handler);
			}
			
			
		?>	
		<form method="post">
			<textarea name="message"></textarea>
			<input type="submit" value="Отправить">
			<input type="submit" name="clearall" value="Очистить">
		</form>		
	
	</body>
</html>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="view" content="width=device-width, initial-scale=1.0">
        <title>Лабораторная работа №4</title>
        <link rel="stylesheet" href="style.css">
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	</head>
	<body class="background">
		<div class="header">
            <h1 id="hd">Лабораторная работа №4</h1>
        </div>
		<div class="main">
			<form class="form" action = "index.php" method="get">
				Введите имя файла:<br>
				<input id="test" type="text", name="filename" value="text.txt"> <br><br>
				<input type="radio", name="action" value="open"> Открыть <br>
				<input type="radio", name="action" value="save"> Сохранить/Создать <br>
				<input type="radio", name="action" value="close"> Закрыть <br><br>
				<input type="submit"> <br><br>
				<textarea id="idtext" name="space"></textarea>		
			</form>
		</div>
		<div class="footer">
            <h2 id="hd">Конец страницы</h2>
        </div> 
	</body>
</html>

<?php
function changeText( $data ){
	echo '<script>';
	echo "$('#idtext').val(".json_encode($data).")";
	echo '</script>';
}

$filename = @$_GET["filename"];
$action = @$_GET["action"];
$space = @$_GET["space"];

if($action !== null)
{	
	if(!strcmp($action, "open"))
	{	
		$file_h = @fopen($filename, "r");
		if(!$file_h)
			echo("Файл не существует!");
		else
		{
			$text = file_get_contents($filename);
			changeText($text);
		}
	}
	
	if(!strcmp($action, "save"))
	{	
		$file_h = @fopen($filename, "w+");	
		fwrite($file_h, $space);
	}
	
	if(!strcmp($action, "close"))
	{
		$file_h = @fopen($filename, "r");
		if($file_h)
			fclose($file_h);		
		else
			echo("Файл уже закрыт!");
	}
}	
?>
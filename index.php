<!DOCTYPE HTML>
<html lang="pl">
<head>
<title>Organizer Weselny</title>
<meta charset="utf-8"/>
<meta name="description" content="Zaplanuj swoje wesele i ślub w najdrobniejszych szczegółach"/>
<meta name="keywords" content="organizacja,wesele,ślub,poprawiny,planowanie"/>
<meta http-equiv="X-UA Compatible" content="IE=edge,chrome=1"/>

</head>
<body>
<h1>Zaplanuj nowe wesele</h1>
	<form action="skrypt.php" method="post">
		Imię Pana Młodego: <input type="text" name="mlody"/></br></br>
		Imię Pan Młodej: <input type="text" name="mloda"/></br></br>
		Podaj datę ślubu: <input type="date" name="data"/></br></br>
		Podaj login: <input type="text" name="login"/></br></br>
		Podaj hasło: <input type="password" name="haslo"/></br></br>
		<input type="submit" value="Utwórz wesele"/>
	</form>
	
<h1>Przejdź do istniejącego wesela</h1>
	<form action="skrypt.php" method="post">
		Podaj login: <input type="text" name="utw_login"/></br></br>
		Podaj hasło: <input type="password" name="utw_haslo"/></br></br>
		<input type="submit" value="Przejdź do wesela"/></br></br>
	</form>
</body>
</html>
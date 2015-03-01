<style>
body{
	margin: auto;
	width: 400px;
	height: 178px;
	margin-top: 50px;
	border: 1px dotted gray;
	font-family: "Segoe UI Light", "Segoe UI", Calibri;
}
h1{
	text-align: center;
}
</style>
<body>
	<h1>Authentification requise</h1>
	<form method=POST action='?' ><table style='margin: auto;'>
		<tr>
			<td>Utilisateur : </td>
			<td><input type="text" value='user' name='user'/></td>
		</tr>
		<tr>
			<td>Mot de passe : </td>
			<td><input type="password" name='pwd'/></td>
		</tr>
	</table>
	<input style='margin: auto; display: block; margin-top: 18px;' type="submit" value='Connexion'/></form>
</body>
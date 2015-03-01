<?php
session_start();
if(isset($_GET['deco']))
	$_SESSION['co_exoTD'] = null;
if(@$_POST['user']=='user'&&@$_POST['pwd']=='U8'){
	$_SESSION['co_exoTD'] = 'yep';
}
if(@$_GET['passkey']=='5B36N7mPanEkM55kpX'){
	$_SESSION['co_exoTD'] = 'yep';
}
if(@$_SESSION['co_exoTD']!='yep'){
	include('login.php');
	exit();
}
?>
<style>
	body{
		margin: 0px;
		padding: 0px;
		font-family: "Segoe UI Light", "Segoe UI", Calibri;
	}
	#menu{
		border: none;
		height: 590px;
		float: left;
		margin-right: 8px;
		background-color: #B3DFFF;
		border-right: 2px solid #CFEAFC;
		padding-top: 5px;
	}
	h1{
		border-bottom: 2px solid #CFEAFC;
		margin: 0px;
		padding: 10px;
	}
	h2{
		margin: 0px;
		font-style: italic;
	}
</style>
<body>
	<?php
	
	$scripts = Array('Question_1_1','Question_1_2');
	$dossier=opendir('scripts_ocaml/');
	while ($File = readdir($dossier))
	{
		if (substr($File, -3) == ".ml")
			$scripts[] = substr($File, 0, -3);
	}
	closedir($dossier);
	if(!in_array(@$_GET['script'], $scripts))
		@$_GET['script'] = 'Question_1_1';
	?>
	<h1>Exo TD partie 1<i style='font-size: 10px; float: right;'><a style='text-decoration: none; color: gray;' href='?deco'>(Se déconnecter)</a></i></h1>
	<form method=GET action='index.php'>
	<select id='menu' name='script' onChange='this.form.submit()' multiple>
		<?php
			foreach($scripts as $opt){
				echo '<option value="'.(($opt=='Partie 1, expressions')?'__part_exp':$opt);
				echo '" '.(($opt==@$_GET['script'])?'selected':'').'> - '.$opt.'</option>';
			}
		?>
	</select></form>
	<div style='padding-left: 5px;'>
	<?php
	if(@$_GET['script']=='Question_1_1'){
		$_GET['q'] = '1.1';
		include('reptd.php');
	}elseif(@$_GET['script']=='Question_1_2'){
		$_GET['q'] = '1.2';
		include('reptd.php');
	}elseif(in_array(@$_GET['script'], $scripts)){
		echo '<h2>Code de la fonction "'.$_GET['script'].'"</h2>';
		$currentScript = file_get_contents('scripts_ocaml/'.@$_GET['script'].'.ml');
		include('geshi.php');
		$geshi =& new GeSHi($currentScript, 'ocaml');
		echo $geshi->parse_code();
		
		$currentScript = str_replace(', ', ',', trim($currentScript));
		$currentScript = str_replace(' ,', ',', $currentScript);
		$currentScript = str_replace('*', '*', $currentScript);
		$currentScript = str_replace(' *', '*', $currentScript);
	
		$name = explode(' ', $currentScript);
		
		$proto = explode(' =', $currentScript);
		$proto = explode('let ', $proto[0]);
		$ppp = explode('rec ', $proto[1]);
		$proto = trim(($name[1]=='rec')?$ppp[1]:$proto[1]);
		
		echo '<br/><h2>Tester la fonction* "'.$_GET['script'].'"</h2>
		<i style="font-size: 12px;">
			(La liste de paramètre est générée selon le code source de la fonction)
		</i>';
		$spaceCut = explode(' ', $proto);
		$params = Array();
		for($i = 1; $i<count($spaceCut); $i++){
			$last = $spaceCut[$i];
			if(substr($last, 0, 1)=='('){
				$pps = explode(':', substr($last, 1, -1), 2);
				$params[] = Array($pps[0], $pps[1]);
			}elseif($last[0]!='?')
				$params[] = Array($last, '?');
		}
		echo '<form method=POST action="index.php?exe=y&script='.$_GET['script'].'" ><table>';
		echo '<tr>';
			echo '<td style="width: 160px;">	<b>Nom du paramètre</b></td>';
			echo '<td style="width: 70px;">		<b>Type		</b></td>';
			echo '<td style="width: 100px;">	<b>Valeur	</b></td>';
		echo '</tr>';
		$listTypes = Array('int', 'float', 'lists');
		foreach($params as $param){
			echo '<tr>';
				echo '<td>'.$param[0].'</td>';
				echo '<td>'.$param[1].'</td>';
				echo '<td><input value="'.@$_POST['_param_'.$param[0]].'" name="_param_'.$param[0].'" type="text"/></td>';
			echo '</tr>';
		}
		echo '<tr><td></td><td></td><td><input type="submit" value="Tester"></td></tr>';
		echo '</table>
		<i style="font-size: 12px;">
			*Les seuls caractères autorisés sont "1234567890.[];", deux ";" consécutifs ne sont pas autorisés.<br/>
			Aussi, les expressions "true" et "false" sont acceptées.
		</i><br/>';
		
		if(@$_GET['exe']=='y'){
			$cmd = $_GET['script'].' ';
			foreach($params as $param){
				$p = @$_POST['_param_'.$param[0]];
				$p = str_replace('true', 'T', $p);
				$p = str_replace('false', 'F', $p);
				$n = '';
				$lastIsDD = false;
				for($i=0; $i<strlen($p); $i++){
					$num = ord($p[$i]);
					if(($num>=48&&$num<=57)||($num==59&&$lastIsDD==false)||($num==46)||
						($num==91)||($num==93)||($num==84)||($num==70)){
						$n.=$p[$i];
						$lastIsDD = $num==59;
					}
				}
				$n = str_replace('T', 'true', $n);
				$n = str_replace('F', 'false', $n);
				$cmd.=$n.' ';
			}
			$cmd = trim($cmd);
			$cmd .= ';;';
			$geshi =& new GeSHi($cmd, 'ocaml');
			echo 'Commande : '.$geshi->parse_code();


 $stdout = $stderr = $status = null;
    $descriptorspec = array(
       0 => array('pipe', 'r'),  // stdout is a pipe that the child will write to
       1 => array('pipe', 'w'),  // stdout is a pipe that the child will write to
       2 => array('pipe', 'w') // stderr is a pipe that the child will write to
    );
	
    $process = proc_open('ocaml', $descriptorspec, $pipes);

			if (is_resource($process)) {
				// $pipes now looks like this:
				// 0 => writeable handle connected to child stdin
				// 1 => readable handle connected to child stdout
				// 2 => readable handle connected to child stderr

				fwrite($pipes[0], $currentScript."\r\n".'print_string "SEPARATEUR";;'."\r\n".$cmd."\r\n".'exit 0;;'."\r\n");
				
				$stdout = stream_get_contents($pipes[1]);
				fclose($pipes[1]);

				$stderr = stream_get_contents($pipes[2]);
				fclose($pipes[2]);

				// It is important that you close any pipes before calling
				// proc_close in order to avoid a deadlock
				$status = proc_close($process);
			}
			$out = $stdout.$stderr;
			$out = explode('# SEPARATEUR- : unit = ()', $out);
			$withoutesp = str_replace("\t", '', str_replace("\r", '', $out[1]));
			$withoutesp = str_replace(' ', '', str_replace("\n", '', $withoutesp));
			
			
			$geshi =& new GeSHi($out[1], 'ocaml');
			echo 'Réponse : '.$geshi->parse_code();
			
			if(strpos($withoutesp, 'expressionhastypeintbutanexpressionwasexpectedoftypefloat')>0)
				echo '<br/><br/><i>Attention, si un ou plusieurs paramètres de la fonction sont
				explicitement float, vous devez écrire le nombre sous la forme "e.d" ou "e.", avec e la partie entière
				du nombre [et d sa partie décimale].</i>';
	
		}
	}
	?>
	</div>
</body>
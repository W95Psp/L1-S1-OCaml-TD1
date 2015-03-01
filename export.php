<?php
function clearFolder($folder)
{
	$dossier=opendir($folder);
	while ($File = readdir($dossier))
	{
		if ($File != "." && $File != "..")
			unlink($folder.$File);
	}
	closedir($dossier);
}
clearFolder('scripts_ocaml/');

$allScripts = file_get_contents('Tout.ml');

$allScripts = explode(';;', $allScripts);

$tt = '';

foreach($allScripts as $script){
	$script = trim($script);
	
	$name = explode(' ', $script);
	
	$proto = explode(' =', $script);
	$proto = explode('let ', $proto[0]);
	$ppp = explode('rec ', $proto[1]);
	$proto = trim(($name[1]=='rec')?$ppp[1]:$proto[1]);
	
	$name = trim(($name[1]=='rec')?$name[2]:$name[1]);
	if($name!=null){
		file_put_contents('scripts_ocaml/'.$name.'.ml', $script.';;');
		$tt .= $proto.'<br/>';
	}
}

echo $tt;
?>
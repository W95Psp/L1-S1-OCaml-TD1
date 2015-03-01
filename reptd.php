<style>
table{
	border: 1px solid gray;
	border-collapse: collapse;
	font-family: "Segoe UI";
}
td{
	padding: 5px;
	padding-bottom: 6px;
	border: 1px solid gray;
}
</style>
<body>
<?php
if(@$_GET['q']==null||!in_array($_GET['q'], Array('1.1', '1.2'))){
	echo '<h2>Question 1.1 ou 1.2 ?</h2><a href="?q=1.1">1.1</a> | <a href="?q=1.2">1.2</a>';
	exit();
}else{
	echo '<h2>Question '.$_GET['q'].' TD</h2>';
}
?>
<table>
<tr id='first'><td><b>Expression</b></td><?php echo ($_GET['q']!='1.2')?'<td><b>Valeur</b></td>':''; ?><td><b>Type</b></td></tr>
<?php
function proche($a, $b){
	return abs($a-$b)<2;
}function reste($x){
	return $x%2;
}function not($b){
	return !$b;
}

include('geshi.php');
$r = (2+(3*(7-5)));

$x = 10;
$y = 5;
$z = true;

if($_GET['q']=='1.2'){
$qs = Array('x + y', 'x < y', 'z and (x == y)', ' z + x', 'reste(x) + y', 'proche(x,y) and (x < y)', 
		'reste(x) = reste(y)', 'intval(abs(x+y)/reste(x))', 'not(z)?reste(y):(x%y)', 'z?reste(x)<1:proche(y,3)',
		'proche(x,y)?z:x', 'proche(reste(x),abs(y)) or z');
}elseif($_GET['q']=='1.1'){
$qs = Array('(2+(3*(7-5)))', '(true or false)', 'not(true and false)',
	'proche(2,7)', 'proche(1,1) and (proche(2,3) and proche(1,3))', ' (reste(3) et reste(5))<3', 'intval((5 + (reste(5)+1))/2)',
	'(reste(5)==1)?reste(2)+1:reste(2);', '(proche(1,4)?false:proche(2,3))',
	' 2+(3*true)','true and false', '(2 < 3) and false', ' proche(1,2,3)', ' proche(1,2) or proche(intval((5*48)/7.33))',
	'proche(reste(5),2)', 'proche(reste(12),3-reste(7))', ' proche(4,2)?2/0:1', ' (1 < 3)?reste(3):true');
}

foreach($qs as $q){
	// die('$result = '.$q.';');
	if(@eval('$result = '.$q.';')===FALSE)
		$type = 'Erreur';
	if($result.''==intval($result).'')
		$type = 'Nombre';
	if(is_bool($result))
		$type = 'Booléen';
	echo '<tr>';
	
	$geshi =& new GeSHi(trim($q), 'php');

	echo '<td style="width: 220px;">'.$geshi->parse_code().'</td>';
	if($type=='Erreur'||$q[0]==' '){
		echo '<td colspan='.(($_GET['q']=='1.2')?1:2).' style="text-align: center;">Erreur</td>';
	}else{
		if($_GET['q']!='1.2'){
			echo '<td style="width: 90px; text-align: center;">'.
			(($type=='Nombre')?'<span style="color: blue;">'.$result.'</span>':'<b>'.($result?'<span style="color: green;">true</span>':'<span style="color: red;">false</span>').'</b>').'</td>';
		}
		echo '<td style="width: 80px;">'.$type.'</td>';
	}
	echo '</tr>';
}
?>
</table>
</body>
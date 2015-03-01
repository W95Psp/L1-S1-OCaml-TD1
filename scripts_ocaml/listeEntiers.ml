let rec listeEntiers (n:int) =
	if n>0 then
		(listeEntiers (n-1)) @ [n]
	else
		[n];;
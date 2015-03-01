let rec sommeInterv (a:int) (b:int) =
	if a > b then
		(print_string "Erreur (sommeInterv) a > b !"; -1)
	else if a=b then
		a
	else
		(sommeInterv (a+1) b)+a;;
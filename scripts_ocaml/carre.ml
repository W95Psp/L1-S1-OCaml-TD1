let rec carre (n:int) =
	if n=0 then
		0
	else
		carre(n-1)+2*n-1;;
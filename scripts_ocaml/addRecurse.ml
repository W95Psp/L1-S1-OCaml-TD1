let rec addRecurse (n:int) =
	if n>1 then
		addRecurse(n-1)+n
	else
		n;;
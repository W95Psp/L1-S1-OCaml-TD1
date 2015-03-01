let rec estPair (n:int) =
	if n>1 then
		estPair(n-2)
	else if n=0 then
		true
	else
		false;;
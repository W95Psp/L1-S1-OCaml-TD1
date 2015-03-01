let rec nbRepart (n:int) (b:int) =
	if n=1 then
		b
	else if b=1 then
		1
	else
		(nbRepart (n-1) (b)) + (nbRepart (n) (b-1));;
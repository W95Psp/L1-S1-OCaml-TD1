let rec sumOdd (n:int) = 
	if (n mod 2)=0 then
		sumOdd (n-1)
	else if n>2 then
		(sumOdd (n-2))+n
	else
		n;;
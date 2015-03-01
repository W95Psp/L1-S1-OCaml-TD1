let rec mul (a:int) (b:int) =
	if a=0 then
		0
	else if (a mod 2)=0 then
		(mul (a/2) b)*2
	else
		(mul ((a-1)/2) b)*2+b;;
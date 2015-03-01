let max3_v1 a b c = 
	if (a > b) && (a > c) then
		a
	else
		if (b>c) && (b>a) then
			b
		else 
			c;;
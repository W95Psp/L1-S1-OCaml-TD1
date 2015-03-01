let rec power (a:int) (b:int) = 
	if b=0 then
		1
	else
		(power a (b-1))*a;;
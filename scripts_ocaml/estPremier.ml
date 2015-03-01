let rec estPremier ?(div=2) (n:int) =
	if (n mod div)=0 then
		false
	else if div>int_of_float(sqrt(float_of_int(n)))+1 then
		true
	else
		estPremier ~div:(div+1) n;;
let xor_v2 (a:bool) (b:bool) = if a && b then
		false
	else if (a=true && b=false) || (a=true && b=false) then
		true
	else
		false;;
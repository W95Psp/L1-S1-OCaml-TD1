let rec tousPairs l =
	if (List.length l)=0 then
		true
	else if ((List.hd l) mod 2)=0 then
		tousPairs (List.tl l)
	else
		false;;
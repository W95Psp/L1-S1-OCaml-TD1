let rec appartientLi l item =
	if (List.length l)=0 then
		false
	else if (List.hd l)=item then
		true
	else
		appartientLi (List.tl l) item;;
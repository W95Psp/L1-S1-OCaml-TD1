let rec listesEgales l1 l2 =
	if (List.length l1)=(List.length l2) then
		if (List.length l1)=0 then
			true
		else if (List.hd l1)=(List.hd l2) then
			listesEgales (List.tl l1) (List.tl l2)
		else
			false
	else
		false;;
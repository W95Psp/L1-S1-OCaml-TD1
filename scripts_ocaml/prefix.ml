let rec prefix l1 l2 =
	if (List.length l1)=0 then
		true
	else if ((List.length l2)=0) || ((List.hd l1)!=(List.hd l2)) then
		false
	else
		prefix (List.tl l1) (List.tl l2);;
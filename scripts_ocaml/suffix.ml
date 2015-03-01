let rec suffix l1 l2 =
	if (List.length l2)>(List.length l1) then
		suffix l1 (List.tl l2)
	else if ((List.length l2)=(List.length l1)) && ((List.length l1)=0) then
		true
	else if (List.length l2)<(List.length l1) then
		false
	else if (List.hd l1)==(List.hd l2) then
		suffix (List.tl l1) (List.tl l2)
	else
		false;;
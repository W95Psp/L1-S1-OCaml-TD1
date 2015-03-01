let rec fusion ?(out=[]) l1 l2 =
	if (List.length l1)=0 then
		out@l2
	else if (List.length l2)=0 then
		out@l1
	else
		if (List.hd l1)>(List.hd l2) then
			fusion ~out:(out@[List.hd l2]) l1 (List.tl l2)
		else
			fusion ~out:(out@[List.hd l2]) (List.tl l1) l2;;
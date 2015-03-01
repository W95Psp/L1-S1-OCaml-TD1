let rec maxList l =
	if (List.length l)=1 then
		List.hd l
	else
		let a = List.hd l in
		let l = List.tl l in
		let b = List.hd l in
		let l = List.tl l in
		if a>b then
			maxList (a :: l)
		else
			maxList (b :: l);;
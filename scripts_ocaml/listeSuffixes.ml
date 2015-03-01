let rec listeSuffixes ?(suffixes=[]) l =
	if (List.length l)=0 then
		suffixes@[[]]
	else
		listeSuffixes ~suffixes:(suffixes@[l]) (List.tl l);;
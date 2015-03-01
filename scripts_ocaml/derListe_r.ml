let rec derListe_r l =
	if (List.length l)=1 then
		List.hd l
	else
		derListe_rec (List.tl l);;
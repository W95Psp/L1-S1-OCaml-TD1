let rec nbOccListe ?(n=0) l item =
	if (List.length l)=0 then
		n
	else if (List.hd l)=item then
		nbOccListe ~n:(n+1) (List.tl l) item
	else
		nbOccListe ~n:n (List.tl l) item;;
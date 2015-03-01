let rec listePrefixes ?(current=[]) ?(lists=[]) ?(n=0) ?(i=(-1)) l =
	if i=(-1) then
		listePrefixes ~lists:lists ~n:n ~i:((List.length l)-n-1) l
	else if n=((List.length l)-1) then
		[l]@lists@[[]]
	else if i=0 then
		listePrefixes ~lists:(lists@[current]) ~n:(n+1) ~i:(-1) l
	else
		listePrefixes ~current:([(List.nth l i)]@current) ~lists:lists ~n:n ~i:(i-1) l;;
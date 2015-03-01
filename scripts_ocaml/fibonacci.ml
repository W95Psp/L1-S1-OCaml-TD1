let rec fibonacci ?(a=0) ?(b=1) (n:int) =
	if n=0 then
		b
	else
		fibonacci ~a:b ~b:(a+b) (n-1);;
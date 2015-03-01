let rec listeInversee ?(outList=[]) inList =
	if (List.length inList)=0 then
		outList
	else
		let tt = [(List.hd inList)]@outList in
		listeInversee ~outList:tt (List.tl inList);;
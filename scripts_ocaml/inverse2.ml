let inverse2 l =
	let a = List.hd l in
	let l = List.tl l in
	let b = List.hd l in
	let l = List.tl l in
	b :: a :: l;;
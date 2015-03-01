let distance a b = abs(a-b);;

let max_custom a b = if a<b then b else a;;

let abs_custom a = if a<0 then -a else a;;

let noteFDS (noteExam:int) (noteCC:int) (coeffExam:int) (coeffCC:int) =
	let first = (float_of_int(noteExam * coeffExam + noteCC * coeffCC) /. 
	float_of_int(coeffExam+coeffCC)) in
	max first (float_of_int noteExam);;

let max3_v1 a b c = 
	if (a > b) && (a > c) then
		a
	else
		if (b>c) && (b>a) then
			b
		else 
			c
	;;

let max3_v2 (a:int) (b:int) (c:int) = 
	max (max a b) (max b c);;

let plusProche a b x = if abs(a-x)>abs(b-x) then b else a;;

let median_c a b c = min (min (max a b) (max b c)) (min (max b c) (max a c));;

let xor_v1 (a:bool) (b:bool) = (a || b) && not(b && a);;

let xor_v2 (a:bool) (b:bool) = if a && b then
		false
	else if (a=true && b=false) || (a=true && b=false) then
		true
	else
		false;;

let rec addRecurse (n:int) =
	if n>1 then
		addRecurse(n-1)+n
	else
		n;;

let rec sommeInterv (a:int) (b:int) =
	if a > b then
		(print_string "Erreur (sommeInterv) a > b !"; -1)
	else if a=b then
		a
	else
		(sommeInterv (a+1) b)+a;;

let rec fibonacci ?(a=0) ?(b=1) (n:int) =
	if n=0 then
		b
	else
		fibonacci ~a:b ~b:(a+b) (n-1);;

let rec carre (n:int) =
	if n=0 then
		0
	else
		carre(n-1)+2*n-1;;

let rec estPair (n:int) =
	if n>1 then
		estPair(n-2)
	else if n=0 then
		true
	else
		false;;
		
let rec sumOdd (n:int) = 
	if (n mod 2)=0 then
		sumOdd (n-1)
	else if n>2 then
		(sumOdd (n-2))+n
	else
		n;;

let rec estPremier ?(div=2) (n:int) =
	if (n mod div)=0 then
		false
	else if div>int_of_float(sqrt(float_of_int(n)))+1 then
		true
	else
		estPremier ~div:(div+1) n;;
		
let rec mul (a:int) (b:int) =
	if a=0 then
		0
	else if (a mod 2)=0 then
		(mul (a/2) b)*2
	else
		(mul ((a-1)/2) b)*2+b;;

let rec power (a:int) (b:int) = 
	if b=0 then
		1
	else
		(power a (b-1))*a;;
		
let rec nbRepart (n:int) (b:int) =
	if n=1 then
		b
	else if b=1 then
		1
	else
		(nbRepart (n-1) (b)) + (nbRepart (n) (b-1));;
		
		
let inverse2 l =
	let a = List.hd l in
	let l = List.tl l in
	let b = List.hd l in
	let l = List.tl l in
	b :: a :: l;;

let rec listeEntiers (n:int) =
	if n>0 then
		(listeEntiers (n-1)) @ [n]
	else
		[n];;
		
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

let derListe l =
	List.nth l ((List.length l)-1);;

let rec derListe_r l =
	if (List.length l)=1 then
		List.hd l
	else
		derListe_rec (List.tl l);;
		
let rec appartientLi l item =
	if (List.length l)=0 then
		false
	else if (List.hd l)=item then
		true
	else
		appartientLi (List.tl l) item;;
		


let rec nbOccListe ?(n=0) l item =
	if (List.length l)=0 then
		n
	else if (List.hd l)=item then
		nbOccListe ~n:(n+1) (List.tl l) item
	else
		nbOccListe ~n:n (List.tl l) item;;

let rec tousPairs l =
	if (List.length l)=0 then
		true
	else if ((List.hd l) mod 2)=0 then
		tousPairs (List.tl l)
	else
		false;;
		
let rec listesEgales l1 l2 =
	if (List.length l1)=(List.length l2) then
		if (List.length l1)=0 then
			true
		else if (List.hd l1)=(List.hd l2) then
			listesEgales (List.tl l1) (List.tl l2)
		else
			false
	else
		false;;
		
let rec prefix l1 l2 =
	if (List.length l1)=0 then
		true
	else if ((List.length l2)=0) || ((List.hd l1)!=(List.hd l2)) then
		false
	else
		prefix (List.tl l1) (List.tl l2);;

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
		
let rec listeInversee ?(outList=[]) inList =
	if (List.length inList)=0 then
		outList
	else
		let tt = [(List.hd inList)]@outList in
		listeInversee ~outList:tt (List.tl inList);;
		
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

let rec listeSuffixes ?(suffixes=[]) l =
	if (List.length l)=0 then
		suffixes@[[]]
	else
		listeSuffixes ~suffixes:(suffixes@[l]) (List.tl l);;
		
let rec listePrefixes ?(current=[]) ?(lists=[]) ?(n=0) ?(i=(-1)) l =
	if i=(-1) then
		listePrefixes ~lists:lists ~n:n ~i:((List.length l)-n-1) l
	else if n=((List.length l)-1) then
		[l]@lists@[[]]
	else if i=0 then
		listePrefixes ~lists:(lists@[current]) ~n:(n+1) ~i:(-1) l
	else
		listePrefixes ~current:([(List.nth l i)]@current) ~lists:lists ~n:n ~i:(i-1) l;;

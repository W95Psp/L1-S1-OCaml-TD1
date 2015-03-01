let noteFDS (noteExam:int) (noteCC:int) (coeffExam:int) (coeffCC:int) =
	let first = (float_of_int(noteExam * coeffExam + noteCC * coeffCC) /. 
	float_of_int(coeffExam+coeffCC)) in
	max first (float_of_int noteExam);;
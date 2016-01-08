// Problem 1
console.log(first_variable); 					//logs undefined becuase the declaration floated
var first_variable = "Yipee I was first!";		//logs Yipee I was first!
function firstFunc() {
  first_variable = "Not anymore!!!";			//changes first variable only when function is invoked, function never invoked
  console.log(first_variable)					//never invoked
}
console.log(first_variable);					//logs Yipee I was first!
             
//Rearranged
var first_variable;              
console.log(first_variable); 					
first_variable = "Yipee I was first!";	
console.log(first_variable);

function firstFunc() {
  first_variable = "Not anymore!!!";			
    console.log(first_variable)					
}
				
                           

// Problem 2
var food = "Chicken";
function eat() {
  food = "half-chicken";
  console.log(food);
  var food = "gone";       // NOTE: I'M TRYING TO TRICK YOU HERE!!!!
}
eat();
console.log(food);  	

// Problem 2 Rearranged
var food = "Chicken";
function eat() {
  var food;
  food = "half-chicken";
  console.log(food);
  food = "gone";       // NOTE: I'M TRYING TO TRICK YOU HERE!!!!
}
eat(); //logs half chicken
console.log(food);  	//logs chicken	
                           

// Problem 3
var new_word = "NEW!";
function lastFunc() {
  new_word = "old";
}
console.log(new_word); //logs NEW!




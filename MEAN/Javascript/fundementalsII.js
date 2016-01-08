//Create a program that goes through each value in array x, where x is [3,5,'Dojo', 'rocks', 'Michael', 'Sensei']. Have it log each value of the array.
function printArray(x){
	for (var i = x.length - 1; i >= 0; i--) {
		console.log(x[i]);
	}
}
//Add a new value in the array x using a push method. New value you should add is 100.
function append(a, x){
	a.push(x);
}

//Add a new array as the last member of the array then log x in the console and analyze how x looks.
function appendArray(a, x){
	a.push(x);
}

//Create a simple for loop that sums all the numbers between 1 to 500. Have console log the final sum.

function sum1to500(){
	var sum = 0;
	for (var i = 1; i < 501; i++) {
		sum += i;
	}
	console.log(sum);

}
//Write a loop that will go through the array [1, 5, 90, 25, -3, 0], find the minimum value, and then print it
function minimum(a){
	var min = a[0];
	for (var i = a.length - 1; i >= 0; i--) {
		if(a[i] < min){
			min = i;
		}
	}
	console.log(min);
}
//Write a loop that will go through the array [1, 5, 90, 25, -3, 0], find the average of all of the values, and then print it
function mean(a){
	var sum = 0;
	for (var i = a.length - 1; i >= 0; i--) {
		sum += a[i];
	}
	return sum/a.length;
}


var person = {};
person = {
	name: 'Kenrick',
	distance_travelled: 0,
	say_name: function(){
		alert("My name is " + name);
	},
	say_something: function(message){
		alert("" + name + "says /'"+ message +"/'");
	},
	walk: function(){
		this.distance_travelled += 3;
		alert("" + name + " is walking");
	},
	run: function(){
		this.distance_travelled += 10;
		alert("" + name + " is running");
	},
	crawl: function(){
		this.distance_travelled += 1;
		alert("" + name + " is crawling");
	},
};










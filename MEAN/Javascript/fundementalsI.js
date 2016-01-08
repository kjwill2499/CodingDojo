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
Create a javascript object called person with the following properties/methods
name - set this as 'Trey' or your own name
distance_travelled - set this initially as zero
say_name - should alert the object name property
say_something - have it accept a parameter. It should then say for example "Trey says 'I am cool'" if you pass 'I am cool' as an argument to this method.
walk - have it alert for example "Trey is walking" and increase distance_travelled by 3
run - have it alert for example "Trey is running" and increase distance_travelled by 10
crawl - have it alert for example "Trey is crawling" and increase distance_travelled by 1

var person = {};
person = {
	name: 'Kenrick'
	distance_travelled: 0;
	say_name: function(){
		alert("My name is " + name);
	}
	say_something: function(message){
		alert("" + name + "says /'"+ message +"/'");
	}
	walk: function(){
		distance_travelled += 3;
		alert("" + name + " is walking")
	}
	run: function(){
		distance_travelled += 10;
		alert("" + name + " is running")
	}
	crawl: function(){
		distance_travelled += 1;
		alert("" + name + " is crawling")
	}
}
person.walk();
console.log(distance_travelled);









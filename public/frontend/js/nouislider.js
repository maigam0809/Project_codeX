var inputLeft = document.getElementById("input-left");
var inputRight = document.getElementById("input-right");

var thumbLeft = document.querySelector(".slider > .thumb.left");
var thumbRight = document.querySelector(".slider > .thumb.right");
var range = document.querySelector(".slider > .range");
var value1 = document.querySelector(".value1");
var value2 = document.querySelector(".value2");
function setLeftValue() {
	var _this = inputLeft,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 10000);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbLeft.style.left = percent + "%";
	range.style.left = Math.ceil(percent)+ "%";
value1.value=Math.ceil(percent*10000);
}
setLeftValue();

function setRightValue() {
	var _this = inputRight,
		min = parseInt(_this.min),
		max = parseInt(_this.max);

	_this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 10000);

	var percent = ((_this.value - min) / (max - min)) * 100;

	thumbRight.style.right = (100- percent) + "%";
	range.style.right = (100 - percent) + "%";
	var a= Math.ceil(percent*10000);
	value2.value=a;
}
setRightValue();

inputLeft.addEventListener("input", setLeftValue);
inputRight.addEventListener("input", setRightValue);

inputLeft.addEventListener("mouseover", function() {
	thumbLeft.classList.add("hover");
});
inputLeft.addEventListener("mouseout", function() {
	thumbLeft.classList.remove("hover");
});
inputLeft.addEventListener("mousedown", function() {
	thumbLeft.classList.add("active");
});
inputLeft.addEventListener("mouseup", function() {
	thumbLeft.classList.remove("active");
});

inputRight.addEventListener("mouseover", function() {
	thumbRight.classList.add("hover");
});
inputRight.addEventListener("mouseout", function() {
	thumbRight.classList.remove("hover");
});
inputRight.addEventListener("mousedown", function() {
	thumbRight.classList.add("active");
});
inputRight.addEventListener("mouseup", function() {
	thumbRight.classList.remove("active");
});

function myFunction1() {
	if(value1.value<=0){
		value1.value=0;
	}
	if(value2.value>=1000000){
		value2.value=1000000;
	}

  }
let q = document.querySelectorAll(".fill");
let w = document.getElementById("welcome");
 //we bring all question divs as an array//
 let next = document.querySelectorAll(".next");
 let start = document.querySelector(".Start");
 let make = document.querySelector("#make");
 let pre = document.querySelectorAll(".pre");
 let y = document.querySelectorAll(".btn");
 let n = document.querySelectorAll(".no");
 //we bring the next button//
 let c=0;
 start.addEventListener("click", function(){
    start.style.display = "none";
    make.style.display = "none";
    w.style.display = "block";
 q[0].style.display = "block"; });
 next.forEach(function(button) {
    button.addEventListener("click", function(){
        if (c < q.length - 1){
        q[c].style.display = "none";
        c++;
        q[c].style.display = "block";}
    });
    });
pre.forEach(function(button) {
    button.addEventListener("click", function(){
        if (c > 0){
            q[c].style.display = "none";
            c--;
            q[c].style.display = "block";
        }
    });
});
y.forEach(function(b) {
    b.addEventListener("click", function(){
        q[c].style.display = "none";
        c++;
        q[c].style.display = "block";
    });
});
n.forEach(function(b) {
    b.addEventListener("click", function(){
        q[c].style.display = "none";
        c = c + 2;
        q[c].style.display = "block";
    });
});
let add = document.querySelector(".add");
add.addEventListener("click", function(){
    let input = document.querySelector("input").v;
    input.type = "text";
    input.placeholder = "Enter a skill";
    q[c].appendChild(input);
});
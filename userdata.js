let q = document.querySelectorAll(".fill");
let w = document.getElementById("welcome");
 //we bring all question divs as an array//
 let next = document.querySelectorAll(".next");
 let start = document.querySelector(".Start");
 let make = document.querySelector("#make");
 let pre = document.querySelectorAll(".pre");
 let y = document.querySelectorAll(".btn");
 let n = document.querySelectorAll(".no");
 let history = []; //we create an array to store the history of the questions//
 let c=0;
 start.addEventListener("click", function(){
    start.style.display = "none";
    make.style.display = "none";
    w.style.display = "block";
 q[0].style.display = "block"; });
 next.forEach(function(button) {
    button.addEventListener("click", function(){
        if (c < q.length - 1){
         history.push(c); 
        q[c].style.display = "none";
        c++;
        q[c].style.display = "block";}
    });
    });
pre.forEach(function(button) {
     if (!button.classList.contains("back")) {
    button.addEventListener("click", function(){
        if (c > 0){
            q[c].style.display = "none";
            c--;
            q[c].style.display = "block";
        }
    });}
});

y.forEach(function(b) {
    b.addEventListener("click", function(){
       if (c + 1 < q.length){
        history.push(c);
        q[c].style.display = "none";
        c++;
        q[c].style.display = "block";}
    });
});
n.forEach(function(b) {
    b.addEventListener("click", function(){
       if (c + 2 < q.length){
        history.push(c);
        q[c].style.display = "none";
        c = c + 2;
        q[c].style.display = "block";
       }
    });
});
let add = document.querySelectorAll(".add");
add.forEach( b => {
    b.addEventListener("click", function(){
    let input = q[c].querySelector("input")
    if (input.value !== "") {
          let x = document.createElement("div");
          let y = document.createElement("button");
           x.textContent = input.value;
           x.setAttribute("class", "skill");
           y.textContent = "🗑️";
           y.setAttribute("class", "delete");
           q[c].querySelector(".tags").appendChild(x);
           x.appendChild(y);
           y.addEventListener("click", function(){
           x.remove();});
           input.value = "";
    };            
});
});
let back = document.querySelector(".back");
back.addEventListener("click", function(){    
 if (history.length >= 2 ){
    q[c].style.display = "none";
    c = history.pop();
    q[c].style.display = "block";}
});
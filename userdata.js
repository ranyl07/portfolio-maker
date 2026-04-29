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
           y.textContent = "🗑️";
        if (b.id === "skill-add"){
           x.setAttribute("class", "skill");}
        else if (b.id === "experience-add"){
           x.setAttribute("class", "user-experience");}
        else if (b.id === "project-add"){
           x.setAttribute("class", "user-project");
           x.dataset.title = q[c].querySelector("#project-title").value;
           x.dataset.description = q[c].querySelector("#project-description").value;
           x.dataset.link = q[c].querySelector("#project-link").value;}
        else if (b.id === "contact-add"){
           x.setAttribute("class", "user-contact");}
           y.setAttribute("class", "delete");
           q[c].querySelector(".tags").appendChild(x);
           x.appendChild(y);
           y.addEventListener("click", function(){
           x.remove();});
           input.value = ""; 
      }  });}); 
let back = document.querySelectorAll(".back");
back.forEach(function(button) {
    button.addEventListener("click", function(){    
     if (history.length >= 1 ){
        q[c].style.display = "none";
        c = history.pop();
        q[c].style.display = "block";}
    });
});
selectedTemplate="hadylmodel.html";
let submit = document.querySelector("#submit");
submit.addEventListener("click", function(){
    const user = {
      template: selectedTemplate,
      name: document.getElementById("user-name").value,
      email: document.getElementById("user-email").value,
      phone: document.getElementById("user-phone").value,
     tagline: document.getElementById("user-tagline").value,
     about: document.getElementById("user-about").value,
    skills: [...document.querySelectorAll(".skill")].map(el => ({
    name: el.firstChild.textContent.trim(),
})),

     experience: [...document.querySelectorAll(".user-experience")].map(el => el.firstChild.textContent.trim()),
projects: [...document.querySelectorAll(".user-project")].map(el => ({
  name: el.dataset.name,
  description: el.dataset.description,
  link: el.dataset.link,
})),
     contact : [...document.querySelectorAll(".user-contact")].map(el => el.firstChild.textContent.trim()),
  avatar: document.getElementById("pic").files[0] || null,
};
;});

let data = JSON.parse(localStorage.getItem("portfolio"));

let empty = document.getElementById("empty");
let portfolio = document.getElementById("portfolio");

if(!data){
  empty.classList.remove("hidden");
}
else{
  portfolio.classList.remove("hidden");

  document.getElementById("name").innerText = data.name;
  document.getElementById("tagline").innerText = data.tagline;
  document.getElementById("about").innerText = data.about;
  document.getElementById("email").innerText = data.email;
  document.getElementById("phone").innerText = data.phone;

  let skillsBox = document.getElementById("skills");

  data.skills.forEach(s=>{
    let div = document.createElement("div");
    div.classList.add("skill");
    div.innerText = s.name;
    skillsBox.appendChild(div);
  });
}


document.getElementById("delete").addEventListener("click", ()=>{
  localStorage.removeItem("portfolio");
  location.reload();
});


document.getElementById("edit").addEventListener("click", ()=>{
  window.location.href = "userdata.html";
});

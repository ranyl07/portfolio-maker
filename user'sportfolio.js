let empty = document.getElementById("empty");
let portfolio = document.getElementById("portfolio");

if(!portfolioData){
  empty.classList.remove("hidden");
}else{
  portfolio.classList.remove("hidden");


  document.getElementById("name").innerText = portfolioData.name || "";
  document.getElementById("tagline").innerText = portfolioData.tagline || "";
  document.getElementById("about").innerText = portfolioData.about || "";
  document.getElementById("email").innerText = portfolioData.email || "";
  document.getElementById("phone").innerText = portfolioData.phone || "";

  let skillsBox = document.getElementById("skills");
  skillsBox.innerHTML = "";

  if(portfolioData.skills && portfolioData.skills.length > 0){
    portfolioData.skills.forEach(s=>{
      let div = document.createElement("div");
      div.classList.add("skill");
      div.innerText = s;
      skillsBox.appendChild(div);
    });
  }
}


let deleteBtn = document.getElementById("delete");
if(deleteBtn){
  deleteBtn.onclick = ()=>{
    if(confirm("Are you sure you want to delete your portfolio?")){
      fetch("delete.php")
      .then(()=> location.reload());
    }
  };
}


let saveBtn = document.getElementById("save");
if(saveBtn){
  saveBtn.onclick = ()=>{
    fetch("save.php")
    .then(res=>res.text())
    .then(link=>{
      alert("Saved! Your link:\n" + link);
    });
  };
}

let shareBtn = document.getElementById("share");
if(shareBtn){
  shareBtn.onclick = ()=>{
    fetch("copy.php")
    .then(res=>res.text())
    .then(link=>{
      navigator.clipboard.writeText(link);
      alert("Link copied!");
    });
  };
}

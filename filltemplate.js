const user = JSON.parse(localStorage.getItem("userData"));
document.getElementById("name").textContent = user.name;
document.getElementById("email").href = "mailto:" + user.contact.email;
document.getElementById("email").textContent = user.contact.email;
document.getElementById("linkedin").href = user.contact.linkedin;
document.getElementById("phone").href = "tel:" + user.contact.phone;
document.getElementById("phone").textContent = user.contact.phone;
document.getElementById("experience").textContent = user.experience;
document.getElementById("project-title").textContent = user.project.title;
document.getElementById("project-description").textContent = user.project.description;
document.getElementById("project-link").href = user.project.link;
const skillsContainer = document.getElementsByClassName("skill");
skillsContainer[0].innerHTML = "";
user.skills.forEach(skill => {
  const li = document.createElement("li");
  li.textContent = skill;
  skillsContainer[0].appendChild(li);
  skillsContainer[0].setAttribute("class", "skills");
});
const projectsContainer = document.getElementsByClassName("project");
user.projects.forEach(project => {
  const li = document.createElement("li");
  li.textContent = project.name;
  li.setAttribute("class", "boxs");
  li.appendChild(document.createElement("p")).textContent = project.description;
  
  const link = document.createElement("a");
  link.href = project.link;
  link.textContent = "View Project";
  li.appendChild(link);
  li.setAttribute("class", "boxs");
  projectsContainer[0].appendChild(li);
});
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
});
const projectsContainer = document.getElementsByClassName("project");
user.projects.forEach(project => {
  const li = document.createElement("li");
  li.textContent = project.name;
  projectsContainer[0].appendChild(li);
});
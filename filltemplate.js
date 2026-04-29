const user = JSON.parse(localStorage.getItem("userData"));
document.getElementById("name").textContent = user.name;
document.getElementById("email").href = "mailto:" + user.email;
document.getElementById("phone").href = "tel:" + user.phone;
document.getElementById("tagline").textContent = user.tagline;
document.getElementById("about").textContent = user.about;
document.getElementById("avatar").src = user.avatar;
document.getElementById("email").textContent = user.email;
document.getElementById("phone").textContent = user.phone;
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

  li.appendChild(document.createElement("p")).textContent = project.description;
  
  const link = document.createElement("a");
  link.href = project.link;
  link.textContent = "View Project";
  li.appendChild(link);
  projectsContainer[0].appendChild(li);
});
const contactsContainer = document.getElementsByClassName("contact");
user.socialLinks.forEach(contact => {
  const li = document.createElement("li");
  li.textContent = contact;
  li.setAttribute("class", "user-contact");
  contactsContainer[0].appendChild(li);});
  const experienceContainer = document.getElementsByClassName("experience");
  user.experience.forEach(exp => {
    const li = document.createElement("li");
    li.textContent = exp;
    experienceContainer[0].appendChild(li);
  });
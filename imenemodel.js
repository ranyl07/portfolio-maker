const user = {
  name: "Your Name",
  email: "your@email.com",
  phone: "+213 *** ** ** **"
};

const portfolio = {
  about: "I am a passionate developer / creative person."
};

const skills = ["skill1", "skill2", "skill3"];

const projects = [
  { title: "Project 1", desc: "Description here" },
  { title: "Project 2", desc: "Description here" }
];

const experience = [
  { title: "Job Title", company: "Company", period: "2023 - now", desc: "Work description" }
];

const education = [
  { title: "University Name", field: "Computer Science", year: "2022 - 2025" }
];

const certificates = [
  { name: "Certificate 1", file: "#" }
];



document.getElementById("name").innerText = user.name;
document.getElementById("about").innerText = portfolio.about;

document.getElementById("skills").innerHTML =
skills.map(s => `<span>${s}</span>`).join("");

document.getElementById("projectsBox").innerHTML =
projects.map(p => `
  <div class="card">
    <b>${p.title}</b>
    <p>${p.desc}</p>
  </div>
`).join("");

document.getElementById("experience").innerHTML =
experience.map(e => `
  <div class="card">
    <b>${e.title}</b> - ${e.company}
    <p>${e.period}</p>
    <p>${e.desc}</p>
  </div>
`).join("");

document.getElementById("education").innerHTML =
education.map(e => `
  <div class="card">
    <b>${e.title}</b>
    <p>${e.field}</p>
    <p>${e.year}</p>
  </div>
`).join("");

document.getElementById("certificates").innerHTML =
certificates.map(c => `
  <div class="card">
    📜 ${c.name} <br>
    <a href="${c.file}" target="_blank">View</a>
  </div>
`).join("");

document.getElementById("contact").innerHTML = `
  <p>📧 ${user.email}</p>
  <p>📞 ${user.phone}</p>
  `;

     function scrollToSec(id){
  document.getElementById(id).scrollIntoView({ behavior: "smooth" });
     }

  function chooseTemplate(id){
  alert("Template selected: " + id);
     }

const user = {
  name: "Your Name",
  email: "your@email.com",
  phone: "00000000"
};

const portfolio = {
  about: "I am a passionate developer / creative person."
};

const skills = ["HTML", "CSS", "JavaScript"];

const projects = [
  { title: "Project 1", desc: "Description here" },
  { title: "Project 2", desc: "Description here" }
];

const experience = [
  { title: "Job Title", company: "Company", period: "2023 - now", desc: "Work description" }
];

const education = [
  { title: "University Name", field: "Computer Science", year: "2022 - 2025" },
  { title: "High School", field: "Science", year: "2019 - 2022" }
];

const certificates = [
  { name: "Certificate 1", file: "#" },
  { name: "Certificate 2", file: "#" }
];



document.getElementById("username").innerText = user.name;
document.getElementById("aboutText").innerText = portfolio.about;



document.getElementById("skillsBox").innerHTML =
skills.map(s => `<span>${s}</span>`).join("");



document.getElementById("projectsBox").innerHTML =
projects.map(p => `
  <div class="card">
    <b>${p.title}</b>
    <p>${p.desc}</p>
  </div>
`).join("");



document.getElementById("expBox").innerHTML =
experience.map(e => `
  <div class="card">
    <b>${e.title}</b> - ${e.company}
    <p>${e.period}</p>
    <p>${e.desc}</p>
  </div>
`).join("");



document.getElementById("eduBox").innerHTML =
education.map(e => `
  <div class="card">
    <b>${e.title}</b>
    <p>${e.field}</p>
    <p>${e.year}</p>
  </div>
`).join("");



document.getElementById("certBox").innerHTML =
certificates.map(c => `
  <div class="card">
    📜 ${c.name} <br>
    <a href="${c.file}" target="_blank">View</a>
  </div>
`).join("");



document.getElementById("contactBox").innerHTML = `
  <p>📧 ${user.email}</p>
  <p>📞 ${user.phone}</p>
`;



function scrollToSec(id){
  document.getElementById(id).scrollIntoView({ behavior: "smooth" });
}

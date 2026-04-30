
document.addEventListener("DOMContentLoaded", () => {
    const emptyDiv    = document.getElementById("empty");
    const portfolioDiv = document.getElementById("portfolio");
 
    // portfolioData is injected by PHP as JSON
    if (!portfolioData) {
        emptyDiv.classList.remove("hidden");
        return;
    }
 
    // Populate the portfolio card
    portfolioDiv.classList.remove("hidden");
    document.getElementById("name").textContent    = portfolioData.name     || "";
    document.getElementById("tagline").textContent = portfolioData.tagline  || "";
    document.getElementById("about").textContent   = portfolioData.about    || "";
    document.getElementById("email").textContent   = portfolioData.email    || "";
    document.getElementById("phone").textContent   = portfolioData.phone    || "";
 
    // Render skills as tags
    const skillsDiv = document.getElementById("skills");
    if (portfolioData.skills) {
        portfolioData.skills.split(",").forEach(skill => {
            const tag = document.createElement("span");
            tag.className = "skill-tag";
            tag.textContent = skill.trim();
            skillsDiv.appendChild(tag);
        });
    }
 
    // ── Delete button ──────────────────────────────────────────────
    document.getElementById("delete").addEventListener("click", async () => {
        if (!confirm("Are you sure you want to delete this portfolio?")) return;
 
        const res = await fetch("delete_portfolio.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: portfolioData.id_portfolio })
        });
 
        const json = await res.json();
        if (json.success) {
            alert("Portfolio deleted.");
            window.location.href = "userdata.php";
        } else {
            alert("Error: " + json.error);
        }
    });
 
    // ── Share button ───────────────────────────────────────────────
    document.getElementById("share").addEventListener("click", async () => {
        const res = await fetch("generate_share_link.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id: portfolioData.id_portfolio })
        });
 
        const json = await res.json();
        if (json.success) {
            // Copy to clipboard
            await navigator.clipboard.writeText(json.link);
            alert("Share link copied to clipboard:\n" + json.link);
        } else {
            alert("Error: " + json.error);
        }
    });

    document.getElementById("save").addEventListener("click", () => {
        window.location.href = "userdata.php?id=" + portfolioData.id_portfolio;
    });
});

const aiTools = [
    {
        name: "ChatGPT",
        description: "Model AI untuk percakapan dari OpenAI.",
        image: "assets/gpt.png",
        link: "https://chat.openai.com/"
    },
    {
        name: "Gemini",
        description: "AI Seperti chat bot.",
        image: "assets/gemini.jpg",
        link: "https://gemini.google.com/"
    },
    {
        name: "Claude AI",
        description: "AI dengan detail penjelasan contoh hasilnya",
        image: "assets/claude.png",
        link: "https://claude.ai/"
    },
    {
        name: "Blackbox",
        description: "AI untuk membuat suatu gambar, website dan lain-lain dengan coding.",
        image: "assets/blackbox.png",
        link: "https://www.blackbox.ai/"
    },
    {
        name: "Perplexity AI",
        description: "Tool AI yang mmemberikan sumber dari setiap jawaban.",
        image: "assets/perplexity.png",
        link: "https://www.perplexity.ai/"
    }
];

window.onload = loadAiTools;


window.onload = loadAiTools;


const userForm = document.getElementById('user-form');
userForm.addEventListener('submit', function(event) {
    event.preventDefault();  

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const interest = document.getElementById('interest').value;
    const usage = document.getElementById('usage').value;
    const newsletter = document.getElementById('newsletter').checked;

    
    console.log('Nama:', name);
    console.log('Email:', email);
    console.log('Minat AI:', interest);
    console.log('Tujuan Penggunaan AI:', usage);
    console.log('Newsletter:', newsletter);

    alert('Terima kasih sudah mendaftar!');
});


function loadAiTools() {
    const listContainer = document.getElementById("ai-tools-list");

    aiTools.forEach(tool => {
        
        const card = document.createElement("div");
        card.classList.add("tool-card");

       
        const img = document.createElement("img");
        img.src = tool.image;
        img.alt = tool.name;

        const name = document.createElement("h3");
        name.textContent = tool.name;

     
        const description = document.createElement("p");
        description.textContent = tool.description;

       
        const link = document.createElement("a");
        link.href = tool.link;
        link.textContent = "Kunjungi";

        card.appendChild(img);
        card.appendChild(name);
        card.appendChild(description);
        card.appendChild(link);

        listContainer.appendChild(card);
    });
}


window.onload = loadAiTools;


const themeToggle = document.getElementById('theme-toggle');
const body = document.body;

themeToggle.addEventListener('click', () => {
    if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        themeToggle.textContent = 'Light Mode';
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        themeToggle.textContent = 'Dark Mode';
    }
});




const hamburger = document.getElementById('hamburger');
const navbar = document.querySelector('.navbar');

hamburger.addEventListener('click', () => {
    navbar.classList.toggle('active');
});


const popup = document.getElementById('popup');
const showPopup = document.getElementById('show-popup');
const closePopup = document.querySelector('.close-popup');

showPopup.addEventListener('click', () => {
    popup.style.display = 'flex';
});

closePopup.addEventListener('click', () => {
    popup.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === popup) {
        popup.style.display = 'none';
    }
});


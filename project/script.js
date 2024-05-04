const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
setTimeout(function(){
    document.getElementById("content").style.display = "block";
    document.querySelector(".loader_bg").style.display = "none";
}, 1500); // Adjust the delay time as needed

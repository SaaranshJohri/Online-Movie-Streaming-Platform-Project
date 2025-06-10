

const ball = document.querySelector(".toggle-ball");
const items = document.querySelectorAll(
    ".navbar-container, .sidebar, .left-menu-icons, .content-container, .toggle, .toggle-ball, .featured-video, .featured-video-2, .Title, .featured-desc, .movie-list-title, .genre-list-title-2, .featured-content");

ball.addEventListener("click", ()=>{
    items.forEach(item=>{
        item.classList.toggle('active');
    })
})

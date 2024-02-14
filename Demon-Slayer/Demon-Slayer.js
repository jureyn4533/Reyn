const links = document.querySelectorAll('nav a');
links.forEach(link => {
  link.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default link behavior
    const href = link.getAttribute('href'); // Get link URL
    // Fade out current page and load new page
    document.querySelector('.page-container').classList.add('fade-out');
    setTimeout(() => {
      window.location.href = href;
    }, 500); // Wait for fade out animation to finish
  });
});
// Add a click event listener to the navigation links
document.querySelectorAll('nav a').forEach(link => {
    link.addEventListener('click', (event) => {
      event.preventDefault(); // prevent default link behavior
      const sectionId = link.getAttribute('href'); // get the id of the section to scroll to
      const section = document.querySelector(sectionId); // find thesection element
      section.scrollIntoView({ behavior: "smooth" }); // scroll to the section smoothly
    })
  })
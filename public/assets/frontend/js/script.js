// Custom collapse
var coll = document.getElementsByClassName("custom-collapse");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
}

new Splide( '.splide', {
  perPage   : 3,
  perMove: 1,
  breakpoints: {
    900: {
      perPage: 2,
    },
    730: {
      perPage: 1,
    }
  }
} ).mount()
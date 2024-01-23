let lastClickedButton = null;

function toggleImage(imageSrc) {
  let imageContainer = document.getElementById("imageContainer");
  let displayedImage = document.getElementById("displayedImage");

  if (lastClickedButton === imageSrc) {
    imageContainer.style.display = "none";
    lastClickedButton = null;
  } else {
    displayedImage.src = imageSrc;
    imageContainer.style.display = "block";
    lastClickedButton = imageSrc;
  }
}

let date = new Date();
year = date.getFullYear();

document.getElementById("time").innerHTML = year;

/*
  const showImageButton1 = document.getElementById("show-img1");
const myImage1 = document.getElementById("pt-img1");
showImageButton1.addEventListener("click", () => { 
    myImage1.classList.toggle("visible"); 
});

const showImageButton2 = document.getElementById("show-img2");
const myImage2 = document.getElementById("pt-img2");
showImageButton2.addEventListener("click", () => { 
    myImage2.classList.toggle("visible"); 
});

const showImageButton3 = document.getElementById("show-img3");
const myImage3 = document.getElementById("pt-img3");
showImageButton3.addEventListener("click", () => { 
    myImage3.classList.toggle("visible"); 
});

const showImageButton4 = document.getElementById("show-img4");
const myImage4 = document.getElementById("pt-img4");
showImageButton4.addEventListener("click", () => { 
    myImage4.classList.toggle("visible"); 
});
*/

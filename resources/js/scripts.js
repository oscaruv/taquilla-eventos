
// Get the modal
var modal = document.getElementById("myModal");
var modal1 = document.getElementById("showAdmin");
var modal2 = document.getElementById("deleteAdmin");



// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span1.onclick = function(){
  modal1.style.display ="none";
}

span2.onclick = function(){
  modal2.style.display ="none";
}



// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


// ============================================================================================
// var modal = document.getElementById("myModal");
// var span = document.getElementsByClassName("close")[0];

// function changeParams(newModal){
//   modal = document.getElementById(newModal);
// }

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() {
//   modal.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// }


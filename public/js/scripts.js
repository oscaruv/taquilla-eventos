// Get the modal
var modal = document.getElementById("myModal");
var modal1 = document.getElementById("showEmployer");
var modal2 = document.getElementById("deleteEmployer");
var modal3 = document.getElementById("changeAccess");
var modal4 = document.getElementById("recordEmployer");



// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];
var span3 = document.getElementsByClassName("close")[3];
var span4 = document.getElementsByClassName("close")[4];


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

span3.onclick = function(){
  modal3.style.display ="none";
}

span4.onclick = function(){
  modal4.style.display ="none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
console.log('test');

// Gestion menu burger
const mainMenu = document.querySelector("#nav_menu");
const burgerMenu = document.querySelector("#menu_burger");


burgerMenu.addEventListener("click", function() {
	
	mainMenu.classList.toggle("active");

});


const liens =document.querySelectorAll("li");

liens.forEach(lien =>{

	lien.addEventListener("click", (e)=>{
		mainMenu.classList.remove("active");
		e.preventDefault();
		e.stopPropagation();
	})
})


// Gestion drag and drop
/*
const dropZone = document.querySelector("#dropzone");
document.querySelector('#dropzone').addEventListener('drop', function drag_drop(event){
	event.prevenDefault();
	alert(event.dataTransfer.files[0]);
	alert(event.dataTransfer.files[0].name);
	alert(event.dataTransfer.files[0].size+" bytes");
});


document.querySelector('#dropzone').addEventListener('drop', function(e) {
    e.preventDefault(); // Cette méthode est toujours nécessaire pour éviter une éventuelle redirection inattendue
    alert('Vous avez bien déposé votre élément !');
});
*/

var fileInput = document.querySelector("#fileput");
var droparea = document.querySelector("#dropzone");
console.log(fileInput);
console.log(droparea);

droparea.addEventListener('click', function(e) {
	droparea.classList.toggle('opacity');
	e.preventDefault();
    e.stopPropagation();
	console.log("droparea");
  });
  
// back to normal state
droparea.addEventListener('dragleave dragend drop', function(e) {
  droparea.classList.remove('opacity');
  e.preventDefault();
  e.stopPropagation();
});





droparea.addEventListener('drop', function(e) {
    e.preventDefault(); // Cette méthode est toujours nécessaire pour éviter une éventuelle redirection inattendue
    console.log('Vous avez bien déposé votre élément !');
});


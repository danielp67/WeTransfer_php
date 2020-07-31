
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

let fileInput = document.querySelector("#fileinput");
let droparea = document.querySelector("#dropzone");
let fileNb = document.querySelector("#filenumber");

droparea.addEventListener('dragover', function(e) {
	droparea.classList.add('opacity');
	e.preventDefault();
    e.stopPropagation();
	console.log("dragenter");
  });
  

droparea.addEventListener("dragleave", function(e) {
	droparea.classList.remove('opacity');
	console.log("dragleave");
  });




// Gestion upload

let filesInput=[];
let cross=[];
let text=[];
let i=0;
let filesTransfer =[];
let formData;

let filesend = document.querySelector('#filesend');
let progress = document.querySelector('#progress');
const url ='index.php?action=addFile';
const form = document.querySelector('form');
console.log(form);

function fileNumber(){
	if(filesInput.length>=1){
		fileNb.innerHTML= filesInput.length + ' fichier(s)';
	}else if(fileNb){
		fileNb.innerHTML='' ;
	}
}
fileNumber();



droparea.addEventListener('drop', function(e) {
    e.preventDefault();
	droparea.classList.remove('opacity');
	console.log('Vous avez bien déposé votre élément !');
	let files = e.dataTransfer.files;
	console.log("e.dataTransfer.files");
	console.log(e.dataTransfer.files);
	let filezise = "";
      let  filename = "";
	  let n=0;
	  n=filesTransfer.length;
		console.log("files");
	  console.log(files);
	  let p=0;
    for (i=n; i < (files.length+n) ; i++) {

		filesTransfer[i]=files[p];
		
		filename =  files[p].name;
		filezise = Math.round(parseInt(files[p].size)/1000) + ' Ko';
		filesInput[i] = document.createElement("div");
		filesInput[i].classList.add("fileinput");
		fileInput.appendChild(filesInput[i]);
		
		text[i] = document.createElement("div");
		text[i].classList.add("fileinputtext");
		filesInput[i].appendChild(text[i]);
		text[i].innerHTML =filename + ' '+ filezise;
		console.log(text[i]);

		cross[i] = document.createElement("div");
		cross[i].classList.add("fileinputcross");
		filesInput[i].appendChild(cross[i]);
		cross[i].innerHTML ='X';
		p++;

	}
	
	fileNumber();
	console.log(filesTransfer);

});







/*
form.addEventListener('submit', function() {

    var xhr = new XMLHttpRequest();

    xhr.open('POST', url); // Rappelons qu'il est obligatoire d'utiliser la méthode POST quand on souhaite utiliser un FormData

	xhr.upload.addEventListener('progress', function(e) {
        progress.value = e.loaded;
        progress.max = e.total;
	});
	

	// Upload du fichier…
	
xhr.send(form);
console.log(form);


});



filesend.addEventListener('change', function() {

	var form = new FormData();

form.append('filesend[]', filesend.files);
console.log("test");

console.log(filesend.files);

});
*/
/*
form.addEventListener('submit', (e) => {
	e.preventDefault();
	formData = new FormData(form);
console.log(formData);

for (let a=0; a <filesTransfer.length ;a++){
	formData.append('filesend[]', filesTransfer[a]);

}

//window.location.href = "index.php?action=addFile";
 fetch('index.php?action=addFile', {method: 'POST', body: formData});
	  

	});
*/
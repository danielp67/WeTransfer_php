
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
let formData;
let filesend = document.querySelector('#filesend');
let progress = document.querySelector('#progress');
const url ='index.php?action=addFile';
const form = document.querySelector('form');



let FILESdrop =[];
droparea.addEventListener('drop', function(e) {
    e.preventDefault();
	droparea.classList.remove('opacity');
	console.log('Vous avez bien déposé votre élément !');
	
	let files = [...e.dataTransfer.files];
	
	console.log("e.dataTransfer.files");
	console.log(e.dataTransfer.files);

	  for(let i=0; i< files.length; i++){

		FILESdrop.push(files[i]);
		
	}
	
	console.log(FILESdrop);

merge_array(FILESinput,FILESdrop);

});










/*
	formData = new FormData(form);
	for (let a=0; a <FILES.length ;a++){
		formData.append('filesend[]', FILES[a]);
		console.log(formData.entries());
	}



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

*/


let FILESinput =[];

filesend.addEventListener('change', function() {
	FILESinput=[];
for(let i=0; i< filesend.files.length; i++){
	FILESinput.push(filesend.files[i]);
}
console.log("test");
console.log(FILESinput);
merge_array(FILESinput,FILESdrop);
});






form.addEventListener('submit', (e) => {
	e.preventDefault();
	formData = new FormData(form);
console.log(formData);
let filesTransfer= merge_array(FILESinput,FILESdrop);
for (let a=0; a <filesTransfer.length ;a++){
	formData.append('filesend[]', filesTransfer[a]);

}

//window.location.href = "index.php?action=addFile";
 fetch('index.php?action=addFile', {method: 'POST', body: formData})
 .then(res => messageSuccess() );
	  
	});




function createPreview(filePreview){
	for(let i=0; i<filesInput.length; i++){
		fileInput.removeChild(filesInput[i]);

	}

	for(let i=0; i<filePreview.length; i++){
		let filezise = "";
		let  filename = "";
	filename =  filePreview[i].name;
	filezise = Math.round(parseInt(filePreview[i].size)/1000) + ' Ko';
	filesInput[i] = document.createElement("div");
	filesInput[i].classList.add("fileinput");
	fileInput.appendChild(filesInput[i]);
	
	text[i] = document.createElement("div");
	text[i].classList.add("fileinputtext");
	filesInput[i].appendChild(text[i]);
	text[i].innerHTML =filename + ' '+ filezise;

	cross[i] = document.createElement("div");
	cross[i].classList.add("fileinputcross");
	filesInput[i].appendChild(cross[i]);
	cross[i].innerHTML ='X';
}

}


function merge_array(FILESinput, FILESdrop) {
  
	
	var arr = FILESinput.concat(FILESdrop);
	let set = new Set(arr);
	let merge_arr = Array.from(set);
	console.log("merge");
	console.log(merge_arr);

	for(let i=0; i<merge_arr.length-1 ; i++){
		console.log("text");
		for(let n=i+1; n<merge_arr.length; n++){

			if(merge_arr[i].name == merge_arr[n].name){
				console.log("doublon");
				merge_arr.splice(n, 1);;
				console.log(merge_arr);
			}			
		}
	}
	createPreview(merge_arr);
	fileNb.innerHTML= merge_arr.length + ' fichier(s)';
  return merge_arr;
}


function messageSuccess(){

let message = document.querySelector('message');
console.log("message");
	message.innerHTML = "Votre fichier a été envoyé avec succès !";


}

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


let droparea = document.querySelector("#dropzone");


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
const form = document.querySelector('form');
let fileInput = document.querySelector("#fileinput");
let fileNb = document.querySelector("#filenumber");
fileNb.innerHTML= 'Importer des fichiers';
let filedelete =  document.querySelector("#filedelete");
let filesizetext = document.querySelector("#filesizetext");
	console.log(filesizetext);
// Rajout fichier drop
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


// Rajout fichier input file

let FILESinput =[];

filesend.addEventListener('change', function() {
	FILESinput=[...filesend.files];

console.log("test");
console.log(FILESinput);
merge_array(FILESinput,FILESdrop);
});



let merge_arr =[];
// Suppression doublon et vérification limite taille totale et extensions
function merge_array(FILESinput, FILESdrop) {
  
	
	var arr = FILESinput.concat(FILESdrop);
	let set = new Set(arr);
	merge_arr = Array.from(set);
	console.log("merge");
	console.log(merge_arr);

	for(let i=0; i<merge_arr.length-1 ; i++){
		console.log("text");
		for(let n=i+1; n<merge_arr.length; n++){

			if(merge_arr[i].name == merge_arr[n].name){
				console.log("doublon");
				merge_arr.splice(n, 1);
				console.log(merge_arr);
			}			
		}
	}

	for(let i=0; i<merge_arr.length ; i++){
		if (merge_arr[i].type == ''){
			console.log("fichier nok");
			merge_arr.splice(i, 1);
			i--;
		}
		
	}
	
	
	let size =0;
	for(let i=0; i<merge_arr.length ; i++){
		size += Math.round(parseInt(merge_arr[i].size)/1000);
		console.log(size);
	}

	
		if (size >= 2000) {
			
			filedelete.style.display = 'inline-block';
		  
		} 
		else {
			
			filedelete.style.display = 'none';
		  
		} 
	
	


	createPreview(merge_arr);
	fileNb.innerHTML= merge_arr.length + ' fichier(s)';
  return merge_arr;
}





// Creation de la visualisation des fichiers

let size =0;
function createPreview(filePreview){
	for(let i=0; i<filesInput.length; i++){
		
		filesInput[i].removeChild(text[i]);
		filesInput[i].removeChild(cross[i]);
		fileInput.removeChild(filesInput[i]);
		
	}
	size =0;
	filesInput=[];
	for(let i=0; i<filePreview.length; i++){
		let filezise = "";
		let  filename = "";
	filename =  filePreview[i].name;
	filezise = Math.round(parseInt(filePreview[i].size)/1000) + ' Ko';
	size += Math.round(parseInt(filePreview[i].size)/1000)
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

	progress.value = size;
	filesizetext.innerHTML = 'Taille : '+ size + ' Ko ';
	if(size>1500){
		console.log("overlimit");
	}
	
	if(size>2000){
		console.log("overlimit");
	}

	else{

	}
	console.log(size);
	console.log(filesInput[i]);
	console.log(fileInput);
}



// Creation de la requête et soumission

form.addEventListener('submit', (e) => {
	e.preventDefault();

	let formResult = true;

	for (let i in check) {
		formResult = check[i](i) && filesInput.length>=1 && formResult ;
	}

	if (formResult) {
		alert('Le formulaire est bien rempli.');
		formData = new FormData(form);
		console.log(formData);
		let filesTransfer= merge_array(FILESinput,FILESdrop);

	for (let a=0; a <filesTransfer.length ;a++){
		formData.append('filesend[]', filesTransfer[a]);

	}

//window.location.href = "index.php?action=addFile";
 fetch('index.php?action=addFile', {method: 'POST', body: formData})
 .then(res => customAlert.alert("Votre fichier a été envoyé avec succès !", "BRAVO !") );

	}
	else{
		alert('données manquantes');
	}

	});




// La fonction ci-dessous permet de récupérer la "tooltip" qui correspond à notre input

function getTooltip(elements) {

    while (elements = elements.nextSibling) {
        if (elements.className === 'form__label') {
			
				while (elements = elements.lastChild) {
					if (elements.className === 'form__tips') {
				return elements;
        		}
    		}
		}
	}
    return false;

}


// Fonctions de vérification du formulaire, elles renvoient "true" si tout est ok

let check = {}; // On met toutes nos fonctions dans un objet littéral


check['emailsender'] = function(id) {
	let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let email = document.getElementById(id);
    tooltipStyle = getTooltip(email).style;
	
    if (pattern.test(email.value)) {
     
	  tooltipStyle.display = 'none';
	  
        return true;
    } else {
     
	  tooltipStyle.display = 'inline-block';
	  
        return false;
    }

};


check['emailreceiver'] = check['emailsender']; // La fonction pour le prénom est la même que celle du nom


check['pass'] = function() {

    let  pass = document.getElementById('pass');
    tooltipStyle = getTooltip(pass).style;

    if (pass.value.length >= 6) {
       
	  tooltipStyle.display = 'none';
	  
        return true;
    } else {
     
	  tooltipStyle.display = 'inline-block';
	  
        return false;
    }

};


// Mise en place des événements

function checkForm() { 

	let	inputs = document.querySelectorAll('input[type=email], input[type=password]');
		console.log(inputs);
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('change', function(e) {
			//console.log(id);
			console.log(e.target.id);
			console.log(check);
            check[e.target.id](e.target.id); // "e.target" représente l'input actuellement modifié
        });
    }

}

checkForm();


function removeFiles() { 
	console.log("testdelete");
	console.log(FILESinput);
	console.log(FILESdrop);
	for (let i = 0; i < filesInput.length; i++) {
		console.log('test bloc');
		filesInput[i].addEventListener('mouseup', function(e) {
			e.stopPropagation();
			e.preventDefault();
			console.log('test condition');
		console.log(filesInput[i]);

		console.log(merge_arr[i].name);
			console.log(merge_arr[i].name);
		for(let n=0; n<FILESdrop.length; n++){
	
				if(merge_arr[i].name == FILESdrop[n].name){
					console.log("file drop remove");
					FILESdrop.splice(n, 1);
					
					merge_array(FILESinput, FILESdrop);
					break;

				}	
			
		}

		for(let n=0; n<FILESinput.length; n++){
	
				if(merge_arr[i].name == FILESinput[n].name){
					console.log("file input remove");
					console.log(FILESinput);
					FILESinput.splice(n, 1);
					console.log(FILESinput);
					
					merge_array(FILESinput, FILESdrop);
					break;

				}	
		
		}
		
		});
	}
}


fileInput.addEventListener('mousedown',removeFiles);


let customAlert = new CustomAlert();

function CustomAlert(){
	this.alert = function(message,title){
	  document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';
  
	  let dialogoverlay = document.getElementById('dialogoverlay');
	  let dialogbox = document.getElementById('dialogbox');
	  
	  let winH = window.innerHeight;
	  dialogoverlay.style.height = winH+"px";
	  
	  dialogbox.style.top = "100px";
  
	  dialogoverlay.style.display = "block";
	  dialogbox.style.display = "block";
	  
	  document.getElementById('dialogboxhead').style.display = 'block';
  
	  if(typeof title === 'undefined') {
		document.getElementById('dialogboxhead').style.display = 'none';
	  } else {
		document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
	  }
	  document.getElementById('dialogboxbody').innerHTML = message;
	  document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="customAlert.ok()">OK</button>';
	}
	
	this.ok = function(){
	  document.getElementById('dialogbox').style.display = "none";
	  document.getElementById('dialogoverlay').style.display = "none";
	  window.location.href = "index.php"
	}
  }
  
  
//droparea.addEventListener('click',customAlert.alert("Votre fichier a été envoyé avec succès !", "BRAVO !"));

// javascript

// filter array 


let filterarray =  [];

let galleryarray = [

    {
        id: 1,
        name: "samsung watch",
        src: "./imagens/watch5.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    },

    {
        id: 2,
        name: "iphone 13 pro ",
        src: "./imagens/iphone-13.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    },

    {
        id: 3,
        name: "samsung watch",
        src: "./iamgens/watch5.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    },

    {
        id: 4,
        name: "samsung watch",
        src: "./imagens/watch5.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    },

    {
        id: 5,
        name: "samsung watch",
        src: "./imagens/watch5.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    },

    {
        id: 6,
        name: "samsung watch",
        src: "./imagens/watch5.jpg",
        desc: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun."
    }
]


// create a function to show a gallery 
showgallerry( galleryarray);



function showgallerry(currarray){

    document.getElementById("card").innerText ="";
    
    for(var i=0;i<currarray.length;i++){

        document.getElementById("card").innerHTML += `
        
          <div class=" col-md-4 mt-3" >
          <div class="card p-3 ps-5 pe-5">
           <h4 class="text-capitalize text-center">${currarray[i].name}</h4>
           <img src="${currarray[i].src}" width="100%" height="320px"/>
           <p class="mt-2">${currarray[i].desc}</p>
           <button class="btn btn-primary w-100 mx-auto"> Ler mais... </button>
          </div>
          </div>
        
        `
    }
}


// live searching using input

document.getElementById("myinput").addEventListener("keyup",function(){

    let text = document.getElementById("myinput").value;

    filterarray = galleryarray.filter(function(a){
  
        if(a.name.includes(text)){

           return a.name;
        }

    });
      if (this.value ==""){

        showgallery(galleryarray);
      }

      else {

        if( filterarray == ""){

            document.getElementById("para").style.display = 'block';
            document.getElementById("card").innerHTML = "";
        }

        else {
              
            showgallery( filterarray);
            document.getElementById("para").style.display ='none';
        }
      }
})
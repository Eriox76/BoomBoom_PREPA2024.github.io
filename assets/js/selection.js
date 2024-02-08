console.dir(localStorage.getItem("user"));
// utilisation d'une API à partir d'un menu contextuel 
var search = document.getElementById("search");
var result = document.getElementById("result");
var titres = document.getElementById("titres");
var titreArray = [];
function addTitre(title){
    console.log (title);
    titreArray.push(title);
    result.innerHTML= "";
    search.value = "";
    titres.innerHTML="";
    titreArray.forEach((value)=>{
        titres.innerHTML += "<div>"+value+"</div>";
    })
    
}
search.addEventListener("input",()=>{
    result.innerHTML = "";
    if(search.value.length>3) {

        fetch(`https://musicbrainz.org/ws/2/recording/?query=${search.value}&fmt=json&limit=20`)
        .then(res=>res.json())
        .then(json=>{
            console.dir(json.recordings);
            // boucle foreach
            json.recordings.forEach(element => {
                console.dir(element.title);
                console.dir(element ['artist-credit'][0].name);
                result.innerHTML += `<div class="select" onclick="addTitre('${element.title}')">
                Titre : ${element.title} -
                Artiste : ${element['artist-credit'][0].name}
                </div>`
            });
           
        })
    
    
    }
})
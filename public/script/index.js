let locality;


const search=document.querySelector("#search");
search.addEventListener("keyup",()=>{
const provider=document.querySelectorAll(".PROVIDER");
provider.forEach((val)=>{

    const inputVal=search.value.toLowerCase()
const content=val.innerHTML.toLowerCase();

if (content.indexOf(inputVal) == -1) {

    val.closest("tr").className="d-none"

}else{
     val.closest("tr").classList.remove("d-none")


}

})

        if (search.value.length === 0) {
             const town=document.querySelectorAll(".TOWN");
       town.forEach((val)=>{


        const content=val.innerHTML.toLowerCase();

        if (content.indexOf(locality) == -1) {

    val.closest("tr").className="d-none"

        }else{
     val.closest("tr").classList.remove("d-none")


        }

        })
        }

})







//location


if (navigator.geolocation) {
  
    navigator.geolocation.getCurrentPosition((position)=>{
        
        const lat=position.coords.latitude;
        const long=position.coords.longitude

getLocation(lat,long)


    }, (error) => {
      console.error("Error getting location:", error);
    }
  );
    

}else {
  console.log("Geolocation is not supported by this browser.");
}



async function getLocation(lat,long) {
  await  fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${long}&localityLanguage=en`)
    .then((resp)=>resp.json())
    .then((data)=>{
       locality=data['locality'].toLowerCase();
       const town=document.querySelectorAll(".TOWN");
       town.forEach((val)=>{


        const content=val.innerHTML.toLowerCase();

        if (content.indexOf(locality) == -1) {

    val.closest("tr").className="d-none"

        }else{
     val.closest("tr").classList.remove("d-none")


        }

        })
    })
}
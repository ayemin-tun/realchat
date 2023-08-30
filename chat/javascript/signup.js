const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr =new XMLHttpRequest(); //create a new instance of XMLHttpRequest
    xhr.open("POST","php/signup.php",true); //http method က post/ send form php/signup.php
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){ //check the request has been complete
            if(xhr.status === 200){ // status code 200 is successful response
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    // send form data through php file
    let formData = new FormData(form);//creating new FormData Object
    xhr.send(formData); //send form data to php
    
}
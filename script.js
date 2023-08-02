const form = document.querySelector("form");
const statusTxt = document.querySelector(".button-area span");

form.onsubmit = (e) => {
    e.preventDefault();
    statusTxt.style.display = "block";
    statusTxt.style.color = "#06DEFD";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "message.php", true);
    xhr.onload = () => {
        if(xhr.readyState == 4 && xhr.status == 200) {
            let response = xhr.response;
            console.log(response);
            if(response.indexOf("Sorry, failed to sent mail") != -1 || response.indexOf("Enter a valid email adress") != -1 || response.indexOf("You need to give an email adress and write a message.") != -1){
                statusTxt.style.color = "red";
            }else{
                form.reset();
                setTimeout(() => {
                    statusTxt.style.display = "none";
                }, 3000)
            }
            statusTxt.innerText = response;
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
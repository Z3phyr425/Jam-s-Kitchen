document.getElementById('checkBoxContainer').addEventListener('click', function(){
    let checkBox = document.getElementById('checkBox');
    let password = document.getElementById('password');
    if(checkBox.checked == false){
        checkBox.checked = true;
        password.type = "text";
    }else{
        checkBox.checked = false;
        password.type = "password";
    }
    
})

document.getElementById('checkBox').addEventListener('click', function(){
    let checkBox = document.getElementById('checkBox');
    let password = document.getElementById('password');
    if(checkBox.checked == false){
        checkBox.checked = true;
        password.type = "text";
    }else{
        checkBox.checked = false;
        password.type = "password";
    }
    
})
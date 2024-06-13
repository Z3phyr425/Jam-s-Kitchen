document.getElementById('update').addEventListener('click', function(){
    document.getElementById('updatePassword').classList.add('show');
})
document.getElementById('closeUpdatePassword').addEventListener('click', function(){
    document.getElementById('updatePassword').classList.remove('show');
})
document.getElementById('checkBoxContainer').addEventListener('click', function(){
    let checkBox = document.getElementById('checkBox');
    let password = document.getElementById('password');
    let cpassword = document.getElementById('cpassword');
    if(checkBox.checked == false){
        checkBox.checked = true;
        password.type = "text";
        cpassword.type = "text";
    }else{
        checkBox.checked = false;
        cpassword.type = "password";
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
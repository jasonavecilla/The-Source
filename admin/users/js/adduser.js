
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
        return (true);
    } else {
        return (false);
    }  
}

let eEmail = document.querySelector('#txtEmail');
eEmail.addEventListener('change', () => {    
    if(ValidateEmail(eEmail.value)) {
        let sEmail = document.querySelector('#txtEmail').value;
        $.ajax({
            type: 'POST',
            url: "../v/validateuseremail.php",
            data: {email: sEmail},
            success: (result) => {
                if(result == 'does not exist') {
                    document.querySelector('.evm').innerHTML = `<small class="text-success">email is valid</small>`;                    
                } else if(result == 'exist') {
                    document.querySelector('.evm').innerHTML = `<small class="text-warning">email already exist!</small>`;                     
                } else {
                    document.querySelector('.evm').innerHTML = `<small class="text-danger">error, contact administrator!</small>`;
                }
            }
        });
    } else {
        document.querySelector('.evm').innerHTML = `<small class="text-danger">email is invalid!</small>`;
    }
});

let eUsername = document.querySelector('#txtUsername');
eUsername.addEventListener('change', () => {
    let sUser = document.querySelector('#txtUsername').value;
        $.ajax({
            type: 'POST',
            url: "../v/validateusername.php",
            data: {user: sUser},
            success: (result) => {
                if(result == 'does not exist') {
                    document.querySelector('.uvm').innerHTML = `<small class="text-success">username is available</small>`;                    
                } else if(result == 'exist') {
                    document.querySelector('.uvm').innerHTML = `<small class="text-warning">username already exist!</small>`;                     
                } else {
                    document.querySelector('.uvm').innerHTML = `<small class="text-danger">error, contact administrator!</small>`;
                }
            }
        });    
});

let btnAddUser = document.querySelector('#btnAddUser');
btnAddUser.addEventListener('click', () => {

    if(document.querySelector('.uvm').textContent == 'username is available' && document.querySelector('.evm').textContent == 'email is valid') {

        let sFullName = document.querySelector('#txtFullName').value;
        let sPosition = document.querySelector('#txtPosition').value;
        let sUsername = document.querySelector('#txtUsername').value;
        let sEmail = document.querySelector('#txtEmail').value; 
        let sAccess = document.querySelector('#txtAccess').value;
        let sPhoto = document.getElementById("dropBox").style.backgroundImage.slice(4, -1).replace(/"/g, "");        

        let oJsonData = {
            name: sFullName,
            position: sPosition,
            username: sUsername,
            email: sEmail,
            access: sAccess,
            photo: sPhoto
        };

        $.ajax({
            type: 'POST',
            url: "../c/adduser.php",
            data: oJsonData,
            beforeSend: () => {
                JsLoadingOverlay.show({
                    'overlayBackgroundColor': '#000',
                    'overlayOpacity': 0.8,
                    'spinnerIcon': 'ball-atom',
                    'spinnerColor': '#198754',
                    'spinnerSize': '2x',
                    'overlayIDName': 'overlay',
                    'spinnerIDName': 'spinner',
                  });            
            },
            success: (result) => {

                if (result == "error") {

                    alert("Please call system admnistrator");

                } else {

                    JsLoadingOverlay.hide();

                    document.querySelector('#txtFullName').value = "";
                    document.querySelector('#txtPosition').value = "";
                    document.querySelector('#txtUsername').value = "";
                    document.querySelector('#txtEmail').value = "";
                    document.querySelector('#txtAccess').value = "";
                    document.getElementById("dropBox").style.backgroundImage = 'url("../assets/images/imgplaceholder.jpg")';
                    document.querySelector('.evm').innerHTML = "";
                    document.querySelector('.uvm').innerHTML = "";

                }
            }
        });
    } else {
        alert('please check your entries, thanks...');
    }
});
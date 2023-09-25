
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
        return (true);
    } else {
        return (false);
    }  
}

let eEmail = document.querySelector('#custRegEmail');
eEmail.addEventListener('change', () => {    
    if(ValidateEmail(eEmail.value)) {
        let sEmail = document.querySelector('#custRegEmail').value;
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

let eUsername = document.querySelector('#custRegUserN');
eUsername.addEventListener('change', () => {
    let sUser = document.querySelector('#custRegUserN').value;
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

let ePass = document.querySelector('#custRegPassCon');
ePass.addEventListener('change', () => {
    let sPass = document.querySelector('#custRegPass').value;
    let sPassC = document.querySelector('#custRegPassCon').value;

    if(sPass == sPassC) {
        document.querySelector('.pvm').innerHTML = `<small class="text-success">password match!</small>`;                    
    } else {
        document.querySelector('.pvm').innerHTML = `<small class="text-warning">password did not match, try again!</small>`;                     
    }  
});

let btnAddUser = document.querySelector('#btnCustReg');
btnAddUser.addEventListener('click', () => {

    if(document.querySelector('#custAgree').checked) {

        if(document.querySelector('.uvm').textContent == 'username is available' && document.querySelector('.evm').textContent == 'email is valid' && document.querySelector('.pvm').textContent == 'password match!') {

            let sFullName = document.querySelector('#custRegName').value;
            let sPosition = 'Customer';
            let sUsername = document.querySelector('#custRegUserN').value;
            let sEmail = document.querySelector('#custRegEmail').value; 
            let sAccess = 'lvl0';
            let sPassword = document.querySelector('#custRegPass').value;
            let sTandC = 'agree';        
    
            let oJsonData = {
                name: sFullName,
                position: sPosition,
                username: sUsername,
                email: sEmail,
                access: sAccess,
                password: sPassword,
                tandc: sTandC
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
                        window.location = '/02-mp/pages/login';
    
                    }
                }
            });
        } else {
            alert('please check your entries, thanks...');
        }
                           
    } else {
        document.querySelector('.tandc').innerHTML = `<small class="text-info">please read our terms & conditions and check checkbox to agree, thanks!</small>`;                     
    }  
});
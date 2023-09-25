
document.getElementById('btn_login').addEventListener('click', function(){
    let sUsername = document.getElementById('login-username').value;
    let sPass = document.getElementById('login-password').value;

    if( sUsername == "" || sPass == "") {
        document.getElementById('lgnMsg').innerHTML = '<small class="text-info">Please complete the fields</small>';
    } else {
        let sJsonData = {
            username: sUsername,
            password: sPass
        };
    
        $.ajax({
            type: 'POST',
            url: "../c/login.php",
            data: sJsonData,
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
                JsLoadingOverlay.hide();

                if(result == 'Username does not exist!' || result == 'error') {
                    document.getElementById('lgnMsg').innerHTML = '<small class="text-danger">Username does not exist!</small>';                
                } else if(result == 'Username and password does not match!'){
                    document.getElementById('lgnMsg').innerHTML = '<small class="text-danger">Username and password does not match!</small>';                
                } else if(result == 'Please contact administrator to activate your account!') {
                    document.getElementById('lgnMsg').innerHTML = '<small class="text-danger">Please contact administrator to activate your account!</small>';
                } else {
                    window.location = result; 
                }                           
            }
        });
    }   

});
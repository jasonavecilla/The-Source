
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
        return (true);
    } else {
        return (false);
    }  
}

let eEmail = document.querySelector('#gnp-email');
eEmail.addEventListener('change', () => {  
    // $('#btn_gnp').off();
    if(ValidateEmail(eEmail.value)) {
        let sEmail = document.querySelector('#gnp-email').value;
        $.ajax({
            type: 'POST',
            url: "../v/validategnpemail.php",
            data: {email: sEmail},
            success: (result) => {
                if(result == 'does not exist') {
                    document.querySelector('#gnpMsg').innerHTML = `<small class="text-warning">your email does not exist!</small>`;

                    document.getElementById('btn_gnp').addEventListener('click', function(){
                        document.querySelector('#gnpMsg').innerHTML = `<small class="text-danger">we did not found your email, please contact administrator!</small>`;
                    });
                    $('#btn_gnp').attr('disabled', true);
                } else {
                    $('#btn_gnp').attr('disabled', false);
                    document.querySelector('#gnpMsg').innerHTML = `<small class="text-info">email exist, please proceed and get your new password!</small>`;

                    if(document.querySelector('#gnpMsg').textContent == 'email exist, please proceed and get your new password!') {
                    
                        let gnpId = result;
                        
                        document.getElementById('btn_gnp').addEventListener('click', function(){
                            let sEmail = document.getElementById('gnp-email').value;    
                        
                            let sJsonData = {
                                email: sEmail,
                                id: gnpId
                            };
                        
                            $.ajax({
                                type: 'POST',
                                url: "../c/getnewpass.php",
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
                    
                                    if(result == 'does not exist') {
                                        document.querySelector('#gnpMsg').innerHTML = `<small class="text-warning">your email does not exist!</small>`;               
                                    } else {
                                        document.querySelector('.div-gnp').innerHTML = '<div><h4 class="text-secondary text-center">please follow the <a href="otp.php?id=' + gnpId + '">link here</a> and provide the otp sent in your email to get your new password.</h4></div>'; 
                                    }                           
                                }
                            });                            
                        
                        });
                    } else {
                        document.querySelector('#gnpMsg').innerHTML = `<small class="text-warning">your email does not exist!</small>`;
                    }
                } 
            }
        });

    } else {
        document.querySelector('#gnpMsg').innerHTML = `<small class="text-danger">Please input valid email!</small>`;
    }
});

let btnChangePass = document.getElementById('btnChangePass');
btnChangePass.addEventListener('click', () => {
    let nId = document.getElementById('updIdUser').value;
    let sUser = document.getElementById('updUsername').value;
    let sEmail = document.getElementById('updEmail').value;

    $.ajax({
        type: 'POST',
        url: "../c/sendotp.php",
        data: {id: nId, user: sUser, email: sEmail },
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

            document.querySelector('.div-change-pass').innerHTML = `Please enter your otp sent to your email: <input type="text" id="userOtp"><div class="otperrmsg"></div>`;
            
            let userOtp = document.getElementById('userOtp');
            userOtp.addEventListener('change', () => {
                let sOtp = document.getElementById('userOtp').value;

                $.ajax({
                    type: 'POST',
                    url: '../v/validateotp.php',
                    data: { id:nId, otp: sOtp },
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
                        if(result == 'match') {
                            document.querySelector('.otperrmsg').innerHTML = `<button class="btn btn-danger btn-sm" id="changePass">Proceed to change password</button>`;

                            let btnProceed = document.getElementById('changePass');
                            btnProceed.addEventListener('click', () => {
                                document.querySelector('.div-change-pass').innerHTML = `<label class="w-100">New Password</label>
                                <input class="w-100" type="password" id="txtNewPass">
                                <label class="w-100">Confirm New Password</label>
                                <input class="w-100" type="password" id="txtConNewPass">
                                <div class="errPassMsg"></div>
                                <button class="btn btn-danger btn-sm mt-2" id="saveNewPass">Save New Password</button>`;

                                let btnSaveNewPass = document.getElementById('saveNewPass');
                                btnSaveNewPass.addEventListener('click', () => {

                                    let sNewPass = document.getElementById('txtNewPass').value;
                                    let sConNewPass = document.getElementById('txtConNewPass').value;

                                    if(sNewPass == sConNewPass && sNewPass != '') {

                                        $.ajax({
                                            type: 'POST',
                                            url: '../c/updatepass.php',
                                            data: { id:nId, newpass: sNewPass },
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
                                                console.log(result);
                                                document.querySelector('.div-change-pass').innerHTML = `<span class="text-success">New Password Saved!</span>`;
                                                setTimeout(function() { window.location = '/02-mp/logout.php'; }, 5000);
                                            }

                                        });

                                    } else {
                                        document.querySelector('.errPassMsg').innerHTML = `<span class="text-danger">Check your entries!</span>`;
                                    }
                                });

                            });

                        } else {
                            document.querySelector('.otperrmsg').innerHTML = '<span class="text-danger">try again</span>';
                        }

                    }
                });

            });
        }
    }); 

});
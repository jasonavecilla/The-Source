
const btnActivate = document.querySelector('#btnGetNewPass');

btnActivate.addEventListener('click', () => {
    const sOtp = document.getElementById('sOtp').value;
    const nId = document.getElementById('sOtpUserId').value;

    sJsonData = {
        sotp: sOtp,
        id: nId
    }

    $.ajax({
        type: 'POST',
        url: "../c/sendnewpass.php",
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
            // console.log(result);
            if(result == 'You provided a wrong otp, please try again'){
                document.getElementById('errMsg').innerHTML = "<small class='text-danger'>You provided a wrong otp, please try again</small>";
            } else {
                document.querySelector('.div-gnp').innerHTML = '<div><h4 class="text-secondary text-center">New password sent to your email! <a href="../pages/login">Got to login page >></a></h4></div>'; 
            }
            
        }
    });
});
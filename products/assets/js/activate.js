
const btnActivate = document.querySelector('#btnActivate');

btnActivate.addEventListener('click', () => {
    const sOtp = document.getElementById('sOtp').value;
    const nId = document.getElementById('sOtpUserId').value;

    sJsonData = {
        sotp: sOtp,
        id: nId
    }

    $.ajax({
        type: 'POST',
        url: "c/activateuser.php",
        data: sJsonData,
        success: (result) => {
            // console.log(result);
            if(result == 'You provided a wrong otp, please try again'){
                document.getElementById('errMsg').innerHTML = "<small class='text-danger'>You provided a wrong otp, please try again</small>";
            } else {
                window.location = result;
            }
            
        }
    });
});
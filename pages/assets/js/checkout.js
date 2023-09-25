
let btnCO = document.querySelector('#btnCheckout');
btnCO.addEventListener('click', () => {
    let aJson = JSON.parse(document.querySelector('#getOrderWithTIN').textContent);
    // console.log(json);
    let pMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
    let custName = document.querySelector('#fullName').value;
    let custUserName = document.querySelector('#username').value;
    let custEmail = document.querySelector('#email').value;
    let custAddress = document.querySelector('#address').value;

    let randomstring = Math.random().toString(36).slice(-8);

    let objCust = {
        pay: pMethod,
        custname: custName,
        custun: custUserName,
        custmail: custEmail,
        custaddress: custAddress
    }

    let arrFinal = [];
    for(let x = 0; x < aJson.length; x++) {
        let objJson = aJson[x];
        objJson['tin'] += randomstring ;
        objFinal = {...objJson, ...objCust};
        arrFinal.push(objFinal);
    }

    // console.log(arrFinal);

        $.ajax({
            type: 'POST',
            url: '../c/checkout.php',
            data: {data: arrFinal},
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
            success: (results) => {
                JsLoadingOverlay.hide();
                
                $.ajax({
                    type: 'POST',
                    url: '../c/sendreceipt.php',
                    data: {tin: arrFinal[0]['tin']},
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
                    success: (results) => {
                        JsLoadingOverlay.hide();
                        // console.log(results);
                        window.location = '../goods-near-you/';          
                    }
                });

                // window.location = '../goods-near-you/';                
            }
        });
    
});
$(document).ready(() => {

    $("#btnUpdProduct").click(function() {

        let nId = document.querySelector('#updId').value;
        let sCode = document.querySelector('#updCode').value;
        let sProductName = document.querySelector('#updProductName').value;
        let sDescription = document.querySelector('#updDescription').value;
        let nPrice = document.querySelector('#updPrice').value;
        let nQuantity = document.querySelector('#updQuantity').value;
        let sFile = document.getElementById("dropBox").style.backgroundImage.slice(8, -1).replace(/"/g, "");
    
        let oJsonData = {
            id: nId,
            code: sCode,
            name: sProductName,
            description: sDescription,
            price: nPrice,
            quantity: nQuantity,
            file: sFile
        };
    
        $.ajax({
            type: 'POST',
            url: "../c/updateproduct.php",
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
    
                    window.location = '../';
    
                }
            }
        });

    });

});
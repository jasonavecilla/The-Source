
const btnAddProduct = document.getElementById('btnAddProduct');
btnAddProduct.addEventListener('click', () => {

    let sCode = document.querySelector('#txtCode').value;
    let sProductName = document.querySelector('#txtProductName').value;
    let sDescription = document.querySelector('#txtDescription').value;
    let nPrice = document.querySelector('#nPrice').value;
    let nQuantity = document.querySelector('#nQuantity').value;
    let sFile = document.getElementById("dropBox").style.backgroundImage.slice(8, -1).replace(/"/g, "");

    let oJsonData = {
        code: sCode,
        name: sProductName,
        description: sDescription,
        price: nPrice,
        quantity: nQuantity,
        file: sFile
    };

    $.ajax({
        type: 'POST',
        url: "../c/addproduct.php",
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

                document.querySelector('#txtCode').value = "";
                document.querySelector('#txtProductName').value = "";
                document.querySelector('#txtDescription').value = "";
                document.querySelector('#nPrice').value = "";
                document.querySelector('#nQuantity').value = "";
                document.getElementById("dropBox").style.backgroundImage = 'url("../../assets/images/imgplaceholder.jpg")';

                document.getElementById("txtProductName").focus();

            }
        }
    });

});

// const arrToCart = [];

function addToCart(productCode) {
    
    $.ajax({
        type: 'POST',
        url: '../c/getproduct.php',
        data: { code: productCode },
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
        success: (productDetails) => {
            let objJson = JSON.parse(productDetails);

            // console.log(objJson);

            JsLoadingOverlay.hide();

            $.ajax({
                type: 'POST',
                url: '../c/addtocart.php',
                data: objJson,
                // beforeSend: () => {
                //     JsLoadingOverlay.show({
                //         'overlayBackgroundColor': '#000',
                //         'overlayOpacity': 0.8,
                //         'spinnerIcon': 'ball-atom',
                //         'spinnerColor': '#198754',
                //         'spinnerSize': '2x',
                //         'overlayIDName': 'overlay',
                //         'spinnerIDName': 'spinner',
                //       });            
                // },
                success: (result) => {

                    JsLoadingOverlay.hide();
                    // document.querySelector('.' + productCode).innerHTML = `<button class="btn btn-danger" type="button" onclick="document.location='../cart/'">view cart</button>`;
                    window.location.reload();    
                    
                    // console.log(result);
                }
            });
            
        }
    });
    
}

function delToCart(nKey, e) {
    var sParentTr = ($(e).closest('section'))[0];

    $.ajax({
        type: 'POST',
        url: "../c/removefromcart.php",
        data: {key: nKey},
        success: (result) => {
            if (result == "error") {
                alert("Please call system admnistrator");
            } else {
                $(sParentTr).hide(500, () => {
                    window.location.reload(); 
                });  
            }
        }
    });
    
}

function changeQty(cartId) {
    let nQty = document.querySelector('#qty'+cartId).value;
    let maxQty = document.querySelector('.nAvailable'+cartId).textContent;

    if (+nQty <= +maxQty) {
        goChange (nQty)
        
    } else {
        document.querySelector('#qty'+cartId).value = maxQty;
        goChange (maxQty);
        
    }

    function goChange (fQty) {

        $.ajax({
            type: 'POST',
            url: "../c/changeqty.php",
            data: {id: cartId, qty: fQty},
            success: (result) => {
                if (result == "error") {
                    alert("Please call system admnistrator");
                } else {
                    // console.log(result);
                        window.location.reload(); 
                }
            }
        });

    }    

}
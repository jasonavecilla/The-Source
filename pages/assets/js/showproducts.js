
window.addEventListener('load', () => {
    fetch();
});

function fetch() {
    
    $.ajax({
        type: 'POST',
        url: "../c/showproducts.php",
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
        success: (result) => { // console.log(result);
            if (result == "error") {
                alert("Please call system admnistrator");
            } else {
                // console.log(result);
                document.getElementById('product-list').innerHTML = result;
                JsLoadingOverlay.hide();
            }
        }
    });

}
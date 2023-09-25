
window.addEventListener('load', () => {
    fetch();
});

function fetch() {
    
    $.ajax({
        type: 'POST',
        url: "c/fetchproducts.php",
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
                document.getElementById('productlist').innerHTML = result;
                JsLoadingOverlay.hide();
            }
        }
    });
}

function edit(nId) {
    window.location = "edit-product/index.php?id=" + nId;
}

function del(nId, elem) {
    var sParentTr = ($(elem).closest('tr'))[0];

    $.ajax({
        type: 'POST',
        url: "c/getproduct.php",
        data: {nid: nId},
        success: (result) => {
            if (result == "error") {
                alert("Please call system admnistrator");
            } else {
                var objRes = JSON.parse(result);

                document.getElementById('sProductDel').innerHTML = objRes.productname;
                document.getElementById('nProductId').value = nId;

                $("#delCon").modal('show');
            }
        }
    });

    document.getElementById("btnProceedDelete").addEventListener('click', function() {

        $.ajax({
            type: 'POST',
            url: "c/deleteproduct.php",
            data: {id: nId},
            success: (result) => {
                if (result == "error") {
                    alert("Please call system admnistrator");
                } else {
                    $("#delCon").modal('hide');
                    $(sParentTr).hide(500, () => {
                        fetch();
                    });                
                }
            }
        });
        
    });
    
    
}
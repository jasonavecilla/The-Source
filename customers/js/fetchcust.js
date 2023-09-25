window.addEventListener('load', () => {
    fetch();      
});
  
function checkingbox() {
    document.querySelectorAll('input[type=checkbox]').forEach((e) => {e.value == 'active' ? e.checked = true : false});
}

function fetch() {
    
    $.ajax({
        type: 'POST',
        url: "c/fetchcust.php",
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
                document.getElementById('custlist').innerHTML = result;
                checkingbox();
                JsLoadingOverlay.hide();
            }
        }
    });
}

function activate(nId) {

    if(document.getElementById(`act${nId}`).checked == true && document.getElementById(`label${nId}`).textContent == 'active') {

		document.getElementById(`act${nId}`).checked = true;        

    } else if(document.getElementById(`act${nId}`).checked == true && (document.getElementById(`label${nId}`).textContent == '' || document.getElementById(`label${nId}`).textContent == 'inactive' || document.getElementById(`label${nId}`).textContent == 'pending')) {

        let sJsonData = {
            id: nId,
            status: 'active'
        }
        $.ajax({
            type: 'POST',
            url: "c/adminactivateuser.php",
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
                if (result == "error") {
                    alert("Please call system admnistrator");
                } else {
                    // console.log(result);
                    // var objRes = JSON.parse(result);
                    document.getElementById(`label${nId}`).textContent = result;
                    fetch();
                    JsLoadingOverlay.hide();               
                }
            }
        });

    } else if(document.getElementById(`act${nId}`).checked == false && document.getElementById(`label${nId}`).textContent == 'active') {

        let sJsonData = {
            id: nId,
            status: 'inactive'
        }
        $.ajax({
            type: 'POST',
            url: "c/adminactivateuser.php",
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
                if (result == "error") {
                    alert("Please call system admnistrator");
                } else {
                    // console.log();
                    // var objRes = JSON.parse(result);
                    document.getElementById(`label${nId}`).textContent = result;
                    document.getElementById(`act${nId}`).checked = false;
                    fetch();
                    JsLoadingOverlay.hide(); 
                }
            }
        });
		
    }    
}

function del(nId, elem) {
    var sParentTr = ($(elem).closest('tr'))[0];

    $.ajax({
        type: 'POST',
        url: "c/getuser.php",
        data: {nid: nId},
        success: (result) => {
            if (result == "error") {
                alert("Please call system admnistrator");
            } else {
                var objRes = JSON.parse(result);

                document.getElementById('sUserDel').innerHTML = objRes.username;
                document.getElementById('nUserId').value = nId;

                $("#delCon").modal('show');
            }
        }
    });

    document.getElementById("btnProceedDelete").addEventListener('click', function() {

        $.ajax({
            type: 'POST',
            url: "c/deleteuser.php",
            data: {nid: nId},
            beforeSend: () => {
                           
            },
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

// function edit(nId) {
//     window.location = "edit-user?id=" + nId;
// }
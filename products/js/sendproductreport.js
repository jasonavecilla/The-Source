
const btnSendCsv = document.querySelector('#btn-scpr');
btnSendCsv.addEventListener('click', () => {
    $("#popSendEmails").modal('show');
    $("#popSendEmails").addClass("emailer");

    const btnSendRep = document.querySelector('#btnSendR');
    btnSendRep.addEventListener('click', () => {
        let sRe = document.querySelector('#rEmails').value;
        let sCe = document.querySelector('#ccEmails').value;
        let sBe = document.querySelector('#bccEmails').value;

        const sJsonData = {
            emails: sRe,
            ccs: sCe,
            bccs: sBe
        };

        $.ajax({
            type: 'POST',
            url: "send/productcsvreport.php",
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
                    // alert("Report Sent!");
                    JsLoadingOverlay.hide();
                    $("#popSendEmails").modal('hide'); 
                }
            }
        });
    });
    
});


const btnSendPdf = document.querySelector('#btn-sppr');
btnSendPdf.addEventListener('click', () => {
    $("#popSendEmailsP").modal('show');
    $("#popSendEmailsP").addClass("emailer");

    const btnSendRep = document.querySelector('#btnSendRP');
    btnSendRep.addEventListener('click', () => {
        let sRe = document.querySelector('#rEmailsP').value;
        let sCe = document.querySelector('#ccEmailsP').value;
        let sBe = document.querySelector('#bccEmailsP').value;

        const sJsonData = {
            emails: sRe,
            ccs: sCe,
            bccs: sBe
        };

        $.ajax({
            type: 'POST',
            url: "send/productpdfreport.php",
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
                    JsLoadingOverlay.hide();
                    $("#popSendEmailsP").modal('hide'); 
                }
            }
        });
    });
    
});
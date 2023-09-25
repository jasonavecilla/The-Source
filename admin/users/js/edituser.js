
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)){
        return (true);
    } else {
        return (false);
    }  
}

let eEmail = document.getElementById('updEmail');                                
eEmail.addEventListener('change', () => {    
    if(ValidateEmail(eEmail.value)) {
        let sEmail = document.querySelector('#updEmail').value;
        $.ajax({
            type: 'POST',
            url: "../v/validateuseremail.php",
            data: {email: sEmail},
            success: (result) => {
                if(result == 'exist') {
                    document.querySelector('.upevm').innerHTML = `<small class="text-warning w-100">email already exist!</small>`;
                } else {
                    document.querySelector('.upevm').innerHTML = `<small class="text-success w-100">email is valid</small>`; 
                }
            }
        });
    } else {
        document.querySelector('.evm').innerHTML = `<small class="text-danger w-100">email is invalid!</small>`;
    }
});

let eUsername = document.getElementById('updUsername');                
eUsername.addEventListener('change', () => {
    let sUser = document.querySelector('#updUsername').value;
        $.ajax({
            type: 'POST',
            url: "../v/validateusername.php",
            data: {user: sUser},
            success: (result) => {
                if(result == 'exist') {
                    document.querySelector('.upuvm').innerHTML = `<small class="text-danger w-100">username already exist!</small>`;
                } else {
                    document.querySelector('.upuvm').innerHTML = `<small class="text-success w-100">username is available</small>`; 
                }
            }
        });    
});

document.getElementById('btnUpdUser').addEventListener('click', function(){
    let nId = document.getElementById('updIdUser').value;
    let sFullName = document.getElementById('updFullName').value;
    let sPosition = document.getElementById('updPosition').value;
    let sUsername = document.getElementById('updUsername').value;
    let sEmail = document.getElementById('updEmail').value;
    let sAccess = document.getElementById('updAccess').value;
    let sPhoto = document.getElementById("dropBox").style.backgroundImage.slice(4, -1).replace(/"/g, "");

    console.log(sPhoto);

    let sJsonData = {
        id: nId,
        name: sFullName,
        position: sPosition,
        username: sUsername,
        email: sEmail,
        access: sAccess,
        photo: sPhoto
    };

    $.ajax({
        type: 'POST',
        url: "../c/updateuser.php",
        data: sJsonData,
        success: (result) => {
            // console.log(result);
            window.location = result;            
        }
    });

});
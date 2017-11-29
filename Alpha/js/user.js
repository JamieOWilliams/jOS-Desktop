$('.profile-icon').click(function() {
  $('#user-modal').modal('show');
});

// var userData = {
//     "name": "",
//     "email": "",
//     "password": "",
//     "passwordConfirm": ""
//   };
//
// $('#signup-submit').click(function(e) {
//   e.preventDefault();
//   userData.name = $('#inputName').val();
//   userData.email = $('#inputEmail').val();
//   userData.password = $('#inputPassword').val();
//   userData.passwordConfirm = $('#inputPasswordConfirm').val();
// });







// $('#inputWarningEmpty').hide();
// $('#inputWarningPassword').hide();
//
// $('#signup-submit').click(function() {
//   userData.name = $('#inputName').val();
//   userData.email = $('#inputEmail').val();
//   userData.password = $('#inputPassword').val();
//   userData.passwordConfirm = $('#inputPasswordConfirm').val();
//
//   if (userData.name !== "" && userData.email !== "" && userData.password !== "" && userData.passwordConfirm !== "") {
//     if (userData.password === userData.passwordConfirm) {
//
//     } else {
//       //If the passwords do not match
//       $('#inputWarningEmpty').fadeIn(1200);
//     };
//   } else {
//     //If a field is empty
//     $('#inputWarningPassword').fadeIn(1200);
//   }
// });
// var formValid;
// $("#signup-submit").click(function(e){
//     e.preventDefault();
//     formValid = false;
//     userData.name = $('#inputName').val();
//     userData.email = $('#inputEmail').val();
//     userData.password = $('#inputPassword').val();
//     userData.passwordConfirm = $('#inputPasswordConfirm').val();
//     //validate email (pseudo code)
//     if (userData.name === "" || userData.email === "" || userData.password === "" || userData.passwordConfirm === "") {
//       //If a field is empty
//       $('#inputWarningEmpty').show();
//     } else {
//       if (userData.password === userData.passwordConfirm) {
//         formValid = true;
//       } else {
//         //If the passwords do not match
//         $('#inputWarningPassword').show();
//       };
//     };
//
//   if (formValid) {
//     //make ajax call
//     $.ajax({
//       type: 'POST',
//       url: 'jOSDataBase.mysql.pythonanywhere-services.com/dbConnectjOS.py',
//       data: userData,
//       dataType: 'json',
//       // success: callback
//     });
//   }
// });

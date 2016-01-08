function validateEmail($obj) {
  var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return regEx.test($obj.val());
}

function swapClass($obj, beforeClass, afterClass) {
  $obj.removeClass(beforeClass);
  $obj.addClass(afterClass);
}

function passwordsMatch() {
  return $('#password_confirmation').val() == $('#password').val();
}

function hasPresence($obj) {
  return $obj.val() !== "" && $obj.val() !== null;
}

function meetsLengthRequirements($obj, minLength) {
  return $obj.val().length > minLength;
}

function fail($obj) {
  swapClass($obj, 'success', 'fail');
}

function success($obj) {
  swapClass($obj, 'fail', 'success');
}

$(document).ready(function() {
  $('#first_name, #last_name').keyup(function(){
    if(hasPresence($(this))){
      success($(this));
    } else{
      fail($(this));
    }
  });

  $('#email').keyup(function(){
    if(validateEmail($(this))){
      success($(this));
    } else{
      fail($(this));
    }
  });

  $('#password').keyup(function(){
    if(meetsLengthRequirements($(this), 7)){
      success($(this));
    } else{
      fail($(this));
    }
  });

  $('#password_confirmation').keyup(function(){
    if(passwordsMatch()){
      success($(this));
    } else{
      fail($(this));
    }
  });
});

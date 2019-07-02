
  // $(".alert.alert-warning").fadeTo(4000, 500).slideDown(500, function(){
  //   $(".alert.alert-warning").slideDown(500);
  // });

  setTimeout(fade_out, 4000);

  function fade_out() {
    $(".alert.alert-warning").fadeOut().empty();
    //$(".alert.alert-warning").slideDown(500);
  }

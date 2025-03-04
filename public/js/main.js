$(document).ready(function(){ // Every Password input add icon to show password when clicked
  $('.password-with-icon input[type="password"]').after(`<span class="eye password_eye" > <i class="fa-solid fa-eye icon"></i></span>`);
});


//Show Passowrd when Click on  Eye icon
$(document).ready(function(){
  let passwords = $('.password_eye');
  passwords.each( function(i , ele) {
    $(ele).on('click', () =>{
      $(this).attr('type')
      let type =  $(this).siblings('input').attr('type');
      type == 'password' ? $(this).siblings('input').attr('type', 'text')             : $(this).siblings('input').attr('type', 'password');
      type == 'password' ? $(this).html(`<i class="fa-solid fa-eye-slash icon"></i>`) : $(this).html(`<i class="fa-solid fa-eye icon"></i>`);
    })
  } )
});


//For Aside
$(document).ready(function () {
  let MenuItems  = $('.menue-item > a');
  MenuItems.each(function(i, ele){
    $(ele).on('click', function(){
      $(this).parent().toggleClass('open');
    })
  })
});

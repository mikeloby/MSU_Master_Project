
$('nav a').on('click', function(e) {                 // User clicks nav link
  e.preventDefault();                                // Stop loading new link
  var url = this.href;                               // Get value of href

  $('nav a.current').removeClass('current');         // Clear current indicator
  $(this).addClass('current');   
                      
  $('#container').remove();   
  $('#content').load(url + ' #container').fadeIn('slow');
  
});

 



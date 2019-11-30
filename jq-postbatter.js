
$('#send').on('submit', function(e) {           // When form is submitted
  e.preventDefault();                               // Prevent it being sent
  var details = $('#send').serialize();         // Serialize form data
  $.post('getbatter.php', details, function(data) {  // Use $.post() to send it
    $('#contentmain3').html(data);                    // Where to display result
  });
});
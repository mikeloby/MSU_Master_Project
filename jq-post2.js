
$('#feedb').on('submit', function(e) {           // When form is submitted
  e.preventDefault();                               // Prevent it being sent
  var details = $('#feedb').serialize();         // Serialize form data
  $.post('feedback.php', details, function(data) {  // Use $.post() to send it
    $('#feedb').html(data);                    // Where to display result
  });
});
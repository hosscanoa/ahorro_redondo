$(function()
{
  $('#add-new-bank').on('click', function() {
    $.get('/banks', {}, function(data) {
      console.log(data);
      $('#new-bank').empty();
      data.forEach(function(dto)
      {
        $('#new-bank').append($('<option/>').html(dto));
      });
    });
  });


  $('#list-redondeo').on('change', function()
  {
    var redondeo = $(this).val();

    $.post('/settings/update', { redondeo : redondeo }, function()
    {
        // Ejecutar codigo.
    });
  });


});

var $BANK_SELECTED = '';
var $CURRENT_ID = '';

$(function()
{
  clean();

  $('#add-new-bank').on('click', function() {
    clean();
  });

  $('#btn-login-bank').on('click', function(evt)
  {
    evt.preventDefault();
    var bank = $('#new-bank').val();
    var nameBank = $('#new-bank option[value=' + bank + ']').html();
    var crediCard = $('#credit-card').val();
    var numberpassword = $('#numberpassword').val();

    if (bank == '-1' || crediCard.trim() == '' || numberpassword.trim() == '')
    {
      alert('Llene los datos');
      return false;
    }

    var dto = {
      bank : bank,
      creditcard : crediCard,
      numberpassword : numberpassword
    };

    $.ajax({
        url: 'settings',
        type: 'POST',
        dataType: 'JSON',
        data: dto,
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(data)
        {
          $BANK_SELECTED = bank;

          $('#tbl-account-to-add').find('tbody').empty();

          data.forEach(function(_dto)
          {
            _dto.cuentas.forEach(function(_account)
            {
            $('#tbl-account-to-add').find('tbody')
                .append($('<tr>')
                          .append($('<td>').html(_account.id))
                          .append($('<td>').html(nameBank))
                          .append($('<td>').html(_account.descripcion + ' ' + (_account.tipo_moneda == '1' ? 'Soles': 'Dolares')))
                          .append($('<td>').html('<input type="checkbox" class="selected-accounts"  data-account=' + _account.id + ' />')));

            });
          });

          $('.frm-connect-new-card').hide();
          $('.frm-select-accounts').show();
        }
    });

  });


  $('#container-accounts').on('click', '.selected-accounts', function() {
    var length = $('.selected-accounts[type=checkbox]:checked').length;

    $('#btn-select-accounts').prop('disabled', (length==0));

  });

  $('.delete-account-in-bank').on('click', function()
  {
    $CURRENT_ID = $(this).attr('data-account');
  });

  $('#id-desactivate').on('click', function(){

    /*$.ajax({
        url: '/desactivateAccount',
        type: 'POST',
        dataType: 'JSON',
        data: { idCuenta: $CURRENT_ID },
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(data)
        {
          $('#desactivate-account').modal('hide');
          location.reload();
        }
    });*/
  });

  $('#btn-select-accounts').on('click', function()
  {
    var seleccionados = $('.selected-accounts[type=checkbox]:checked');

    var accounts = [];

    seleccionados.each(function() {
      accounts.push($(this).attr('data-account'));
    });

    var dto =
    {
      bank : $BANK_SELECTED,
      accounts : accounts
    };

    $.ajax({
        url: '/saveAccounts',
        type: 'POST',
        dataType: 'JSON',
        data: dto,
        beforeSend: function(request) {
            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
        },
        success: function(data)
        {
          $('#modal-new').modal('hide');
          location.reload();
        }
    });

  });

});


function clean()
{
  $('.frm-connect-new-card').show();
  $('.frm-select-accounts').hide();
  $('#new-bank').val("-1");
  $('#credit-card').val("");
  $('#numberpassword').val("");
  $('.selected-accounts').prop('checked', false);
  $BANK_SELECTED = '';
}
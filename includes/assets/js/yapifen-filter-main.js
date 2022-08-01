$(function() {
  $(".group-title").change(function() {
    if(this.checked) {
      var selected_g = $(this).attr('id');
      if (selected_g == 'ust-yapi') {
        $('[data-group="ust-yapi"]').prop('checked',true);
      }
      if (selected_g == 'ulastirma') {
        $('[data-group="ulastirma"]').prop('checked',true);
      }
      if (selected_g == 'su-enerji') {
        $('[data-group="su-enerji"]').prop('checked',true);
      }
    } else {
      var selected_g = $(this).attr('id');
      if (selected_g == 'ust-yapi') {
        $('[data-group="ust-yapi"]').prop('checked',false);
      }
      if (selected_g == 'ulastirma') {
        $('[data-group="ulastirma"]').prop('checked',false);
      }
      if (selected_g == 'su-enerji') {
        $('[data-group="su-enerji"]').prop('checked',false);
      }
    }
});
  $('#proje-turu-button').click(function() {
    if ($(this).hasClass('clicked')) {
      $(this).removeClass('clicked');
      $('#proje-turu-table').hide();
    } else {
      $(this).addClass('clicked');
      $('#proje-turu-table').show();
    }
  });
  $('#proje-durumu-button').click(function() {
    if ($(this).hasClass('clicked')) {
      $(this).removeClass('clicked');
      $('#proje-durumu-table').hide();
    } else {
      $(this).addClass('clicked');
      $('#proje-durumu-table').show();
    }
  });
  $('#projects_table').DataTable({
    "searching": false,
    "lengthChange": false
  });
});

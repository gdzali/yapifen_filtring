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
  var table = $('#projects_table').DataTable({
    "searching": false,
    "lengthChange": false,
    "pageLength":15,
    "order": [[2, 'desc']]
  });

  $('#yenile').click(function() {
    $('#projects_table').DataTable().destroy();
    $('#projects_table').DataTable({
      "searching": false,
      "lengthChange": false,
      "pageLength":15,
      "order": [[2, 'desc']]
    }).draw();
  });

  $('#btn-all').click(function() {
    $('[data-group="su-enerji"]').prop('checked',true);
    $('[data-group="ust-yapi"]').prop('checked',true);
    $('[data-group="ulastirma"]').prop('checked',true);
  });

  $('#btn-temizle').click(function() {
    $('[data-group="su-enerji"]').prop('checked',false);
    $('[data-group="ust-yapi"]').prop('checked',false);
    $('[data-group="ulastirma"]').prop('checked',false);
  });


});

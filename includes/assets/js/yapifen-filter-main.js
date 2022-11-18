$(function() {
  $(".group-title").change(function() {
    if(this.checked) {
      var selected_g = $(this).attr('id');
      $('[data-group="'+ selected_g +'"]').prop('checked',true);
    } else {
      var selected_g = $(this).attr('id');
    $('[data-group="'+ selected_g +'"]').prop('checked',false);
    }
  });

  $('#btn-temizle').click(function() {
    $('[data-group="su-enerji"]').prop('checked',false);
    $('[data-group="ulastirma"]').prop('checked',false);
    $('[data-group="ust-yapi"]').prop('checked',false);
    $('[data-group="endustriyel"]').prop('checked',false);
    $('#su-enerji-hidden').val('');
    $('#ulastirma-hidden').val('');
    $('#ust-yapi-hidden').val('');
    $('#endustriyel-hidden').val('');
  });

  $('.sub-terms').change(function() {
    var selected_term = this.id;
    var selected_term_group = $(this).attr('data-group');
    if (this.checked) {
      $('#'+selected_term_group+'-hidden').val($('#'+selected_term_group+'-hidden').val() + ',' + selected_term);
    } else {
      $('#'+selected_term_group+'-hidden').val($('#'+selected_term_group+'-hidden').val().replace(','+selected_term,''));
    }
  });

  $('.option-selector').click(function() {
      console.log($(this).id);
  });


  $('#proje-turu-button').click(function() {
    $('.option-table').hide();
    $('.clicked').removeClass('clicked');
    if ($(this).hasClass('clicked')) {
      $(this).removeClass('clicked');
      $('#proje-turu-table').hide();
    } else {
      $(this).addClass('clicked');
      $('#proje-turu-table').show();
    }
  });

  $('input#btn-apply').click(function() {
    $('.option-table').hide();
    $('.clicked').removeClass('clicked');
  });

  $('#proje-durumu-button').click(function() {
    $('.option-table').hide();
    $('.clicked').removeClass('clicked');
    if ($(this).hasClass('clicked')) {
      $(this).removeClass('clicked');
      $('#proje-durumu-table').hide();
    } else {
      $(this).addClass('clicked');
      $('#proje-durumu-table').show();
    }
  });

  $('#proje-location-button').click(function() {
    $('.option-table').hide();
    $('.clicked').removeClass('clicked');
    if ($(this).hasClass('clicked')) {
      $(this).removeClass('clicked');
      $('#proje-location-table').hide();
    } else {
      $(this).addClass('clicked');
      $('#proje-location-table').show();
    }
  });
  var table = $('#projects_table').DataTable({
    "searching": false,
    "lengthChange": false,
    "info":false,
    "pageLength":15,
    "order": [[2, 'desc']]
  });
 $('#projects_table').show();

  $('#yenile').click(function() {
    $('#projects_table').DataTable().destroy();
    $('#projects_table').DataTable({
      "searching": false,
      "lengthChange": false,
      "info":false,
      "pageLength":15,
      "order": [[2, 'desc']]
    }).draw();
  });

  $('#btn-all').click(function() {
    $('[data-group="su-enerji"]').prop('checked',true);
    $('[data-group="ust-yapi"]').prop('checked',true);
    $('[data-group="ulastirma"]').prop('checked',true);
    $('[data-group="endustriyel"]').prop('checked',true);
  });

  $('#btn-temizle').click(function() {
    $('[data-group="su-enerji"]').prop('checked',false);
    $('[data-group="ust-yapi"]').prop('checked',false);
    $('[data-group="ulastirma"]').prop('checked',false);
    $('[data-group="endustriyel"]').prop('checked',true);
  });


});

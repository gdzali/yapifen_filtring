$ = jQuery;

var mafs = $("#my-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function(e){
    e.preventDefault();

    if(mafsForm.find("#ust-yapi-hidden").val()) {
        var ust_yapi = mafsForm.find("#ust-yapi-hidden").val();
    }
    if(mafsForm.find("#ulastirma-hidden").val()) {
        var ulastirma = mafsForm.find("#ulastirma-hidden").val();
    }
    if(mafsForm.find("#su-enerji-hidden").val()) {
        var su_enerji = mafsForm.find("#su-enerji-hidden").val();
    }
    if(mafsForm.find("#endustriyel-hidden").val()) {
        var endustriyel = mafsForm.find("#endustriyel-hidden").val();
    }
    if(mafsForm.find("#proje_durum-hidden").val()) {
        var proje_durum = mafsForm.find("#proje_durum-hidden").val();
    }

    var data = {
        action : "my_ajax_filter_search",
        ust_yapi : ust_yapi,
        ulastirma : ulastirma,
        su_enerji : su_enerji,
        endustriyel:endustriyel,
        proje_durum:proje_durum
    }

    $.ajax({
            url : ajax_url,
            data : data,
            success : function(response) {
                $('#projects_table').DataTable().destroy();
                $(".data-area").empty();
                if(response) {
                    for(var i = 0 ;  i < response.length ; i++) {
                         var html  = '<tr>';
                             html  += '<td><a href="'+ response[i].permalink +'">'+ response[i].title +'</a></td>';
                             html  += '<td>'+ response[i].kategori +'</td>';
                             html  += '<td>'+ response[i].yil +'</td>';
                             html  += '<td>'+ response[i].konum +'</td>';
                             html  += '</tr>';
                             $(".data-area").append(html);

                    }
                    $('#projects_table').DataTable({
                      "searching": false,
                      "lengthChange": false,
                      "info":false,
                      "pageLength":15,
                      "order": [[2, 'desc']]
                    }).draw();
                } else {
                    var html  = "<p>Aramanıza eşleşen bir proje bulunamadı.</p>";
                    alert('html');
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }
        });

});

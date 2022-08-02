$ = jQuery;

var mafs = $("#my-ajax-filter-search");
var mafsForm = mafs.find("form");

mafsForm.submit(function(e){
    e.preventDefault();

    alert('ajax worked!')

    // if(mafsForm.find("#lokasyon :selected").val().length !== 0) {
    //     var lokasyon = mafsForm.find("#lokasyon :selected").val();
    // }

    var data = {
        action : "my_ajax_filter_search",
        lokasyon : lokasyon,
        ilan_tipi : ilan_tipi,
        tip : tip,
        oda : oda,
        alan : alan,
        isinma_tipi : isinma_tipi,
        bulundugu_kat : bulundugu_kat,
        bina_yasi : bina_yasi,
        totaldeki_kat_sayisi : totaldeki_kat_sayisi,
        esyali_durumu : esyali_durumu,
        yapi_durumu : yapi_durumu,
        oturma_durumu : oturma_durumu,
        site : site,
        garaj : garaj,
        bahce : bahce,

        // min_fiyat : min_fiyat,
        // max_fiyat : max_fiyat
    }

    $.ajax({
            url : ajax_url,
            data : data,
            success : function(response) {
                mafs.find(".row.ilanlar").empty();
                if(response) {
                    for(var i = 0 ;  i < response.length ; i++) {
                         var html  = '<div class="col-md-6 mb-6">';
                             html  += '<div class="card border-0 fadeInUp animated" data-animate="fadeInUp">';
                             html  += '<div class="position-relative hover-change-image bg-hover-overlay rounded-lg card-img">';
                             html  += '<img src="'+ response[i].poster +'" alt="'+ response[i].title +'">';
                             html  += '<div class="card-img-overlay d-flex flex-column">';
                             html  += '<div><span class="badge badge-primary">'+ response[i].ilan_tipi +'</span></div>';
                             html  += '</div></div>';
                             html  += '<div class="card-body pt-3 px-0 pb-1">';
                             html  += '<h2 class="fs-16 mb-1"><a href="'+ response[i].permalink +'" class="text-dark hover-primary">'+ response[i].title +'</a></h2>';
                             html  += '<p class="font-weight-500 text-gray-light mb-0"></p><p class="fs-17 font-weight-bold text-heading mb-0 lh-16">'+ response[i].fiyat +'</p></div>';
                             html  += '<div class="card-footer bg-transparent px-0 pb-0 pt-2">';
                             html  += '<ul class="list-inline mb-0"><li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7" data-toggle="tooltip" title="" data-original-title="'+ response[i].oda  +'">';
                             html  += '<svg class="icon icon-bedroom fs-18 text-primary mr-1"><use xlink:href="#icon-bedroom"></use></svg> 1+1 </li><li class="list-inline-item text-gray font-weight-500 fs-13 mr-sm-7" data-toggle="tooltip" title="" data-original-title=" Banyo">';
                             html  += '<svg class="icon icon-shower fs-18 text-primary mr-1"><use xlink:href="#icon-shower"></use></svg> </li><li class="list-inline-item text-gray font-weight-500 fs-13" data-toggle="tooltip" title="" data-original-title="Alan">';
                             html  += '<svg class="icon icon-square fs-18 text-primary mr-1"><use xlink:href="#icon-square"></use></svg> '+ response[i].alan +' </li></ul>';
                             html  += '</div></div></div>';
                             mafs.find(".row.ilanlar").append(html);
                    }
                    $('.portfoy-sayisi').html(i);
                    $('#lokasyon').prop('selectedIndex',0);
                    $('#ilan_tipi').prop('selectedIndex',0);
                    $('#konut').prop('selectedIndex',0);
                    $('#oda').prop('selectedIndex',0);
                    $('#alan').prop('selectedIndex',0);
                    $('#isinma_tipi').prop('selectedIndex',0);
                    $('#bulundugu_kat').prop('selectedIndex',0);
                    $('#bina_yasi').prop('selectedIndex',0);
                    $('#totaldeki_kat_sayisi').prop('selectedIndex',0);
                    $('#esyali_durumu').prop('selectedIndex',0);
                    $('#yapi_durumu').prop('selectedIndex',0);
                    $('#oturma_durumu').prop('selectedIndex',0);
                    $('#site').prop('selectedIndex',0);
                    $('#garaj').prop('selectedIndex',0);
                    $('#bahce').prop('selectedIndex',0);

                } else {
                    var html  = "<p>Aramanıza eşleşen bir ilan bulunamadı.</p>";
                    mafs.find(".row.ilanlar").append(html);
                }
            }
        });

// we will add codes above this line later
});

//Onload

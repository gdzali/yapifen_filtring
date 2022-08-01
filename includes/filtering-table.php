<section id="filter-section">
  <div class="container">
    <div class="row" class="filtering-area">
      <div class="col-12 col-xl-4">
        <span class="yapifen-filter-title">Filtreleme</span>
      </div>
      <div class="col-12 col-xl-4" style="padding-top: 7px;" >
        <a class="yapifen-filter-title option-selector" id="proje-turu-button">Proje Türü</a>
      </div>
      <div class="col-12 col-xl-4" style="padding-top: 7px;" >
        <a class="yapifen-filter-title option-selector" id="proje-durumu-button">Proje Durumu</a>
      </div>
      <?= do_shortcode('[my_ajax_filter_search]'); ?>
    </div>
    <div class="row" id="table-area">
      <table id="projects_table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Proje Başlığı</th>
                <th>Kategori</th>
                <th>Yıl</th>
                <th>Konum</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>A</td>
                <td>A</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td>B</td>
                <td>B</td>
                <td>2</td>
                <td>2</td>
            </tr>
        </tbody>
    </table>
    </div>
  </div>
</section>

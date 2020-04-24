<?php $this->load->view('admin/template_admin/header'); ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php $this->load->view('admin/template_admin/sidebar'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content"> 

        <!-- Topbar -->
        <?php $this->load->view('admin/template_admin/navbar'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <!-- Content Row -->

          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                    </button>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Invoice</th>
                            <th>Pelanggan</th>
                            <th>Tanggal</th>
                            <!-- <th>Batas Waktu</th>
                            <th>Tanggal Bayar</th> -->
                            <th>Status</th>
                            <th>Status Pembayaran</th>
                            <th>Harga</th>
                            <th>Setting</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $no=1; foreach($transaksi as $t):?>
                          <tr>
                          <td><?=$no++;?></td>
                          <td><?=$t->kode_invoice?></td>
                          <td><?=$t->pelanggan?></td>
                          <td><?=date('d-m-Y', strtotime($t->tgl))?></td>
                          <!-- <td><?=date('d-m-Y', strtotime($t->batas_waktu))?></td> -->
                          <!-- <td>
                          <?php if($t->tgl_bayar != "0000-00-00 00:00:00"):?>
                          <?=date('d-m-Y', strtotime($t->tgl_bayar))?>
                          <?php endif;?>
                          </td> -->
                          <td><?=$t->status?></td>
                          <td><?=$t->dibayar?></td>
                          <td><?="Rp " . number_format($t->total_harga,2,',','.')?></td>
                          <td>
                            <button type='button' class='btn btn-warning btn-sm mb-3' data-toggle='modal' data-target='#detailTransaksi<?=$t->id_transaksi?>'>Detail</button>
                            <button type='button' class='btn btn-warning btn-sm mb-3' data-toggle='modal' data-target='#editTransaksi<?=$t->id_transaksi?>'><i class='fas fa-pencil-alt'></i></button>
                            <button type='button' class='btn btn-danger btn-sm mb-3' data-toggle='modal' data-target='#hapusTransaksi<?=$t->id_transaksi?>'><i class='fas fa-trash-alt'></i></button>
                          </td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>  
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php $this->load->view('admin/transaksi/tambah'); ?>
  <?php $this->load->view('admin/transaksi/edit'); ?>
  <?php $this->load->view('admin/transaksi/detail'); ?>

  <?php $this->load->view('admin/template_admin/footer'); ?>

<script type="text/javascript">
    get_transaksi();
    function get_transaksi(){
        $.ajax({
            url: "<?=base_url('admin/data_transaksi')?>",
            success: function(data){
            var data = JSON.parse(data);
            // console.log(data);
            var i;
            var html = "";
            for(i=0; i<data.length; i++){
                var tanggal_bayar = "";
                if(data[i].tgl_bayar !== "0000-00-00 00:00:00"){
                tanggal_bayar = format_tanggal(data[i].tgl_bayar);
                }
                var nomor = i+1;
                    html += "<tr>";
                    html += "<td class'text-center'>"+nomor+"</td>";
                    html += "<td class'text-center'>"+data[i].kode_invoice+"</td>";
                    html += "<td class'text-center'>"+data[i].pelanggan+"</td>";
                    html += "<td class'text-center'>"+format_tanggal(data[i].tgl)+"</td>";
                    html += "<td class'text-center'>"+format_tanggal(data[i].batas_waktu)+"</td>";
                    html += "<td class'text-center'>"+tanggal_bayar+"</td>";
                    html += "<td class'text-center'>"+data[i].biaya_tambahan+"</td>";
                    html += "<td class'text-center'>"+data[i].diskon+"</td>";
                    html += "<td class'text-center'>"+data[i].status+"</td>";
                    html += "<td class'text-center'>"+data[i].dibayar+"</td>";
                    html += "<td class'text-center'>"+formatRupiah(data[i].total_harga, 'Rp. ')+"</td>";
                    html += "<td class'text-center'><a class='btn btn-success btn-sm text-white'>Detail</a></td>";
                    html += "</tr>";
            }
            $('#tampil_transaksi').html(html);
            }
        });
    }

    function format_tanggal(data_tanggal){
        var hari = ['Minggu','Senin','Selasa','Rabu','Kamis','Jum&#39;at','Sabtu'];
        var bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
        var tanggal = new Date(data_tanggal).getDate();
        var _hari = new Date(data_tanggal).getDay();
        var _bulan = new Date(data_tanggal).getMonth();
        var _tahun = new Date(data_tanggal).getYear();
        var hari = hari[_hari];
        var bulan = bulan[_bulan];
        var tahun = (_tahun < 1000) ? _tahun + 1900 : _tahun;

        return hari+' '+tanggal+' '+bulan+' '+tahun;
        // console.log(hari+' '+tanggal+' '+bulan+' '+tahun);
    }

    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    $('#penjual').change(function(){
        var id_user = $(this).val();
        console.log(id_user);
          $.ajax({
          type: 'post',
          // dataType: 'json',
          url: '<?=base_url('admin/paket')?>',
          data: {
              "id_user":id_user
          },
          success: function(response){
              var hasil = JSON.parse(response);
              var html = "<option selected disabled>Pilih Produk</option>";
              // var hasil = JSON.stringify(response);
              console.log(hasil);
              for(i=0; i<hasil.length; i++){
              // console.log(hasil[i].jenis);
                  html += "<option value='"+hasil[i].id_paket+"'>"+hasil[i].jenis+"</option>";
              }
              $('.tampil_jenis').html(html);
          }
      });
    });

    $(".tombol-simpan-transaksi").click(function(){
        var data = $('.form-transaksi').serialize();
        var pelanggan   = $('#pelanggan').val();
        var penjual     = $('#penjual').val();
        var batas_waktu = $('#batas_waktu').val();
        var qty         = $('#qty').val();
        var id_paket    = $('#id_paket').val();
        // console.log(id_paket);
        
        if(pelanggan === ""){
        alertify.error('Pelanggan Tidak boleh kosong');
        }else if(penjual === null){
        alertify.error('Penjual Tidak boleh kosong');
        }else if(id_paket === null){
        alertify.error('Jenis Produk Tidak boleh kosong');
        }else if(batas_waktu === ""){
        alertify.error('Batas Waktu Tidak boleh kosong');
        }else if(qty === ""){
        alertify.error('Jumlah Paket Tidak boleh kosong');
        }else{
        console.log(data);
        $.ajax({
            type: 'POST',
            url : '<?=base_url('admin/tambah_transaksi')?>',
            data: data,
            success: function(){
                // get_transaksi();
                location.reload();
            }
        });
        }
    });
</script>

<?php foreach($transaksi as $tr):?>
<script type="text/javascript">
$('#penjual<?=$tr->id_transaksi?>').change(function(){
    var id_user = $(this).val();
    console.log('<?=$tr->id_transaksi?>');
      $.ajax({
      type: 'post',
      dataType: 'json',
      url: '<?=base_url('admin/data_paket')?>',
      data: {
          "id_user":id_user
      },
      success: function(hasil){
          // var hasil = JSON.parse(response);
          var html = "<option selected disabled>Pilih Produk</option>";
          // var hasil = JSON.stringify(response);
          // console.log(hasil[0]['id_paket']);
          for(i=0; i<hasil.length; i++){
          // console.log(hasil[i]['jenis']);
              html += "<option value='"+hasil[i]['id_paket']+"'>"+hasil[i]['jenis']+"</option>";
          }
          $('.tampil_jenis<?=$tr->id_transaksi?>').html(html);
      }
  });
});
</script>
<?php endforeach;?>
<script type="text/javascript">
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
</script>
</body>

</html>

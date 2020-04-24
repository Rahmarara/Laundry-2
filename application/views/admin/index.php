<?php $this->load->view('admin/template/sidebar');?>

<?php $data_profile = $this->session->userdata('cek_login'); ?>
  <div class="container-fluid">
    <div class="row justify-content-center mt-4">
      <!-- <p class="text-center">Hai <?=$data_profile['username']?> Selamat Datang di halaman admin</p> -->
      <?php $this->load->view('admin/transaksi/index'); ?>
      <?php $this->load->view('admin/pengguna/index'); ?>
      <?php $this->load->view('admin/pelanggan/index'); ?>
      <?php $this->load->view('admin/produk/index'); ?>
      <?php $this->load->view('admin/outlet/index'); ?>
    </div>
  </div>

<?php $this->load->view('admin/template/footer'); ?>

<script type="text/javascript">
  get_pengguna();
  get_transaksi();
  get_outlet();
  get_paket();
  get_pelanggan();
  
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

  function get_outlet(){
    $.ajax({
      url: "<?=base_url('admin/data_outlet')?>",
      success: function(data){
        var data = JSON.parse(data);
        // console.log(data);
        var i;
        var html = "";
        for(i=0; i<data.length; i++){
          var nomor = i+1;
              html += "<tr>";
              html += "<td class'text-center'>"+nomor+"</td>";
              html += "<td class'text-center'>"+data[i].nama_outlet+"</td>";
              html += "<td class'text-center'>"+data[i].alamat_outlet+"</td>";
              html += "<td class'text-center'>"+data[i].tlp+"</td>";
              html += "<td class'text-center'><a class='btn btn-success btn-sm text-white'>Edit</a></td>";
              html += "</tr>";
        }
        $('#tampil_outlet').html(html);
      }
    });
  }

  function get_paket(){
    $.ajax({
      url: "<?=base_url('admin/data_paket')?>",
      success: function(data){
        var data = JSON.parse(data);
        // console.log(data);
        var i;
        var html = "";
        for(i=0; i<data.length; i++){
          var nomor = i+1;
              html += "<tr>";
              html += "<td class'text-center'>"+nomor+"</td>";
              html += "<td class'text-center'>"+data[i].jenis+"</td>";
              html += "<td class'text-center'>"+data[i].nama_paket+"</td>";
              html += "<td class'text-center'>"+data[i].nama_outlet+"</td>";
              html += "<td class'text-center'>"+data[i].harga+"</td>";
              html += "<td class'text-center'><a class='btn btn-success btn-sm text-white'>Edit</a></td>";
              html += "</tr>";
        }
        $('#tampil_paket').html(html);
      }
    });
  }

  function get_pengguna(){
    $.ajax({
      url: "<?=base_url('admin/data_pengguna')?>",
      success: function(data){
        var data = JSON.parse(data);
        // console.log(data);
        var i;
        var html = "";
        for(i=0; i<data.length; i++){
          var nomor = i+1;
              html += "<tr>";
              html += "<td class'text-center'>"+nomor+"</td>";
              html += "<td class'text-center'>"+data[i].nama_user+"</td>";
              html += "<td class'text-center'>"+data[i].username+"</td>";
              html += "<td class'text-center'>"+data[i].level+"</td>";
              html += "<td class'text-center'>"+data[i].outlet+"</td>";
              html += "<td class'text-center'><a class='btn btn-success btn-sm text-white'>Edit</a></td>";
              html += "</tr>";
        }
        $('#tampil_pengguna').html(html);
      }
    });
  }

  $(".tombol-simpan-pengguna").click(function(){
    var data = $('.form-pengguna').serialize();
    var id_outlet   = $('#outlet').val();
    var nama_user     = $('#nama_user').val();
    var username = $('#username').val();
    var password         = $('#password').val();
    var level    = $('#level').val();
    // console.log(id_paket);
    
    if(id_outlet === null){
      alertify.error('Outlet Tidak boleh kosong');
    }else if(nama_user === ""){
      alertify.error('Nama Tidak boleh kosong');
    }else if(username === ""){
      alertify.error('Username Tidak boleh kosong');
    }else if(password === ""){
      alertify.error('Password Tidak boleh kosong');
    }else if(level === null){
      alertify.error('Level Tidak boleh kosong');
    }else{
      // console.log(data);
      $.ajax({
          type: 'POST',
          url : '<?=base_url('admin/tambah_pengguna')?>',
          data: data,
          success: function(){
            get_pengguna();
          }
      });
    }
  });

  function get_pelanggan(){
    $.ajax({
      url: "<?=base_url('admin/data_pelanggan')?>",
      success: function(data){
        var data = JSON.parse(data);
        // console.log(data);
        var i;
        var html = "";
        for(i=0; i<data.length; i++){
          if(data[i].jk === "L"){
            var jenis_kelamin = "Laki-laki";
          }else{
            var jenis_kelamin = "Perempuan";
          }

          var nomor = i+1;
              html += "<tr>";
              html += "<td class'text-center'>"+nomor+"</td>";
              html += "<td class'text-center'>"+data[i].nama+"</td>";
              html += "<td class'text-center'>"+data[i].alamat+"</td>";
              html += "<td class'text-center'>"+data[i].no_hp+"</td>";
              html += "<td class'text-center'>"+jenis_kelamin+"</td>";
              html += "<td class'text-center'>"+data[i].outlet+"</td>";
              html += "<td class'text-center'><a class='btn btn-success btn-sm text-white'>Edit</a></td>";
              html += "</tr>";
        }
        $('#tampil_pelanggan').html(html);
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
            get_transaksi();
          }
      });
    }
  });

  

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
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table1').DataTable();
    $('#table2').DataTable();
    $('#table-outlet').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        // columnDefs: [
        //     { width: '12%', targets: 6 }
        // ],
        fixedColumns: true
    });
    $('#table-paket').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        // columnDefs: [
        //     { width: '12%', targets: 6 }
        // ],
        fixedColumns: true
    });
    $('#table-pengguna').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        // columnDefs: [
        //     { width: '12%', targets: 6 }
        // ],
        fixedColumns: true
    });
} );
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table-pelanggan').DataTable({
      scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
    });
} );
</script>
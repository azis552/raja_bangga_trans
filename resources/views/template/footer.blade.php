<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('') }}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('') }}plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('') }}plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('') }}plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('') }}plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>

</html>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
{{-- crud user --}}
<script>
    $(document).ready(function() {
        $('#tambah_petugas').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var namaLengkap = $('#name').val();
            var email = $('#exampleInputEmail1').val();
            var password = $('#exampleInputPassword1').val();
            var hakAkses = $('select[name="akses"]').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('petugas.store') }}", // Ganti dengan URL yang sesuai
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    nama_lengkap: namaLengkap,
                    email: email,
                    password: password,
                    hak_akses: hakAkses
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('petugas.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });

        $('#edit_petugas').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var namaLengkap = $('#name').val();
            var email = $('#exampleInputEmail1').val();
            var password = $('#exampleInputPassword1').val();
            var hakAkses = $('select[name="akses"]').val();
            var id = $('input[name="id"]').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('petugas.update', ':id') }}".replace(':id', id),
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    nama_lengkap: namaLengkap,
                    email: email,
                    password: password,
                    hak_akses: hakAkses
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('petugas.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
        $('.delete_petugas').click(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form
            var id = $(this).data('id');
            var csrf = '{{ csrf_token() }}';

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('petugas.destroy', ':id') }}".replace(':id', id),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf // Mengirim CSRF Token dalam header
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    location.reload();
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
    });
</script>
{{-- end crud user --}}

{{-- crud wilayah --}}
<script>
    $(document).ready(function() {
        $('#tambah_wilayah').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var kodewilayah = $('#kode_wilayah').val();
            var namawilayah = $('#nama_wilayah').val();
            var estimasi = $('#estimasi').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('wilayah.store') }}", // Ganti dengan URL yang sesuai
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    id_wilayah: kodewilayah,
                    nama_wilayah: namawilayah,
                    estimasi: estimasi
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('wilayah.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });

        $('#edit_wilayah').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var kodewilayah = $('#kode_wilayah').val();
            var namawilayah = $('#nama_wilayah').val();
            var estimasi = $('#estimasi').val();
            var id = $('input[name="id"]').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('wilayah.update', ':id') }}".replace(':id', id),
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    id_wilayah: kodewilayah,
                    nama_wilayah: namawilayah,
                    estimasi: estimasi
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('wilayah.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
        $('.delete_wilayah').click(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form
            var id = $(this).data('id');
            var csrf = '{{ csrf_token() }}';

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('wilayah.destroy', ':id') }}".replace(':id', id),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf // Mengirim CSRF Token dalam header
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    location.reload();
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
    });
</script>
{{-- end crud wilayah --}}

{{-- crud harga --}}
<script>
    $(document).ready(function() {
        $('#tambah_harga').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var harga = $('#harga').val();
            var id_wilayah = $('select[name="id_wilayah"]').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('harga.store') }}", // Ganti dengan URL yang sesuai
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    id_wilayah: id_wilayah,
                    harga: harga
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('harga.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });

        $('#edit_harga').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var harga = $('#harga').val();
            var id_wilayah = $('select[name="id_wilayah"]').val();
            var id = $('input[name="id"]').val();
            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('harga.update', ':id') }}".replace(':id', id),
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    id_wilayah: id_wilayah,
                    harga: harga
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('harga.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
        $('.delete_harga').click(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form
            var id = $(this).data('id');
            var csrf = '{{ csrf_token() }}';

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('harga.destroy', ':id') }}".replace(':id', id),
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrf // Mengirim CSRF Token dalam header
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    location.reload();
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
    });
</script>
{{-- end crud harga --}}

{{-- cek harga --}}
<script>
    $(document).ready(function() {
        $('#cek_harga').click(function() {
            var kabupaten = $('#kabupaten').val();
            var berat = $('#berat_barang').val();
            var csrf = '{{ csrf_token() }}';
                // Lakukan permintaan AJAX ke backend untuk mendapatkan harga
                $.ajax({
                    url: "{{ route('pengiriman.cek_harga') }}", // Ganti URL ini dengan endpoint yang sesuai di backend Laravel kamu
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': csrf // Mengirim CSRF Token dalam header
                    },  
                    data: {
                        kabupaten: kabupaten,
                        berat: berat
                    },
                    success: function(response) {
                        console.log(response.harga);
                        // Tampilkan harga total di input harga_total
                        $('#total_harga').val(response.harga);
                        $('#estimasi').val(response.estimasi)
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
        });
        $('#tambah_pengiriman').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var resi = $('#resi').val();
            var nama_barang = $('#nama_barang').val();
            var berat = $('#berat_barang').val();
            var harga = $('#harga').val();
            var nama_pengirim = $('#nama_pengirim').val();
            var telepon_pengirim = $('#telepon_pengirim').val();
            var alamat_pengirim = $('#alamat_pengirim').val();
            var nama_penerima = $('#nama_penerima').val();
            var telepon_penerima = $('#telepon_penerima').val();
            var alamat_penerima = $('#alamat_penerima').val();
            var estimasi = $('#estimasi').val();
            var total_harga = $('#total_harga').val();
            var kabupaten = $('select[name="kabupaten"]').val();
            var kurir = $('select[name="kurir"]').val();
            var admin = {{ Auth::user()->id }};
            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('pengiriman.store') }}", // Ganti dengan URL yang sesuai
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    nama_barang : nama_barang,
                    berat_barang : berat,

                    id_kurir : kurir,
                    resi : resi,
                    id_wilayah : kabupaten,
                    id_admin : admin,
                    nama_pengirim : nama_pengirim,
                    tlpn_pengirim : telepon_pengirim,
                    alamat_pengirim : alamat_pengirim,
                    nama_penerima : nama_penerima,
                    tlpn_penerima : telepon_penerima,
                    alamat_penerima : alamat_penerima,
                    total_bayar : total_harga,

                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('pengiriman.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
        $('#edit_pengiriman').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var resi = $('#resi').val();
            var nama_barang = $('#nama_barang').val();
            var berat = $('#berat_barang').val();
            var harga = $('#harga').val();
            var nama_pengirim = $('#nama_pengirim').val();
            var telepon_pengirim = $('#telepon_pengirim').val();
            var alamat_pengirim = $('#alamat_pengirim').val();
            var nama_penerima = $('#nama_penerima').val();
            var telepon_penerima = $('#telepon_penerima').val();
            var alamat_penerima = $('#alamat_penerima').val();
            var estimasi = $('#estimasi').val();
            var total_harga = $('#total_harga').val();
            var kabupaten = $('select[name="kabupaten"]').val();
            var kurir = $('select[name="kurir"]').val();
            var admin = {{ Auth::user()->id }};
            var id_barang = $('#id_barang').val();
            var id = $('#id_pengiriman').val();
            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('pengiriman.update', ':id') }}".replace(':id', id),
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    id_barang : id_barang,
                    nama_barang : nama_barang,
                    berat_barang : berat,
                    id_kurir : kurir,
                    resi : resi,
                    id_wilayah : kabupaten,
                    id_admin : admin,
                    nama_pengirim : nama_pengirim,
                    tlpn_pengirim : telepon_pengirim,
                    alamat_pengirim : alamat_pengirim,
                    nama_penerima : nama_penerima,
                    tlpn_penerima : telepon_penerima,
                    alamat_penerima : alamat_penerima,
                    total_bayar : total_harga,
                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('pengiriman.index') }}";
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });

        $('#tambah_status').submit(function(e) {
            e.preventDefault(); // Menghentikan aksi default submit form

            // Mengambil CSRF Token dari form
            var csrfToken = $('input[name="_token"]').val();

            // Mengambil data dari form
            var id_pengiriman = $('#id').val();
            var status = $('#status').val();
            var tanggal = $('#tanggal').val();

            // Mengirim data form ke server menggunakan AJAX
            $.ajax({
                url: "{{ route('track.store')}}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Mengirim CSRF Token dalam header
                },
                data: {
                    status : status,
                    tanggal : tanggal,
                    id_pengiriman : id_pengiriman

                },
                success: function(response) {
                    // Handle response dari server
                    console.log(response);
                    window.location.href = "{{ route('track.index',':id') }}".replace(':id', id_pengiriman);
                    // Misalnya, tampilkan pesan sukses atau reset form
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr
                    .responseText; // Mendapatkan pesan error dari respons
                    // Menampilkan pesan error menggunakan alert Bootstrap
                    $('#error-message').text(errorMessage);
                    $('.alert').show();

                }
            });
        });
    });
</script>
{{-- end cek harga --}}

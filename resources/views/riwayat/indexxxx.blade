@extends('layouts.app')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Riwayat Pendaftaran</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="statistics-card">
            </section>
            <!-- Data list view starts -->
            <section id="data-list-view" class="data-list-view-header">
                <!-- DataTable starts -->
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-center fw-bold">
                                <h6 class="justify-content-sm-between my-1" for="">filter Dokter</h6>
                            </div>
                            <div class="col-md-3">
                                <select class="filter-dokter form-control filter" id="filter-dokter" name="">
                                    <option value=""></option>
                                    @foreach ($dokter as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama_dokter }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-center fw-bold">
                                <h6 class="justify-content-sm-between my-1" for="">filter Jam Periksa</h6>
                            </div>
                            <div class="col-md-3">
                                <select class="filter-dokter form-control filter" id="filter-jam" name="">
                                    <option value=""></option>
                                    @foreach ($jampraktek as $data)
                                    <option value="{{ $data->id }}">{{ $data->jam_praktek }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table zero-configuration text-center" id="datatablependaftaran">
                        <thead>
                            <tr class="">
                                <th></th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Jam Periksa</th>
                                <th>Shiff</th>
                                <th>BPJS/Non-BPJS</th>
                                <th>Nomor Antrian</th>
                                <th>Status</th>
                                <th>Jam Diperiksa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- DataTable ends -->
                <!-- add new sidebar starts -->

                <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="row"></div>
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul">Edit Data Riwayat Pendaftaran</h5>
                                <div class="row">
                                    <button type="button" id="tutup" class="close" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true" id="tutup">&times;</span></button>
                                </div>
                            </div>
                            <div class="modal-body" id="modal-body">
                                <form action="" method="post" id="formpendaftaran" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 data-field-col">
                                        <label for="data-name">Status</label>
                                        <input type="text" class="form-control" id="status" name="status">
                                        <input type="hidden" id="id" name="id">
                                    </div>

                                    <div class="modal-footer">
                                        <div class="add-data-footer d-flex justify-content-around pl-5 mt-2">
                                            <div class="add-data-btn px-1">
                                                <button class="btn btn-primary" type="submit"
                                                    id="simpan">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- add new sidebar ends -->
            </section>
            <!-- Data list view end -->
        </div>
    </div>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

<script type="text/javascript">
    $('.datepicker').datepicker({
        // format: "dd/mm/yyyy",
        format: "yyyy/mm/dd",
    })
</script>
<script>
    $(document).ready(function(){
        $(".select-name").select2({
            // dropdownParent: $('#formpendaftaran'),
            width: "100%",
            tags: true,
            // allowClear: true,
        });
    });

    $(document).ready(function(){
      $(".select-dokter").select2({
        // dropdownParent: $('#exampleModal'),
        width: "100%",
        tags: true,
      });
    });
    $(document).ready(function(){
      $(".select-jam").select2({
        // dropdownParent: $('#exampleModal'),
        width: "100%",
        tags: true,
      });
    });
    $(document).ready(function(){
      $(".filter-dokter").select2({
        width: "100%",
        tags: true,
      });
    });

</script>

<script>
    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    // Data Table
        let fildok = $("#filter-dokter").val()
        let filjam = $("#filter-jam").val()
        const tabel = $('#datatablependaftaran').DataTable({
            serverSide : true,
            responsive : true,
            // processing: true,
            ajax : {
                url : "{{route('periksa.index')}}",
                data: function(d){
                    d.fildok = fildok;
                    d.filjam = filjam;
                    return d
                }
            },
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'user_id', name: 'user_id'},
                    {data: 'dokter_id', name: 'dokter_id'},
                    {data: 'tanggal_pendaftaran', name: 'tanggal_pendaftaran'},
                    {data: 'jam_praktek_id', name: 'jam_praktek_id'},
                    {data: 'shiff', name: 'shiff'},
                    {data: 'transaksi', name: 'transaksi'},
                    {data: 'antrian', name: 'antrian'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'aksi', name: 'aksi'}
                ],

                // order: [[0, 'desc']]
        });

        $(document).on('click', '.edit', function (e) {
        e.preventDefault(); 
        $('#exampleModal').modal('show')
        // $('#modal-judul').html("Edit Data Petugas"); // Judul
        // $('#tutup').trigger("reset");
            $.ajax({
                url : 'periksa/' + id + '/edit',
                type : 'get',
                data : {
                    id : id,
                    _token : "{{csrf_token()}}"
                },
                success: function (data) {
                    console.log(data)
                    $('#id').val(data.id)
                    $('#status').val(data.status)
                    $('#tutup').trigger("reset");
                }
            })
        });

    // Tambah Data
    // $('#formpendaftaran').submit(function (e) {
    //         e.preventDefault();
    //             var formData = new FormData(this);

    //             $.ajax({
    //             url : "{{route('pendaftaran.store')}}",
    //             type : "post",
    //             data: formData,
    //             // cache:false,
    //             contentType: false,
    //             dataType:'json',
    //             processData: false,
    //             success: function(response) {
    //                 // console.log(response);
    //                     Swal.fire(
    //                         'Added!',
    //                         'Pendafataran Added Successfully!',
    //                         'success'
    //                         ),
    //                 // $('#tutup').click()
    //                 $('#user_id').val(null).trigger('change');
    //                 $('#dokter_id').val(null).trigger('change');
    //                 $('#jam_praktek_id').val(null).trigger('change');
    //                 $('#formpendaftaran')[0].reset();
    //                 $('#tutup').trigger("reset"); //form reset
    //                 $('#exampleModal').modal('hide'); //modal hide
    //                 $('#exampleModal').trigger("reset"); //modal hide
    //                 $('#datatablependaftaran').DataTable().ajax.reload()
    //             },
    //             error : function (xhr) {
    //                 // console.log('gagal');
    //                 toastr.error(xhr.responseJSON.text, "GAGAL")
    //             }
    //         })
    //     });

    //     $(document).on('click', '.periksa', function (e) {
    //     e.preventDefault();
    //     var antrian = $(this).data('antrian');
    //         $.ajax({
    //             url : "{{route('periksa.store')}}",
    //             type : 'post',
    //             data : {
    //                 'antrian' : antrian,
    //                 _token : "{{csrf_token()}}"
    //             },
    //             success: function (data) {
    //                 var filteredData = tabel
    //                     .rows()
    //                     .indexes()
    //                     .filter( function ( value, index ) {
    //                         return tabel.row(value).data()['antrian'] == antrian;
    //                     } );
    //                 tabel.rows( filteredData )
    //                     .remove()
    //                     .draw();
    //             }
    //         })
    //     });


    // $(".filter").on('change', function(){
    //     fildok =  $("#filter-dokter").val()
    //     tabel.ajax.reload(null,false)
    //     // console.log([fildok]);
    // });

    $(".filter").on('change', function(){
        filjam =  $("#filter-jam").val()
        tabel.ajax.reload(null,false)
    })

















    // $(document).on('click', '.edit', function (e) {
    //     e.preventDefault();
    //     $('#exampleModal').modal('show')
    //     let id = $(this).attr('id')
    //     $('#modal-judul').html("Edit Data Petugas"); // Judul
    //     $('#tutup').trigger("reset");

    //     var SITEURL = '{{URL::to('')}}';
    //         $.ajax({
    //             url : 'pasien/' + id + '/edit',
    //             type : 'get',
    //             data : {
    //                 id : id,
    //                 _token : "{{csrf_token()}}"
    //             },
    //             success: function (data) {
    //                 console.log(data)
    //                 $('#id').val(data.id)
    //                 $('#name').val(data.name)
    //                 $('#email').val(data.email)
    //                 $('#password').val(data.password)
    //                 $('#password_confirmation').val(data.password_confirmation)
    //                 $('#alamat').val(data.alamat)
    //                 $('#jenis_kelamin').val(data.jenis_kelamin)
    //                 $('#no_tlp').val(data.no_tlp)
    //                 // $("#photoProfile").html(`<img src="/public/files/${data.photoProfile}" width="100" class="img-fluid img-thumbnail">`);
    //                 $('#modal-preview').attr('alt', 'No image available');
    //                 if(data.photoProfile){
    //                 $('#modal-preview').attr('src', SITEURL +'/public/files/'+data.photoProfile);
    //                 $('#hidden_image').attr('src', SITEURL +'/public/files/'+data.photoProfile);
    //                 }
    //                 $('#tutup').trigger("reset");
    //             }
    //         })
    //     });

    // // Hapus
    // $(document).on('click', '.hapus', function () {
    //         id = $(this).attr('id');
    //         Swal.fire({
    //         title: 'Are you sure?',
    //         text: "You won't be able to revert this!",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, delete it!'
    //         }).then((result) => {
    //             if(result.isConfirmed){
    //                 $.ajax({
    //                 url: "pasien/" + id, //eksekusi ajax ke url ini
    //                 type: 'delete',
    //                 data: {
    //                     id: id,
    //                     "_token" : "{{csrf_token()}}"
    //                 },
    //                 success: function (data) { //jika sukses
    //                     Swal.fire(
    //                     'Deleted!',
    //                     'Your file has been deleted.',
    //                     'success'
    //                     )
    //                     $('#datatablepasien').DataTable().ajax.reload()
    //                 }

    //                 })
    //             }
    //         })

    //     });

    //     function readURL(input, id) {
    //     id = id || '#modal-preview';
    //     if (input.files && input.files[0]) {
    //     var reader = new FileReader();
    //     reader.onload = function (e) {
    //     $(id).attr('src', e.target.result);
    //     };
    //     reader.readAsDataURL(input.files[0]);
    //     $('#modal-preview').removeClass('hidden');
    //         $('#start').hide();
    //         }
    //     }
</script>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    window.Echo.channel('private-broadcast')
        .listen('.no-antrian', (res) => {
            res['data'].forEach(item =>{
                $('#no-'+item['dokter_id']).html(item['antrian']);
            });
        });

</script>

<script>
    $(document).ready(function(){
        $(".btn-next").click(function(){
            var id = $(this).data('id');
            var antrian = $('#no-'+id).html();
            if(antrian !== '---'){
                $.ajax({
                    url : "{{route('periksa.store')}}",
                    type : 'post',
                    data : {
                        'antrian' : antrian,
                        _token : "{{csrf_token()}}"
                    },
                    success: function (data) {
                        var filteredData = tabel
                            .rows()
                            .indexes()
                            .filter( function ( value, index ) {
                                return tabel.row(value).data()['antrian'] == antrian;
                            } );
                        tabel.rows( filteredData )
                            .remove()
                            .draw();
                    }
                })
            }
        });
    });
</script>
@endpush

@endsection
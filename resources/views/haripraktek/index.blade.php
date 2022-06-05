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
                        <h2 class="content-header-title float-left mb-0">Data Hari Praktek Dokter</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <section id="data-list-view" class="data-list-view-header">
                <!-- DataTable starts -->
                <div class="table-responsive">
                    <button type="button" class="btn btn-outline-primary feather icon-plus" data-bs-toggle="modal"
                        id="tambah" data-bs-target="#exampleModal">
                        Tambah Data
                    </button>
                    <table class="table zero-configuration text-center" id="datatablehari">
                        <thead>
                            <tr class="">
                                <th></th>
                                <th>Nama Dokter</th>
                                <th>Hari Praktek Dokter</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- DataTable ends -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul">Tambah Data Hari Praktek Baru</h5>
                                <button type="button" id="tutup" class="close" data-bs-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true" id="tutup">&times;</span>
                                </button>
                            </div>
                            <form action="" method="POST" id="formhari" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="col-sm-12 data-field-col">
                                        <label for="data-status">Nama Dokter</label>
                                        <input type="hidden" id="id" name="id">
                                        <select class="form-control" id="dokter_id" name="dokter_id">
                                            <option value=""></option>
                                            @foreach ($dokter as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama_dokter }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 data-field-col">
                                        <label for="data-name">Hari Praktek Dokter</label>
                                        <select class="form-control select" id="hari_praktek" name="hari_praktek[]"
                                            multiple="multiple">
                                            <option value="">Pilih Hari</option>
                                            <option value="senin">Senin</option>
                                            <option value="selasa">Selasa</option>
                                            <option value="rabu">Rabu</option>
                                            <option value="kamis">Kamis</option>
                                            <option value="jumat">Jumat</option>
                                            <option value="saptu">Saptu</option>
                                            <option value="minggu">Minggu</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" id="hari_praktek"
                                            name="hari_praktek" placeholder="Masukkan Hari Praktek Dokter"> --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                        <div class="add-data-btn px-1">
                                            <button class="btn btn-primary" type="submit" id="simpan">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.16/dist/sweetalert2.all.min.jss'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
      $(".select").select2({
        placeholder: "Pilih Hari Praktek Dokter",
        tags: true,
        tokenSeparators: ["/", ",", ";", " "],
        width: "100%"
      });
    });

    $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    });

    $('#datatablehari').DataTable({
           
            serverSide : true,
            responsive : true,
            processing: true,
           ajax : {
               url : "{{route('haripraktek.index')}}"
           },
           columns:[
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'dokter_id', name: 'dokter_id'},
                {data: 'hari_praktek', name: 'hari_praktek'},
                {data: 'aksi', name: 'aksi'}
               ]
    });

    // Tambah Data
    $('#formhari').submit(function (e) {
            e.preventDefault();
                var formData = new FormData(this);
                
                $.ajax({
                url : "{{route('haripraktek.store')}}",
                type : "post",
                data: formData,
                cache:false,
                contentType: false,
                dataType:'json',
                processData: false,
                success: function(response) {
                    Swal.fire(
                            'Added!',
                            'Hari Praktek Dokter Added Successfully!',
                            'success'
                            )
                    // console.log(response);
                    // $('#tutup').click()
                    $('#hari_praktek').val(null).trigger('change');
                    $('#formhari')[0].reset()
                    $('#formhari').trigger("reset"); //form reset
                    $('#tutup').trigger("reset"); //form reset
                    $('#exampleModal').modal('hide'); //modal hide
                    $('#datatablehari').DataTable().ajax.reload()
                },
                error : function (xhr) {
                    // console.log('gagal');
                    toastr.error(xhr.responseJSON.text, "GAGAL")
                }   
            })
        });

        // Edit
        $(document).on('click', '.edit', function (e) {
        e.preventDefault(); 
        $('#exampleModal').modal('show')
        let id = $(this).attr('id')
        $('#modal-judul').html("Edit Hari Praktek Dokter"); // Judul
        $('#tutup').trigger("reset");

            $.ajax({
                url : 'haripraktek/' + id + '/edit',
                type : 'get',
                data : {
                    id : id,
                    _token : "{{csrf_token()}}"
                },
                success: function (data) {
                    console.log(data)
                    $('#id').val(data.id)
                    $('#dokter_id').val(data.dokter_id)
                    $('#hari_praktek').select2('val', data.hari_praktek.split(' , '))
                    $('#tutup').trigger("reset");
                }
            })
        });
    
    // Hapus
    $(document).on('click', '.hapus', function () {
            id = $(this).attr('id');
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                    url: "haripraktek/" + id, //eksekusi ajax ke url ini
                    type: 'delete',
                    data: {
                        id: id,
                        "_token" : "{{csrf_token()}}"
                    },
                    success: function (data) { //jika sukses
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                        $('#datatablehari').DataTable().ajax.reload()
                    }
                    
                    })
                }
            })
            
        });

</script>

@endpush

@endsection
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
            <!-- Data list view starts -->
            <section id="data-list-view" class="data-list-view-header">
                <!-- DataTable starts -->
                <div class="table-responsive">

                    <table class="table zero-configuration text-center" id="datatableriwayat">
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

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-judul">Edit Data Riwayat Pendaftaran</h5>
                                <button type="button" id="tutup" class="close" data-bs-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true" id="tutup">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" id="formpetugas" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-sm-12 data-field-col">
                                        <label for="data-name">Status</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            placeholder="Masukkan Nama Petugas">
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

                {{-- update --}}

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
        const tabel = $('#datatableriwayat').DataTable({
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
        let id = $(this).attr('id')
        
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
</script>

@endpush

@endsection
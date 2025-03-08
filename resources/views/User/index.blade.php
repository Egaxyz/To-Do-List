@extends('templates.header')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data User</h1>
                    </div>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn bg-primary" type="button" data-target="#formModal" data-toggle="modal"
                                    data> <i class="fas fa-plus-square"></i> Tambah
                                    Data</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            &times;</button>
                                        <h5><i class="icon fas fa-check"></i>Sukses!</h5>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x</button>
                                        <h5><i class="icon fas fa-ban"></i>Data Gagal Disimpan!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Kontak</th>
                                            <th>Gender</th>
                                            <th>Status Akun</th>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $data)
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->kontak }}</td>
                                                <td>{{ $data->gender }}</td>
                                                <td>
                                                    @if ($data->status_akun == 'aktif')
                                                        <span class="badge badge-success">Aktif<span>
                                                            @else
                                                                <span class="badge badge-danger">Tidak aktif<span>
                                                    @endif
                                                <td>
                                                    <button class="btn btn-success" type="button" data-mode="edit"
                                                        data-id="{{ $data->id }}" data-name="{{ $data->name }}"
                                                        data-email="{{ $data->email }}" data-kontak="{{ $data->kontak }}"
                                                        data-gender="{{ $data->gender }}"
                                                        data-status="{{ $data->status_akun }}" data-toggle="modal"
                                                        data-target="#formModal">Edit</button><button class="btn btn-danger"
                                                        data-target="#deleteModal" data-toggle="modal" type="button"
                                                        data-id="{{ $data->id }}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('User/modals')
@endsection
@push('script')
    <script>
        $('#formModal').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget);
            console.log(btn.data());
            const mode = btn.data('mode');
            const id = btn.data('id');
            const name = btn.data('name');
            const email = btn.data('email');
            const gender = btn.data('gender');
            const kontak = btn.data('kontak');
            const status_akun = btn.data('status');
            const modal = $(this);

            if (mode == 'edit') {
                modal.find('.modal-title').text('Edit Data User');
                modal.find('#name').val(name);
                modal.find('#email').val(email);
                modal.find('#gender').val(gender)
                modal.find('#kontak').val(kontak)
                modal.find('#status_akun').val(status_akun)
                modal.find('.modal-body form').attr('action', '{{ url('/user') }}/' +
                    id);
                modal.find('#method').html('@method('PATCH')');

                modal.find('#passwordField').hide();
                modal.find('#password').removeAttr('required');

            } else {
                modal.find('.modal-title').text('Input Data Bahan Baku');
                modal.find('#supplier_id').val('');
                modal.find('#name').val('');
                modal.find('#email').val('');
                modal.find('#gender').val('');
                modal.find('#kontak').val('');
                modal.find('#status_akun').val('');
                modal.find('#method').html('');
                modal.find('.modal-body form').attr('action',
                    '{{ url('/user') }}');

                modal.find('#passwordField').show();
                modal.find('#password').attr('required', true);
            }
        });

        $(document).on('click', '[data-toggle="modal"][data-target="#deleteModal"]', function() {
            var userId = $(this).data('id');
            $('#deleteForm').attr('action', '/user/' + userId);
        });
    </script>
@endpush

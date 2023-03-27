@extends('layouts.template-admin')

@section('title')
    <title>Otaku Store | Product Index Page</title>
@endsection

@section('css')
    <!-- Page plugins -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('admin/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" />
@endsection

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">

                {{-- content --}}
                <div class="row py-5">
                    <div class="col">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Selamat Datang pada Halaman Manajemen Data Product</h3>
                                <p class="text-sm mb-0">
                                    Pada halaman ini Admin dapat menambahkan, mengedit dan menghapus data Produk loh, yuk
                                    kita manage data produk bersama-sama 😊.
                                </p>
                            </div>

                            <div class="container-fluid pb-2">
                                <div class="row pb-2">
                                    <div class="col">
                                        <a href="{{ route('create.product') }}" class="btn btn-theme">Tambah Product</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive py-4">
                                <table class="table table-flush" id="example">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center" width="15%">Foto</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center" width="15%">Foto</th>
                                            <th class="text-center">Kategori</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($products as $item)
                                            <tr>
                                                <td class="td-center">{{ $no }}</td>
                                                <td class="td-center"><span class="text-limit"
                                                        title="{{ $item->name }}">{{ $item->name }}</span>
                                                </td>
                                                <td class="td-center" title="{{ $item->name }}"><img
                                                        src="{{ $item->foto }}" class="img-fluid rounded" alt="">
                                                </td>
                                                <td class="td-center">{{ $item->category->name }}</td>
                                                <td class="td-center">Rp. {{ $item->price }}</td>
                                                <td class="td-center">{{ $item->stock }}</td>
                                                <td class="td-center">{{ $item->status }}</td>
                                                <td class="td-center">
                                                    <a href="{{ route('edit.product', $item->id) }}"
                                                        class="btn bg-theme text-white"><i class="fa-solid fa-pen"></i></a>
                                                    <button class="btn bg-heart text-white" data-toggle="modal"
                                                        data-target="#exampleModal{{ $item->id }}">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Hapus Produk Ini ?</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>"{{ $item->name }}"</b>
                                                            <img src="{{ $item->foto }}" class="img-fluid rounded mt-2"
                                                                alt="">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <a href="{{ route('delete.product', $item->id) }}"
                                                                type="button" class="btn bg-danger text-white">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End content --}}

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection

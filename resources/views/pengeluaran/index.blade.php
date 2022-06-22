@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <div>
                    Manajemen Pngeluaran
                </div>
                <div>
                    <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary">+</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Bendahara</th>
                            <th>Rekening</th>
                            <th>Kegiatan</th>
                            <th>Pengeluaran</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengeluarans as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{$item->user->name}}
                                </td>
                                <td>
                                    {{$item->rekening->nama_rekening}}
                                </td>
                                <td>
                                    {{$item->nama_kegiatan}}
                                </td>
                                <td>
                                    @currency($item->jumlah_pengeluaran)
                                    {{-- {{$item->jumlah_pengeluaran}} --}}
                                </td>
                                <td class="d-flex">
                                    {{-- <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-success">Edit</a> --}}
                                    <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2" onclick="return confirm('Yakin ingin menghapusnya?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Belum Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <div>
                    Manajemen Pemasukan
                </div>
                @if (Auth::user()->role != 'pemantau')
                <div>
                    <a href="{{ route('pemasukan.create') }}" class="btn btn-primary">+</a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Bendahara</th>
                            <th>Rekening</th>
                            <th>Kegiatan</th>
                            <th>Pemasukan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemasukans as $item)
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
                                    {{-- {{$item->jumlah_pemasukan}} --}}
                                    @currency($item->jumlah_pemasukan)
                                </td>
                                @if (Auth::user()->role != 'pemantau')
                                <td class="d-flex">
                                    {{-- <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-success">Edit</a> --}}
                                    <form action="{{ route('pemasukan.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger ms-2" onclick="return confirm('Yakin ingin menghapusnya?')">Delete</button>
                                    </form>
                                </td>
                                @endif
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
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <div>
                    Setup Rekening
                </div>
                <div>
                    <a href="{{ route('rekening.create') }}" class="btn btn-primary">+</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Nomor Rekening</th>
                            <th>Nama Rekening</th>
                            <th>Saldo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rekenings as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    {{$item->norek}}
                                </td>
                                <td>
                                    {{$item->nama_rekening}}
                                </td>
                                <td>
                                    @currency($item->uang)
                                </td>
                                @if (Auth::user()->role != 'pemantau')
                                <td class="d-flex">
                                    <a href="{{ route('rekening.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('rekening.destroy', $item->id) }}" method="post">
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
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <div>
                    Setup Pemasukan
                </div>
                <div>
                    <a href="{{ route('pemasukan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('pemasukan.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="form-group">
                        <label for="">Rekening</label>
                        <select name="rekening_id" id="" class="form-control">
                            <option value="">Pilih Rekening...</option>
                            @foreach ($rekenings as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_rekening }} - {{ $item->uang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kegiatan</label>
                        <input type="text" name="nama_kegiatan" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Pemasukan</label>
                        <input type="number" name="jumlah_pemasukan" id="" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header justify-content-between align-items-center">
                <div>
                    Setup Rekening
                </div>
                <div>
                    <a href="{{ route('rekening.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('rekening.update', $rekening->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nomor Rekening</label>
                        <input type="number" name="norek" id="" value="{{ $rekening->norek }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Rekening</label>
                        <input type="text" name="nama_rekening" value="{{ $rekening->nama_rekening }}" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tambah Saldo</label>
                        <input type="number" name="uang" id="" class="form-control" value="{{ $rekening->uang }}">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Daftar Rak Buku')

@section('content')
    <script>
        $(function() {
            $("#btn-save").click(function(e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    nama: $('#nama').val(),
                    lokasi: $('#lokasi').val(),
                    keterangan: $('#keterangan').val()
                };
                var state = $('#btn-save').val();
                var type = "POST";
                var id = $('#id').val();
                var ajaxurl = '{{ $action }}';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        var todo = 'Pengiriman Data berhasil';
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

    <h2>{{ $store }} Data Rak Buku</h2>
    <form method="POST" action="{{ $action }}">
        @csrf
        @if (strtolower($store) == 'ubah')
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ $rak->id }}" />
        
        <input type="text" class="mail_text" id="nama" name="nama" placeholder="Nama Rak" value="{{ $rak->nama }}" /><br>
        @error('nama')
            <b>{{ $message }}</b>
        @enderror
        <br>
        
        <input type="text" class="mail_text" id="lokasi" name="lokasi" placeholder="Lokasi" value="{{ $rak->lokasi }}" /><br>
        @error('lokasi')
            <b>{{ $message }}</b>
        @enderror
        <br>
        
        <div class="form-group">
            <input type="text" class="mail_text" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{ $rak->keterangan }}" />
        </div>
        <br>

        <div class="form-group">
            <input type="text" class="mail_text" id="datepicker" name="tanggal" placeholder="Tanggal">
        </div>
        <br>

        <button class="btn btn-primary save_bt" type="submit" id="btn_save" style="margin-top: 20px;">Simpan</button>
        
        <div class="send_bt">
            <a href="{{ url('/rak_buku') }}">Kembali</a>
        </div>
    </form>
@endsection

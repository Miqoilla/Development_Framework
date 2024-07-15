<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="h-screen w-screen bg-slate-300 flex flex-col justify-start items-center">
    <p class="text-xl mt-8 font-bold">Tambah Buku</p>
    <form action="/buku-create" method="post" class="w-2/3 flex justify-center">
        @csrf
        <div class="flex flex-col w-1/2">
            <label for="judul">Judul Buku</label>
            <input type="text" id="judul" name="judul" class="mb-2">
            <label for="penulis">Penulis Buku</label>
            <input type="text" id="penulis" name="penulis" class="mb-2">
            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" class="mb-2">
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" name="isbn" class="mb-2">
            <label for="sinopsis">Sinopsis</label>
            <textarea name="sinopsis" id="sinopsis" rows="2"></textarea>
            <label for="stok">Stok</label>
            <input type="number" id="stok" name="stok" class="mb-2">
            <label for="id_rak_buku">Rak Buku</label>
            <select name="id_rak_buku" id="id_rak_buku">
                @foreach($rak_buku as $rb)
                <option value="{{ $rb->id }}">{{ $rb->nama }}</option>
                @endforeach
            </select>

            <button type="submit" class="mt-5 bg-slate-900 text-slate-300 hover:bg-slate-800">Tambah</button>
        </div>
    </form>
  </div>
</body>
</html>
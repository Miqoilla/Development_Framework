<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="h-screen w-screen bg-slate-300 flex flex-col justify-start items-center">
    <p class="text-xl my-8 font-bold">Daftar Buku</p>
    <table class="w-2/3">
        <tr class="border-b border-slate-900">
            <th class="w-1/12">ID</th>
            <th class="w-2/12">Judul</th>
            <th class="w-2/12">Penulis</th>
            <th class="w-1/12">Tahun</th>
            <th class="w-1/12">ISBN</th>
            <th class="w-2/12">Sinopsis</th>
            <th class="w-1/12">Stok</th>
            <th class="w-1/12">Rak Buku</th>
            <th class="w-/12">?</th>
        </tr>
        @foreach($buku as $b)
        <tr class="border-b border-slate-900 text-center">
            <td>{{ $b->id }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->tahun }}</td>
            <td>{{ $b->isbn }}</td>
            <td>{{ $b->sinopsis }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->rakBuku->nama }}</td>
            <td>
                <form action="/buku-edit/{{ $b->id }}" method="post">
                @csrf
                @method('put')
                <button type="submit">edit</button>
                </form> 
                <form action="/buku-hapus/{{ $b->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">hapus</button>
                </form> 
            </td>
        </tr>
        @endforeach
    </table>
    <a href="/buku-create" class="bg-slate-900 text-slate-300 hover:bg-slate-800 p-2 rounded-lg mt-4">Tambah Buku</a>
  </div>
</body>
</html>
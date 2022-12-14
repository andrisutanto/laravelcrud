<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Deleted</title>
</head>
<body>
    <center>
        <p>
            <button type="button" onclick="window.location='/mhs/index'">
                &laquo; kembali
            </button>
        </p>
        @if(session('msg'))
            <p>
                {{ session('msg') }}
            </p>
        @endif
        <table style="width: 80%; border-collapse: collapse; border: 1px solid #000" border="1">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Telp</th>
                <th>Alamat</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($dataMhs as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->mhsnim }}</td>
                        <td>{{ $d->mhsnama }}</td>
                        <td>{{ $d->mhstelp }}</td>
                        <td>{{ $d->mhsalamat }}</td>
                        <td>
                            <button type="button" onclick="restore('{{ $d->mhsnim }}')">
                                Restore
                            </button>

                            <form method="POST" action="/mhs/forceDelete/{{ $d->mhsnim }}" style="display: inline;" onsubmit="return hapusData()">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    Hapus Permanen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>

    <script>
        function restore(nim) {
            pesan = confirm('Yakin data ini direstore?');
            if(pesan){
                window.location='/mhs/restore/' + nim
            }
                
        }

        function hapusData() {
            pesan = confirm('Yakin data ini dihapus permanen?');
            if(pesan)
                return true;
            else return false;
        }

    </script>
</body>
</html>
@extends('layout.main')

@section('judul')
    halaman home
@endsection

@section('isi')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <button type="button" class="btn btn-primary" onclick="window.location='/mhs/tambah'">
            tambah
        </button>
        <button type="button" class="btn btn-info" onclick="window.location='/mhs/datasoft'">
            Tampil data softdeleted
        </button>
      </h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
        @if(session('msg'))
        <p>
            {{ session('msg') }}
        </p>
    @endif

    <form method="GET">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">
                Cari Data
            </label>

            <div class="col-sm-10">
                <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari Data Disini" autofocus="true" value="{{ $cari }}">
            </div>
        </div>
    </form>

    <table class="table table-sm table-bordered table-striped">
        <thead>
            <th>No</th>
            <th>@sortablelink('mhsnim','NIM')</th>
            <th>@sortablelink('mhsnama','Nama Mahasiswa')</th>
            <th>@sortablelink('mhstelp','Telp')</th>
            <th>@sortablelink('mhsalamat','Alamat')</th>
            <th>Action</th>
        </thead>
        <tbody>
            @php
            $nomor = 1 + (($dataMhs->currentPage()-1) * $dataMhs->perPage());
            @endphp
            @foreach ($dataMhs as $d)
                <tr>
                    {{-- <td>{{ $loop->iteration }}</td> --}}
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $d->mhsnim }}</td>
                    <td>{{ $d->mhsnama }}</td>
                    <td>{{ $d->mhstelp }}</td>
                    <td>{{ $d->mhsalamat }}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" type="button" onclick="window.location='/mhs/edit/{{ $d->mhsnim }}'">
                            Edit
                        </button>

                        <form method="POST" action="/mhs/hapus/{{ $d->mhsnim }}" style="display: inline;" onsubmit="return hapusData()">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $dataMhs->links() }} --}}

    {!! $dataMhs->appends(Request::except('page'))->render() !!}
<script>
    function hapusData() {
        pesan = confirm('Yakin data ini dihapus?');
        if(pesan)
            return true;
        else return false;
    }

</script>
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer-->
  </div>
@endsection

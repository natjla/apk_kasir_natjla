<div class="row-2 p-4">
    <div class="col-md-6"></div>
    <div class="card">
        <div class="card-body">

            <h5><b>{{ $title }}</b></h5>
            <hr>
            <a href= "/admin/transaksi/create" class= "btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
            <table class="table">
                <tr>
                    <th> No </th>
                    <th> Waktu Transaksi </th>
                    <th> Action </th>
                </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>

                                <div class="d-flex">
                                    <a href="/admin/transaksi/{{ $item->id }}/edit" class="btn btn-info btn-sm"> <i
                                            class="fas fa-edit"></i></a>
                                    {{-- <a href="" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a> --}}
                                    <form action= "/admin/transaksi/{{ $item->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm ml-1"><i
                                                class=" fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

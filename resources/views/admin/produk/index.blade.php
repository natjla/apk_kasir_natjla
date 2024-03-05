<div class="row-2 p-4">
    <div class="col-md-6"></div>
    <div class="card">
        <div class="card-body">

            <h5><b>{{ $title }}</b></h5>
            <hr>
            <a href= "/admin/produk/create" class= "btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
            <table class="table">
                <tr>
                    <th> No </th>
                    <th> Nama </th>
                    <th> Kategori </th>
                    <th> Harga </th>
                    <th> Stok </th>
                    <th> Gambar </th>
                    <th> Action </th>
                </tr>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->kategori_id }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->stok }}</td>
                            <td><img src = "/{{ $item->gambar }}" width="100px" alt=""></td>
                            <td>

                                <div class="d-flex">
                                    <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-info btn-sm"> <i
                                            class="fas fa-edit"></i></a>
                                    {{-- <a href="" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></a> --}}
                                    <form action= "/admin/produk/{{ $item->id }}" method="POST">
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
            <div class="d-flex justify-content">
                {{-- {{ $kategori->links() }} --}}
            </div>
        </div>
    </div>
</div>

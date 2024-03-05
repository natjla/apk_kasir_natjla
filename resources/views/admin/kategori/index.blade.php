<div class="container-fluid pt-2">
<div class="row">
<div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <h5><b>{{ $title }}</b></h5>
            <hr>
            <a href= "/admin/kategori/create" class= "btn btn-primary mb-2"><i class="fas fa-plus"></i> Tambah</a>
            <table class="table">
            <thead>
                    <tr>
                        <th> No </th>
                        <th> Name </th>
                        <th> Action </th>
                    </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
            @foreach ( $kategori as $item )
                <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>

                <div class="d-flex">
                <a href="/admin/kategori/{{ $item->id }}/edit" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i></a>
                <form action= "/admin/kategori/{{ $item->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm ml-1"><i class=" fas fa-trash"></i></button>
                </form>
                </div>
                </td>
                </tr>
                 @endforeach
                  </tbody>
            </table>
            <div class="d-flex justify-content">
            {{ $kategori->links() }}
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

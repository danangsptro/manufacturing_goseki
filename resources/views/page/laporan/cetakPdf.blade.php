<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <p class="text-center font-weight-bold">{{ $text }} </p>
    <div class="mt-4 mb-4">
        <table>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td>Name </td>
                <td> : {{ $idUser->name }}</td>
            </tr>
            <tr>
                <td>User Role</td>
                <td> : {{ $idUser->user_role }}</td>
            </tr>
            <tr>
                <td>Total Data: </td>
                <td> : {{ $data->count() }}</td>
            </tr>
        </table>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Produksi</th>
                <th>Mesin Produksi</th>
                <th>Nama Operator</th>
                <th>Nama Produk</th>
                <th>Proses</th>
                @if ($type === 'hp')
                    <th>Part</th>
                    <th>Part Qty</th>
                @elseif($type === 'pp')
                    <th>Remark</th>
                @endif
                <th>Waktu</th>
                <th>Author</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($type === 'hp')
                            {{ $d->tanggal_produksi }}
                        @elseif($type === 'pp')
                            {{ $d->tanggal_problem }}
                        @endif
                    </td>
                    <td>{{ $d->mesin->nama_mesin }}</td>
                    <td>{{ $d->operator->nama_operator }}</td>
                    <td>{{ $d->produk->nama_produk }}</td>
                    <td>{{ $d->proses->nama_proses }}</td>
                    @if ($type === 'hp')
                        <td>{{ $d->part }}</td>
                        <td>{{ $d->qty_part }}</td>
                    @elseif($type === 'pp')
                        <td>{{ $d->remark }}</td>
                    @endif
                    <td>{{ $d->start_time }} - {{ $d->end_time }}</td>
                    <td>{{ $d->user->user_role }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>

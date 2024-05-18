<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        .: {{ config('app.name') }} :.
    </title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .title {
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    <center>
        <div class="title">
            Laporan Transaksi Bulan : <strong>{{ $namaBulan }}</strong>
        </div>
        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%">
            <thead>
                <tr>
                    <th class="text-center">External ID</th>
                    <th>Nama</th>
                    <th class="text-center">Payment Status</th>
                    <th class="text-center">Payment Channel</th>
                    <th class="text-center">Payment Method</th>
                    <th class="text-center">Tanggal Pesan</th>
                    <th class="text-center">Waktu Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction as $item)
                    <tr>
                        <td class="text-center">{{ $item->external_id }}</td>
                        <td>{{ $item->users->nama }}</td>
                        <td class="text-center">{{ $item->payment_status }}</td>
                        <td class="text-center">{{ $item->payment_channel }}</td>
                        <td class="text-center">{{ $item->payment_method }}</td>
                        <td class="text-center">{{ $item->tanggal_pesan }}</td>
                        <td class="text-center">{{ $item->waktu_pesan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>

</body>
</html>

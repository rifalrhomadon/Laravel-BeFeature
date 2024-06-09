@extends('layouts.app')

@section('title')
    Transaksi | Be Feature Admin
@endsection

@section('content')
    <h3>Transaction</h3>
    <button type="button" class="btn btn-tambah">
        <a href="/transaction/cetak">Cetak</a>
    </button>
    <table class="table-data">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->updated_at }}</td>
                    <td>{{ $transaction->nama }}</td>
                    <td>{{ optional($transaction->category)->nama ?? 'N/A' }}</td> <!-- Handle null category -->
                    <td>Rp. {{ number_format($transaction->harga) }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>
                        <button class="btn_detail" onclick='showDetails("{{ $transaction->updated_at }}", "{{ $transaction->nama }}", "{{ optional($transaction->category)->nama ?? 'N/A' }}", "{{ $transaction->harga }}", "{{ $transaction->status }}")'>Detail</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        function showDetails(tanggal, nama, kategori, harga, status) {
            alert(`Tanggal: ${tanggal}\nNama: ${nama}\nKategori: ${kategori}\nHarga: Rp. ${Number(harga).toLocaleString()}\nStatus: ${status}`);
        }
    </script>
@endsection

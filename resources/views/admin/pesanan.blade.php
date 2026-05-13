<h1>Daftar Pesanan</h1>
<table border="1" cellpadding="10">
    <tr>
        <th>Nama Pemesan</th>
        <th>Paket</th>
        <th>Jumlah Orang</th>
        <th>Total</th>
        <th>Status</th>
        <th>Bukti</th>
    </tr>
    @foreach($pesanan as $item)
    <tr>
        <td>{{ $item->nama_pemesan }}</td>
        <td>{{ $item->paket->nama_paket }}</td>
        <td>{{ $item->jumlah_orang }}</td>
        <td>Rp {{ number_format($item->total_harga) }}</td>
        <td>{{ $item->status }}</td>
        <td>
            @if($item->bukti_pembayaran)
                <img src="{{ asset('bukti/'.$item->bukti_pembayaran) }}"
                     width="100">
            @else
                Belum Upload
            @endif
        </td>
    </tr>
    @endforeach
</table>
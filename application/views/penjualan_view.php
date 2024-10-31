<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 min-h-screen py-20">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-orange-400 text-center mb-6">MINIMARKET BAROKAH PAK ADI</h1>
        <div class="flex justify-center space-x-4 mb-6">
            <a href="<?= base_url('home') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Home</a>
            <a href="<?= base_url('items') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Barang</a>
            <a href="<?= base_url('categories') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Kategori</a>
            <a href="<?= base_url('transactions') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Penjualan</a>
        </div>
        <div class="flex justify-between items-center mb-6">
            <a href="<?= base_url('add_transactions') ?>" class="bg-orange-500 text-white px-4 py-2 rounded-md shadow hover:bg-orange-600 transition">Tambahkan Penjualan</a>
        </div>
        <div class="bg-gray-900 shadow-lg rounded-lg p-8 overflow-x-auto">
            <table class="min-w-full table-auto bg-gray-800 text-orange-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-center">ID Penjualan</th>
                        <th class="px-4 py-2 border-b text-center">ID Barang</th>
                        <th class="px-4 py-2 border-b text-center">Nama Pembeli</th>
                        <th class="px-4 py-2 border-b text-center">Nama Barang</th>
                        <th class="px-4 py-2 border-b text-center">Tanggal Pembelian</th>
                        <th class="px-4 py-2 border-b text-center">Waktu Pembelian</th>
                        <th class="px-4 py-2 border-b text-center">Jumlah Barang</th>
                        <th class="px-4 py-2 border-b text-center">Jumlah Harga</th>
                        <th class="px-4 py-2 border-b text-center">Ubah</th>
                        <th class="px-4 py-2 border-b text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penjualan as $p): ?>
                    <tr>
                        <td class="px-4 py-2 border-b text-center"><?= $p->id_penjualan ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->id_barang ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->nama_pembeli ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->nama_barang ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->tanggal_pembelian ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->waktu_pembelian ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $p->jumlah_barang ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= number_format($p->jumlah_harga, 2) ?></td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('edit_transactions/' . $p->id_penjualan) ?>" class="bg-orange-500 text-white px-2 py-1 rounded-md hover:bg-orange-600">Ubah</a>
                        </td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('delete_transactions/' . $p->id_penjualan) ?>" onclick="return confirm('Apa anda yakin ingin menghapus Penjualan ini?');" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 min-h-screen py-20">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-orange-400 text-center mb-6">MINIMARKET BAROKAH PAK ADI</h1>
        <div class="flex justify-center space-x-4 mb-6">
            <a href="<?= base_url('home/index') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Home</a>
            <a href="<?= base_url('barang/index') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Barang</a>
            <a href="<?= base_url('kategori/index') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Kategori</a>
            <a href="<?= base_url('penjualan/index') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Penjualan</a>
        </div>
        <div class="flex justify-between items-center mb-6">
            <a href="<?= base_url('barang/create') ?>" class="bg-orange-500 text-white px-4 py-2 rounded-md shadow hover:bg-orange-600 transition">Tambahkan Barang</a>
        </div>
        <div class="bg-gray-900 shadow-lg rounded-lg p-8 overflow-x-auto">
            <div class="flex justify-between mb-4">
                <!-- Fitur Filter berdasarkan harga -->
                <form action="<?= base_url('barang/filter') ?>" method="POST" class="flex space-x-2">
                    <input type="number" name="min_price" placeholder="Harga Minimum" class="bg-gray-800 text-orange-300 border border-orange-500 px-4 py-2 rounded-md" required />
                    <input type="number" name="max_price" placeholder="Harga Maksimum" class="bg-gray-800 text-orange-300 border border-orange-500 px-4 py-2 rounded-md" required />
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">Saring</button>
                </form>

                <!-- Fitur Pencarian Barang -->
                <form action="<?= base_url('barang/search') ?>" method="POST">
                    <input type="text" name="keyword" placeholder="Cari Barang..." class="bg-gray-800 text-orange-300 border border-orange-500 px-4 py-2 rounded-md" />
                    <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">Cari</button>
                </form>
            </div>
            <table class="min-w-full table-auto bg-gray-800 text-orange-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-center">SKU</th>
                        <th class="px-4 py-2 border-b text-center">Nama Barang</th>
                        <th class="px-4 py-2 border-b text-center">Kategori</th>
                        <th class="px-4 py-2 border-b text-center">Harga</th>
                        <th class="px-4 py-2 border-b text-center">Stok</th>
                        <th class="px-4 py-2 border-b text-center">Ubah</th>
                        <th class="px-4 py-2 border-b text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $b): ?>
                    <tr>
                        <td class="px-4 py-2 border-b text-center"><?= $b->sku ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $b->nama_barang ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $b->nama_kategori ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $b->harga ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $b->jumlah_stok ?></td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('barang/edit/' . $b->sku) ?>" class="bg-orange-500 text-white px-2 py-1 rounded-md hover:bg-orange-600">Ubah</a>
                        </td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('barang/delete/' . $b->sku) ?>" onclick="return confirm('Apa anda yakin ingin menghapus Barang ini?');" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

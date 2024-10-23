<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>

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
            <a href="<?= base_url('kategori/create') ?>" class="bg-orange-500 text-white px-4 py-2 rounded-md shadow hover:bg-orange-600 transition">Tambahkan Kategori</a>
        </div>
        <div class="bg-gray-900 shadow-lg rounded-lg p-8 overflow-x-auto">
            <table class="min-w-full table-auto bg-gray-800 text-orange-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b text-center">ID Kategori</th>
                        <th class="px-4 py-2 border-b text-center">Nama Kategori</th>
                        <th class="px-4 py-2 border-b text-center">Ubah</th>
                        <th class="px-4 py-2 border-b text-center">Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $k): ?>
                    <tr>
                        <td class="px-4 py-2 border-b text-center"><?= $k->id_kategori ?></td>
                        <td class="px-4 py-2 border-b text-center"><?= $k->nama_kategori ?></td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('kategori/edit/' . $k->id_kategori) ?>" class="bg-orange-500 text-white px-2 py-1 rounded-md hover:bg-orange-600">Ubah</a>
                        </td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="<?= base_url('kategori/delete/' . $k->id_kategori) ?>" onclick="return confirm('Apa anda yakin ingin menghapus Kategori ini?');" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Barang</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 flex items-center justify-center min-h-screen py-20">
    <div class="bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-orange-400 mb-6">Formulir Penambahan Data Barang</h2>
        <form action="<?= base_url('barang/store') ?>" method="post">
            <div class="mb-4">
                <label for="sku" class="block text-sm font-medium text-orange-300">SKU</label>
                <input type="text" id="sku" name="sku" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="nama_barang" class="block text-sm font-medium text-orange-300">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="nama_kategori" class="block text-sm font-medium text-orange-300">Kategori</label>
                <select id="nama_kategori" name="nama_kategori" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
                    <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-orange-300">Harga</label>
                <input type="number" id="harga" name="harga" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="jumlah_stok" class="block text-sm font-medium text-orange-300">Jumlah Stok</label>
                <input type="number" id="jumlah_stok" name="jumlah_stok" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white font-semibold rounded-md shadow-lg hover:bg-orange-700 focus:ring focus:ring-orange-500">Tambahkan Barang</button>
            </div>
        </form>
    </div>
</body>
</html>

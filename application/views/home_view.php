<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 min-h-screen py-20">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-orange-400 text-center mb-6">MINIMARKET BAROKAH PAK ADI</h1>
        <h2 class="text-2xl font-bold text-orange-400 text-center mb-6">Selamat Datang Di Minimarket Barokah Pak Adi!</h2>
        <h3 class="text-xl font-bold text-orange-400 text-center mb-6">Belanja Keperluan Anda Disini Dijamin Barokah</h3>
        <div class="flex justify-center space-x-4 mb-6">
            <a href="<?= base_url('home') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Home</a>
            <a href="<?= base_url('items') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Barang</a>
            <a href="<?= base_url('categories') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Kategori</a>
            <a href="<?= base_url('transactions') ?>" class="bg-transparent border-2 border-orange-500 text-orange-500 px-4 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Penjualan</a>
        </div>
    </div>
</body>
</html>
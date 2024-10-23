<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Kategori</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 flex items-center justify-center min-h-screen py-20">
    <div class="bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-orange-400 mb-6">Formulir Pembaruan Data Kategori</h2>
        <form action="<?= base_url('kategori/update/' . $kategori->id_kategori) ?>" method="post">
            <div class="mb-4">
                <label for="nama_kategori" class="block text-sm font-medium text-orange-300">Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="<?= isset($kategori->nama_kategori) ?>" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white font-semibold rounded-md shadow-lg hover:bg-orange-700 focus:ring focus:ring-orange-500">Perbarui Data Kategori</button>
            </div>
        </form>
    </div>
</body>
</html>

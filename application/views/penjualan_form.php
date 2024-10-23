<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penjualan</title>

    <!-- Memanggil Tailwind CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-gray-800 to-gray-900 flex items-center justify-center min-h-screen py-20">
    <div class="bg-gray-900 shadow-lg rounded-lg p-8 w-full max-w-3xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-orange-400 mb-6">Formulir Penambahan Data Penjualan</h2>
        <form action="<?= base_url('penjualan/store') ?>" method="post">
            <div class="mb-4">
                <label for="nama_pembeli" class="block text-sm font-medium text-orange-300">Nama Pembeli</label>
                <input type="text" id="nama_pembeli" name="nama_pembeli" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="tanggal_pembelian" class="block text-sm font-medium text-orange-300">Tanggal Pembelian</label>
                <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="waktu_pembelian" class="block text-sm font-medium text-orange-300">Waktu Pembelian</label>
                <input type="time" id="waktu_pembelian" name="waktu_pembelian" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required>
            </div>
            <div class="mb-4">
                <label for="id_barang" class="block text-sm font-medium text-orange-300">Barang</label>
                <select id="id_barang" name="id_barang" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required onchange="updateHarga(this)">
                    <?php foreach ($barang as $b) : ?>
                        <option value="<?= $b->id_barang; ?>" data-harga="<?= $b->harga; ?>"><?= $b->nama_barang; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah_barang" class="block text-sm font-medium text-orange-300">Jumlah</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required oninput="updateJumlahHarga()">
            </div>
            <div class="mb-4">
                <label for="jumlah_harga" class="block text-sm font-medium text-orange-300">Jumlah Harga</label>
                <input type="number" step="0.01" id="jumlah_harga" name="jumlah_harga" class="mt-1 block w-full p-2 border border-gray-700 bg-gray-700 text-orange-300 rounded-md focus:ring focus:ring-orange-500" required readonly>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full px-4 py-2 bg-orange-600 text-white font-semibold rounded-md shadow-lg hover:bg-orange-700 focus:ring focus:ring-orange-500">Tambahkan Penjualan</button>
            </div>
        </form>
    </div>

    <script>
        function updateHarga(select) {
            // Ambil harga dari opsi yang dipilih
            const harga = select.options[select.selectedIndex].getAttribute('data-harga');
            // Set nilai harga di input jumlah_harga
            const jumlahBarang = document.getElementById('jumlah_barang').value;
            document.getElementById('jumlah_harga').value = harga * jumlahBarang;
        }

        function updateJumlahHarga() {
            const select = document.getElementById('id_barang');
            const harga = select.options[select.selectedIndex].getAttribute('data-harga');
            const jumlahBarang = document.getElementById('jumlah_barang').value;
            document.getElementById('jumlah_harga').value = harga * jumlahBarang;
        }
    </script>
</body>
</html>

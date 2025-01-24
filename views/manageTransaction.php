


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navbar -->
<?php include 'includes/navbar.php'; ?>

<!-- Main container -->
<div class="flex">
    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <?php if (isset($_SESSION['success_message'])): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            <?php echo htmlspecialchars($_SESSION['success_message']); ?>
            <?php unset($_SESSION['success_message']); // Hapus pesan setelah ditampilkan ?>
        </div>
        <?php endif; ?>

        <!-- Your main content goes here -->
        <div class="container mx-auto">

            <!-- Transactions Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white grid-cols-1">
                    <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">ID</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Name Transaction</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Amount Transaction</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">Date Transaction</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>
                    </thead>
                    <body class="text-gray-700">
                    <?php if (empty($transactions)): ?>
                        <tr>
                            <td colspan="5" class="text-center py-3">Tidak ada transaksi yang tersedia.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($transactions as $transaction): ?>
                            <tr class="text-center">
                                <td class="py-3 px-4"><?php echo htmlspecialchars($transaction['id_trx']) ; ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($transaction['name_trx']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($transaction['amount_trx']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($transaction['date_trx']); ?></td>
                                <td class="py-3 px-4">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                        <a href="index.php?modul=insertTrx&employee=delete&id=<?php echo $transaction['id_trx']; ?>">Delete</a>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </body>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
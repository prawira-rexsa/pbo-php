<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Employee</title>
<!--    <link href="./Views/output.css" rel="stylesheet">-->
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
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Employee</h2>
                <form action="index.php?modul=user&employee=update&id=<?php echo ($user->user_id); ?>" method="POST">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Employee Name :</label>
                        <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required
                        value="<?php echo htmlspecialchars($user->username); ?>">
                    </div>

                    <!-- Role role_description -->
                    <div class="mb-4">
                        <label for="addressEmployee" class="block text-gray-700 text-sm font-bold mb-2">Address :</label>
                        <textarea id="addressEmployee" name="addressEmployee" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukan harga barang" rows="3" required
                        ><?php echo htmlspecialchars($user->addressUser)?></textarea>
                    </div>

                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="positionUser" class="block text-gray-700 text-sm font-bold mb-2">Position :</label>
                        <input type="text" id="positionUser" name="positionUser" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required
                        value="<?php echo htmlspecialchars($user->jabatanUser); ?>">
                    </div>


                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

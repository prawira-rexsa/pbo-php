<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Employee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; 
        require_once '/../models/role_model.php';
        $obj_role = new modelRole();
        $roles = $obj_role->getAllRoles();
    ?>   

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Input Employee</h2>
                <form action="../index.php?modul=user&employee=add" method="POST">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Employee Name:</label>
                        <input type="text" id="username" name="username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Pegawai" required>
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4">
                        <label for="addressEmployee" class="block text-gray-700 text-sm font-bold mb-2">Address:</label>
                        <textarea id="addressEmployee" name="addressEmployee" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Alamat Pegawai" rows="3" required></textarea>
                    </div>

            <div class="mb-4">
                <label for="positionUser" class="block text-gray-700 text-sm font-bold mb-2">Position :</label>
                <select id="positionUser" name="positionUser" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="" disabled selected>Pilih posisi</option>
                    <?php
                    foreach ($roles as $role) {
                        echo '<option value="' . htmlspecialchars($role->role_name) . '">' . htmlspecialchars($role->role_name) . '</option>';
                    }
                    ?>
                </select>
            </div>


                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

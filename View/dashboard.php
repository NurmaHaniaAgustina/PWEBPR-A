<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header("location: http://localhost/TUGAS-2-PWEBPR-A-1028/");
        exit;
    }
    $email = $_SESSION['email'];

   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/TUGAS-2-PWEBPR-A-1028/src/php/connect.php";
   include_once($path);
?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CSS -->
</head>
<body class="h-full">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-200">
            <div class="p-4">
                <h1 class="text-xl font-semibold text-pink-600">
                    <i class="fas fa-cat text-pink-500 mr-2"></i> <!-- Cat Icon -->
                    Petshop.id
                </h1>
            </div>
            <nav class="mt-6">
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="flex items-center p-3 text-black hover:bg-blue-300">
                            <i class="fas fa-tachometer-alt mr-2"></i> <!-- Dashboard Icon -->
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-black hover:bg-blue-300">
                            <i class="fas fa-user mr-2"></i> <!-- Profile Icon -->
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-3 text-black hover:bg-blue-300">
                            <i class="fas fa-cog mr-2"></i> <!-- Settings Icon -->
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="/TUGAS-2-PWEBPR-A-1028/src/php/logout.php" class="flex items-center p-3 text-black hover:bg-red-200">
                            <i class="fas fa-sign-out-alt mr-2"></i> <!-- Log Out Icon -->
                            Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Content -->
        <div class="flex flex-col flex-1 p-6">
            <h2 class="text-xl font-semibold mb-4">Selamat datang, <?php echo $email; ?> </h2>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full border rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">No ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Owner</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                            $sql = "SELECT * FROM `tb_dashboard`";
                            $query = mysqli_query($conn, $sql);

                            while ($data = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>".$data['id']."</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>".$data['owner']."</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>".$data['phone']."</td>";
                            echo "<td class='px-6 py-4 whitespace-nowrap'>                                
                            <a href='/TUGAS-2-PWEBPR-A-1028/src/pages/layouts/edit.php?id=".$data['id']."'class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded'>
                            <i class='fas fa-pencil-alt'></i> <!-- Edit Icon -->
                            </a>
                            <a href='/TUGAS-2-PWEBPR-A-1028/src/php/delete.php?id=".$data['id']."' class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded'>
                            <i class='fas fa-trash-alt'></i> <!-- Delete Icon -->
                            </a>
                        </td>";

                            }
                        
                        ?>
                        
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Add Submission Button -->
            <div class="md-5">
                <form action="/TUGAS-2-PWEBPR-A-1028/src/php/createdata.php" method="post">
                    <div class="py-7">
                        <label class="font-semibold text-md text-gray-600 pb-1">Owner</label>
                        <input id="owner" name="owner" type="text" placeholder="Masukkan nama Owner"
                            class="border rounded-lg px-10 py-3 mt-1 text-sm" required/>
                    
                        <label class="font-semibold text-mc text-gray-600 pb-1">Phone</label>
                        <input id="phone" name="phone" type="number" placeholder="Masukkan Nomer Handphone"
                            class="border rounded-lg px-10 py-3 mt-1 text-sm" required/>
                        <!-- <a href="src\pages\layouts\dashboard.html"> -->
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            <i class="fas fa-plus mr-2"></i> <!-- Plus Icon -->
                            Add
                        </button>
                        <!-- </a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

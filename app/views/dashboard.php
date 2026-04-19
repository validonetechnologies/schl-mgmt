<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-indigo-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold border-b border-indigo-800">SchlMgmt</div>
        <nav class="flex-grow p-4 space-y-2">
            <a href="/<?= $_SESSION['current_slug'] ?>/dashboard" class="block p-3 rounded-lg hover:bg-indigo-800 transition bg-indigo-800">
                <i class="fa-solid fa-house mr-3"></i> Dashboard
            </a>
            <a href="/<?= $_SESSION['current_slug'] ?>/students" class="block p-3 rounded-lg hover:bg-indigo-800 transition">
                <i class="fa-solid fa-graduation-cap mr-3"></i> Students
            </a>
            <a href="/<?= $_SESSION['current_slug'] ?>/classes" class="block p-3 rounded-lg hover:bg-indigo-800 transition">
                <i class="fa-solid fa-chalkboard mr-3"></i> Classes
            </a>
            <a href="/<?= $_SESSION['current_slug'] ?>/teachers" class="block p-3 rounded-lg hover:bg-indigo-800 transition">
                <i class="fa-solid fa-user-tie mr-3"></i> Teachers
            </a>
        </nav>
        <div class="p-4 border-t border-indigo-800">
            <a href="/logout" class="block p-3 rounded-lg hover:bg-red-600 transition text-red-200">
                <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow overflow-y-auto h-screen">
        <header class="bg-white shadow-sm p-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Welcome, <?= $_SESSION['user_name'] ?></h2>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500"><?= $_SESSION['role'] ?></span>
                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 font-bold">
                    <?= substr($_SESSION['user_name'][0], 0, 1) ?>
                </div>
            </div>
        </header>
        <div class="p-8">
            <!-- Page content will be injected here -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h1 class="text-2xl font-bold mb-4">School Dashboard</h1>
                <p class="text-gray-600">Welcome to your multi-tenant management portal.</p>
            </div>
        </div>
    </main>
</body>
</html>

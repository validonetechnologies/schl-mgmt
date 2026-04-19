<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Dashboard - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; ?>
    <main class="flex-grow p-8">
        <header class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Teacher's Workspace</h1>
            <p class="text-gray-500">Manage your classes and student progress.</p>
        </header>

        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Assigned Students</div>
                    <div class="text-2xl font-bold"><?= $stats['my_students'] ?></div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Active Classes</div>
                    <div class="text-2xl font-bold"><?= $stats['total_classes'] ?></div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-4 border-b border-gray-200 font-semibold">Upcoming Schedule</div>
            <div class="p-8 text-center text-gray-500 italic">
                No classes scheduled for today.
            </div>
        </div>
    </main>
</body>
</html>

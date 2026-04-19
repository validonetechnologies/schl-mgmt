<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; // Assuming sidebar is extracted ?>
    <!-- For this demo I'll use a simplified layout or just the content -->
    <main class="flex-grow p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">School Classes</h1>
            <a href="/<?= $_SESSION['current_slug'] ?>/classes/create" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Add Class
            </a>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="p-4 font-semibold text-gray-600">Class Name</th>
                        <th class="p-4 font-semibold text-gray-600">Level</th>
                        <th class="p-4 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $class): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="p-4"><?= htmlspecialchars($class['class_name']) ?></td>
                        <td class="p-4"><?= htmlspecialchars($class['numeric_level']) ?></td>
                        <td class="p-4">
                            <a href="/<?= $_SESSION['current_slug'] ?>/classes/delete/<?= $class['id'] ?>"
                               class="text-red-600 hover:text-red-800"
                               onclick="return confirm('Delete this class?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

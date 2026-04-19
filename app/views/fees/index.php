<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fees - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; ?>
    <main class="flex-grow p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold">Fee Management</h1>
            <a href="/<?= $_SESSION['current_slug'] ?>/fees/create" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
                + Create Fee Structure
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="p-4 font-semibold text-gray-600">Fee Name</th>
                        <th class="p-4 font-semibold text-gray-600">Amount</th>
                        <th class="p-4 font-semibold text-gray-600">Due Date</th>
                        <th class="p-4 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fees as $fee): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="p-4"><?= htmlspecialchars($fee['fee_name']) ?></td>
                        <td class="p-4">$<?= number_format($fee['amount'], 2) ?></td>
                        <td class="p-4"><?= $fee['due_date'] ?></td>
                        <td class="p-4">
                            <a href="/<?= $_SESSION['current_slug'] ?>/fees/edit/<?= $fee['id'] ?>" class="text-indigo-600 mr-3">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>

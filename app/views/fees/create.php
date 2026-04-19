<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Fee - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; ?>
    <main class="flex-grow p-8">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-sm border border-gray-200">
            <h1 class="text-2xl font-bold mb-6">Create Fee Structure</h1>
            <form action="/<?= $_SESSION['current_slug'] ?>/fees/create" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fee Name</label>
                    <input type="text" name="fee_name" required class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Tuition Fee - Grade 10">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" step="0.01" name="amount" required class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500" placeholder="1500.00">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Due Date</label>
                    <input type="date" name="due_date" class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500" rows="3"></textarea>
                </div>
                <div class="flex justify-end gap-4">
                    <a href="/<?= $_SESSION['current_slug'] ?>/fees" class="px-4 py-2 text-gray-600 hover:text-gray-800">Cancel</a>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">Save Fee</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

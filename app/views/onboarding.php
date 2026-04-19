<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Started - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">S</div>
            <h1 class="text-2xl font-bold text-gray-900">Register Your School</h1>
            <p class="text-gray-500">Create your account to get started</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="mb-6 p-3 bg-red-100 text-red-700 rounded-lg text-sm border border-red-200">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/onboarding/register" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Name</label>
                <input type="text" name="school_name" id="school_name" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="Green Valley International">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">School Slug (Unique URL)</label>
                <div class="flex items-center">
                    <span class="bg-gray-100 text-gray-500 px-3 py-3 rounded-l-lg border border-r-0 border-gray-300 text-sm">schl-mgmt.voapps.win/</span>
                    <input type="text" name="slug" id="slug" required
                           class="w-full p-3 rounded-r-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="green-valley">
                </div>
            </div>

            <hr class="my-6 border-gray-100">

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Name</label>
                <input type="text" name="admin_name" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="John Doe">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Admin Email</label>
                <input type="email" name="email" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="admin@school.com">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="••••••••">
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                Create School Account
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="/" class="text-sm text-gray-500 hover:text-indigo-600 transition">← Back to Home</a>
        </div>
    </div>

    <script>
        // Auto-generate slug from school name
        document.getElementById('school_name').addEventListener('input', function(e) {
            const slug = e.target.value
                .toLowerCase()
                .replace(/[^a-z0-9 ]/g, '')
                .replace(/\s+/g, '-');
            document.getElementById('slug').value = slug;
        });
    </script>
</body>
</html>

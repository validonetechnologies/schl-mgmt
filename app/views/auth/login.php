<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= htmlspecialchars($slug ?? 'School') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">S</div>
            <h1 class="text-2xl font-bold text-gray-900">Welcome Back</h1>
            <p class="text-gray-500">Login to your school portal</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="mb-6 p-3 bg-red-100 text-red-700 rounded-lg text-sm border border-red-200">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <form action="/<?= $slug ?? '' ?>/login" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="name@school.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full p-3 rounded-lg border border-gray-300 outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="••••••••">
            </div>
            <button type="submit" class="w-full py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                Sign In
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="/" class="text-sm text-gray-500 hover:text-indigo-600 transition">← Return to Main Site</a>
        </div>
    </div>
</body>
</html>

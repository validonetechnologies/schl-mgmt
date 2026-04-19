<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - <?= htmlspecialchars($school['name']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; ?>
    <main class="flex-grow p-8">
        <div class="max-w-4xl mx-auto">
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">School Settings</h1>
                <p class="text-gray-500">Configure your school's identity and third-party integrations.</p>
            </header>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-200"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg border border-red-200"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <form action="/<?= $_SESSION['current_slug'] ?>/settings/save" method="POST" enctype="multipart/form-data" class="space-y-8">

                <!-- Section 1: Branding -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center"><i class="fa-solid fa-palette"></i></div>
                        <h2 class="text-xl font-semibold">General Branding</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">School Name</label>
                            <input type="text" name="school_name" value="<?= htmlspecialchars($school['name']) ?>"
                                   class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">School Logo</label>
                            <div class="flex items-center gap-4">
                                <input type="file" name="logo" class="text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <?php if ($school['logo']): ?>
                                    <img src="storage/uploads/<?= $school['logo'] ?>" class="w-12 h-12 rounded-full object-cover border">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Razorpay -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center"><i class="fa-solid fa-credit-card"></i></div>
                        <h2 class="text-xl font-semibold">Razorpay Integration</h2>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Key ID</label>
                            <input type="text" name="razorpay_key_id" value="<?= htmlspecialchars($settings['razorpay_key_id'] ?? '') ?>"
                                   class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="rzp_test_...">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Key Secret</label>
                            <input type="password" name="razorpay_key_secret" value="<?= htmlspecialchars($settings['razorpay_key_secret'] ?? '') ?>"
                                   class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="••••••••">
                        </div>
                    </div>
                </div>

                <!-- Section 3: WhatsApp -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center"><i class="fa-brands fa-whatsapp"></i></div>
                        <h2 class="text-xl font-semibold">WhatsApp Cloud API</h2>
                    </div>
                    <div class="grid gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Permanent Access Token</label>
                            <input type="password" name="whatsapp_api_key" value="<?= htmlspecialchars($settings['whatsapp_api_key'] ?? '') ?>"
                                   class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="EAAG...">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                        Save All Settings
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - SchlMgmt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <?php include 'app/views/sidebar.php'; ?>
    <main class="flex-grow p-8">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Administrative Overview</h1>
            <div class="text-sm text-gray-500">Last updated: <?= date('H:i') ?></div>
        </header>

        <!-- KPI Cards -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Total Students</div>
                    <div class="text-2xl font-bold"><?= $stats['total_students'] ?></div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Total Teachers</div>
                    <div class="text-2xl font-bold"><?= $stats['total_teachers'] ?></div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center text-xl">
                    <i class="fa-solid fa-money-bill"></i>
                </div>
                <div>
                    <div class="text-sm text-gray-500">Total Revenue</div>
                    <div class="text-2xl font-bold">$<?= number_format($stats['total_revenue'], 2) ?></div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold mb-4">Revenue Trend</h3>
                <canvas id="revenueChart" height="200"></canvas>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                <h3 class="text-lg font-semibold mb-4">Student Distribution</h3>
                <canvas id="studentChart" height="200"></canvas>
            </div>
        </div>

        <script>
            // Revenue Chart
            new Chart(document.getElementById('revenueChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Monthly Revenue ($)',
                        data: [1200, 1900, 3000, 2500, 2000, 2300],
                        borderColor: '#4f46e5',
                        tension: 0.4,
                        fill: true,
                        backgroundColor: 'rgba(79, 70, 229, 0.1)'
                    }]
                }
            });

            // Student Chart
            new Chart(document.getElementById('studentChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Active', 'Graduated', 'Dropped'],
                    datasets: [{
                        data: [85, 10, 5],
                        backgroundColor: ['#4f46e5', '#10b981', '#ef4444']
                    }]
                }
            });
        </script>
    </main>
</body>
</html>

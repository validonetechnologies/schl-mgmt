<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SchlMgmt - Modern School Management SaaS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-900 font-sans">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">S</div>
                    <span class="text-xl font-bold tracking-tight text-gray-900">SchlMgmt</span>
                </div>
                <div class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-600">
                    <a href="#features" class="hover:text-indigo-600 transition">Features</a>
                    <a href="#pricing" class="hover:text-indigo-600 transition">Pricing</a>
                    <a href="#about" class="hover:text-indigo-600 transition">About</a>
                    <a href="#contact" class="hover:text-indigo-600 transition">Contact</a>
                    <a href="/onboarding" class="bg-indigo-600 text-white px-5 py-2 rounded-full hover:bg-indigo-700 transition">Get Started</a>
                </div>
                <div class="md:hidden">
                    <button class="p-2 text-gray-600"><i class="fa-solid fa-bars text-xl"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 tracking-tight">
                Empower Your School with <span class="text-indigo-600">Smart Management</span>
            </h1>
            <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
                The all-in-one SaaS platform to manage students, staff, fees, and communication. Simple, scalable, and designed for modern education.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/onboarding" class="px-8 py-4 bg-indigo-600 text-white rounded-xl font-semibold text-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">Start Free Trial</a>
                <a href="#features" class="px-8 py-4 bg-white text-gray-700 border border-gray-200 rounded-xl font-semibold text-lg hover:bg-gray-50 transition">View Features</a>
            </div>
            <div class="mt-16 relative max-w-5xl mx-auto">
                <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl blur opacity-20"></div>
                <img src="https://images.unsplash.com/photo-1522202176988-662338767882?auto=format&fit=crop&w=1200&q=80" alt="Dashboard Preview" class="relative rounded-2xl shadow-2xl border border-gray-200">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Everything You Need to Run Your School</h2>
                <p class="text-gray-600">Powerful tools to automate administration and improve learning outcomes.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="p-8 rounded-2xl border border-gray-100 bg-gray-50 hover:border-indigo-200 transition group">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition">
                        <i class="fa-solid fa-users-gear text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Student Management</h3>
                    <p class="text-gray-600">Complete lifecycle tracking from admission to graduation with automated records.</p>
                </div>
                <!-- Feature 2 -->
                <div class="p-8 rounded-2xl border border-gray-100 bg-gray-50 hover:border-indigo-200 transition group">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition">
                        <i class="fa-solid fa-credit-card text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Fee & Payment Tracking</h3>
                    <p class="text-gray-600">Automated fee structures with Razorpay integration for seamless online payments.</p>
                </div>
                <!-- Feature 3 -->
                <div class="p-8 rounded-2xl border border-gray-100 bg-gray-50 hover:border-indigo-200 transition group">
                    <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition">
                        <i class="fa-brands fa-whatsapp text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">WhatsApp Alerts</h3>
                    <p class="text-gray-600">Instant communication with parents and students for attendance and announcements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-gray-600">Choose the plan that fits your school's scale.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Basic -->
                <div class="p-8 bg-white rounded-2xl border border-gray-200 flex flex-col">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Starter</h3>
                    <div class="text-4xl font-bold mb-6">$49<span class="text-base font-normal text-gray-500">/mo</span></div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Up to 500 Students</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Basic Fee Management</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Email Alerts</li>
                    </ul>
                    <a href="/onboarding" class="block text-center py-3 border border-indigo-600 text-indigo-600 rounded-xl font-semibold hover:bg-indigo-50 transition">Get Started</a>
                </div>
                <!-- Pro -->
                <div class="p-8 bg-white rounded-2xl border-2 border-indigo-600 relative flex flex-col shadow-xl scale-105">
                    <div class="absolute top-0 right-0 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">MOST POPULAR</div>
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Professional</h3>
                    <div class="text-4xl font-bold mb-6">$149<span class="text-base font-normal text-gray-500">/mo</span></div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Up to 2000 Students</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Full Payment Gateway</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> WhatsApp Integration</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Priority Support</li>
                    </ul>
                    <a href="/onboarding" class="block text-center py-3 bg-indigo-600 text-white rounded-xl font-semibold hover:bg-indigo-700 transition">Get Started</a>
                </div>
                <!-- Enterprise -->
                <div class="p-8 bg-white rounded-2xl border border-gray-200 flex flex-col">
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Enterprise</h3>
                    <div class="text-4xl font-bold mb-6">Custom</div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Unlimited Students</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Custom Domain Setup</li>
                        <li class="flex items-center gap-3 text-gray-600"><i class="fa-solid fa-check text-green-500"></i> Dedicated Account Manager</li>
                    </ul>
                    <a href="#contact" class="block text-center py-3 border border-indigo-600 text-indigo-600 rounded-xl font-semibold hover:bg-indigo-50 transition">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2">
                <img src="https://images.unsplash.com/photo-1523050853063-91589464276d?auto=format&fit=crop&w=800&q=80" alt="About us" class="rounded-2xl shadow-lg">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold mb-6">Bridging the Gap between Education and Technology</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    SchlMgmt was born out of the need for a lightweight yet powerful ERP system that doesn't require a technical team to manage. We believe that educators should spend more time teaching and less time on paperwork.
                </p>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Our platform is designed to be multi-tenant, ensuring that each school has its own secure, isolated environment while benefiting from a robust, centrally managed cloud infrastructure.
                </p>
                <div class="flex gap-6">
                    <div>
                        <div class="text-3xl font-bold text-indigo-600">500+</div>
                        <div class="text-sm text-gray-500">Schools Joined</div>
                    </div>
                    <div class="border-l border-gray-200 pl-6">
                        <div class="text-3xl font-bold text-indigo-600">100k+</div>
                        <div class="text-sm text-gray-500">Students Managed</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Ready to Modernize Your School?</h2>
            <div class="max-w-xl mx-auto bg-white text-gray-900 p-8 rounded-2xl shadow-2xl">
                <form action="#" method="POST" class="grid gap-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" placeholder="Full Name" class="p-3 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <input type="email" placeholder="Email Address" class="p-3 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <input type="text" placeholder="School Name" class="p-3 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-indigo-500" required>
                    <textarea placeholder="How can we help you?" rows="4" class="p-3 rounded-lg border border-gray-200 outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                    <button type="submit" class="py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-10 border-t border-gray-100 bg-white text-center text-gray-500 text-sm">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; 2026 SchlMgmt SaaS. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>

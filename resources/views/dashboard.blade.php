<x-app-layout>

    <section id="hero" class="relative bg-cover bg-center h-screen flex items-center mb-8"
        style="background-image: url('images/PerpustakaanMuka.jpg');">
        <div class="container mx-auto lg:text-left px-6 max-w-7xl sm:px-6 lg:px-8 py-6">
            <h1 class="text-8xl font-bold">
                Welcome to <span class="text-blue-700">PerpusKu</span>
            </h1>
            <div class="flex space-x-4 mt-6">
                <a href="#about" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-700">
                    Get Started
                </a>
            </div>
        </div>
    </section>

    <div class="w-full max-w-5xl px-6 m-auto">
        <section class="text-center py-16">
            <h2 class="text-3xl font-bold">Remarkable Achievements</h2>
            <p class=" mt-2">
                Discover how our UI Tools have transformed web development. These achievements showcase our dedication
                to innovation and our community's growth.
            </p>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="text-2xl font-bold flex items-center gap-2">
                    <span>👥</span>
                    <span>2.6M+</span>
                </div>
                <p class=" mt-2">Community Members</p>
                <p class="text-sm text-gray-500 mt-1">Join our community of developers and designers</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="text-2xl font-bold flex items-center gap-2">
                    <span>⬇️</span>
                    <span>8.6M+</span>
                </div>
                <p class=" mt-2">Cumulative Downloads</p>
                <p class="text-sm text-gray-500 mt-1">Based on Material Tailwind and Creative Tim Products</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="text-2xl font-bold flex items-center gap-2">
                    <span>⭐</span>
                    <span>48,000+</span>
                </div>
                <p class=" mt-2">Github Cumulative Stars</p>
                <p class="text-sm text-gray-500 mt-1">On 100+ Open Source Repositories and Projects</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <div class="text-2xl font-bold flex items-center gap-2">
                    <span>📦</span>
                    <span>280,000+</span>
                </div>
                <p class=" mt-2">Monthly NPM Downloads</p>
                <p class="text-sm text-gray-500 mt-1">Including React, HTML, Tailwind CSS and more.</p>
            </div>
        </div>
    </div>

    <section class="container mx-auto flex flex-col md:flex-row items-center py-16 px-6">
        <!-- Left: Image -->
        <div class="w-full md:w-1/2">
            <img src="images/image-1.jpeg" alt="Office" class="rounded-lg shadow-md">
        </div>

        <!-- Right: Content -->
        <div class="w-full md:w-1/2 md:pl-12">
            <span class="text-blue-500 font-semibold uppercase">About</span>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Find Out More <span class="text-blue-500">About Us</span>
            </h2>
            <p class="text-gray-600 mt-4">
                Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>

            <div class="mt-6 space-y-4">
                <div class="flex items-start">
                    <div class="bg-blue-100 text-blue-500 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Ullamco laboris nisi ut aliquip consequat</h3>
                        <p class="text-gray-600">Magni facilis repellendus cum excepturi praesentium libero trade.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="bg-blue-100 text-blue-500 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Magnam soluta odio exercitationem</h3>
                        <p class="text-gray-600">Quo totam dolor ut pariatur distinctio laudantium illo direna.</p>
                    </div>
                </div>
            </div>

            <p class="text-gray-600 mt-6">
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore.
            </p>
        </div>
    </section>

    <section class="container mx-auto py-16 px-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800">Check Our <span class="text-blue-500">Services</span></h2>

        <!-- Service Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-10">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Nesciunt Mete</h3>
                <p class="text-gray-600 mt-2">Provident nihil minus qui consequatur non omnis maiores.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Eosle Commodi</h3>
                <p class="text-gray-600 mt-2">Ut autem aut autem non a. Sint sint sit facilis nam iusto.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Ledo Markt</h3>
                <p class="text-gray-600 mt-2">Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.</p>
            </div>

            <!-- Card 4 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Asperiores Commodit</h3>
                <p class="text-gray-600 mt-2">Non et minus omnis sed dolor esse consequatur cupiditate.</p>
            </div>

            <!-- Card 5 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Velit Doloremque</h3>
                <p class="text-gray-600 mt-2">Cumque et suscipit saepe maiores autem enim facilis.</p>
            </div>

            <!-- Card 6 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-center">
                    <div class="bg-blue-500 text-white p-4 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m-6-8h6m3 8a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mt-4">Dolori Architecto</h3>
                <p class="text-gray-600 mt-2">Hic molestias ea quibusdam eos. Fugiat enim doloremque.</p>
            </div>
        </div>
    </section>

    <section class="text-center py-16 px-6">
        <h1 class="text-4xl font-bold text-gray-900">Built for the Future of Development</h1>
        <p class="text-gray-500 mt-2 max-w-2xl mx-auto">
            Discover the difference our AI and Tailwind CSS features can bring to your web projects with solutions
            designed for today's coding needs.
        </p>
    </section>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About & Contact') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100">

        <div class="container mx-auto py-12 px-6">
            <h2 class="text-3xl font-bold text-center mb-6">Need Help? <span class="text-blue-600">Contact Us</span></h2>

            <div class="grid md:grid-cols-2 gap-6 bg-white p-8 rounded-lg shadow-md items-stretch">
                <!-- Kolom Kiri -->
                <div class="flex flex-col justify-between">
                    <div>
                        <div class="mb-6">
                            <h3 class="font-bold text-lg">Alamat</h3>
                            <p>Jl. Parangtritis No.KM.11, Dukuh, Sabdodadi, Kec. Bantul, Kabupaten Bantul, Daerah
                                Istimewa Yogyakarta 55715</p>
                        </div>
                        <div class="mb-6">
                            <h3 class="font-bold text-lg">Kontak</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                        <div class="mb-6">
                            <h3 class="font-bold text-lg">Email</h3>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18440.793665897527!2d110.35210944305766!3d-7.8882804136374585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sen!2sid!4v1739464216271!5m2!1sen!2sid"
                            class="w-full h-48 md:h-60 rounded-lg" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Kolom Kanan (Formulir) -->
                <div class="h-full">
                    <form class="space-y-4 flex flex-col h-full">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" placeholder="Your Name" class="w-full p-3 border rounded-lg">
                            <input type="email" placeholder="Your Email" class="w-full p-3 border rounded-lg">
                        </div>
                        <input type="text" placeholder="Subject" class="w-full p-3 border rounded-lg">
                        <textarea placeholder="Message" class="w-full p-3 border rounded-lg flex-grow"></textarea>
                        <button
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg w-full font-bold hover:bg-blue-700 mt-auto">Send
                            Message</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

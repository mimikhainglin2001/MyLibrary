<?php require_once APPROOT . '/views/inc/nav.php';?>

    <!-- "Contact Us" Banner Section -->
    <section class="bg-blue-900 text-white py-16 px-4 shadow-lg">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold">Contact Us</h1>
        </div>
    </section>

    <!-- Main Content Section (Contact Details and Form) -->
    <main class="container mx-auto my-8 p-6 bg-white rounded-lg shadow-xl">
        <div class="flex flex-col lg:flex-row lg:space-x-8 space-y-8 lg:space-y-0">

            <!-- Left Column: Contact Address & Contact Info -->
            <div class="lg:w-1/2 space-y-8">
                <!-- Contact Address -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Address</h2>
                    <div class="flex items-start space-x-3 text-gray-700">
                        <i class="fas fa-map-marker-alt text-xl text-blue-600 mt-1"></i>
                        <p class="text-lg">University Of Computer Studies Meiktila</p>
                    </div>
                </div>

                <!-- Contact Details (Phone & Email) -->
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact</h2>
                    <div class="flex items-center space-x-3 text-gray-700 mb-3">
                        <i class="fas fa-phone text-xl text-blue-600"></i>
                        <p class="text-lg">(+95)9967297362</p>
                    </div>
                    <div class="flex items-center space-x-3 text-gray-700">
                        <i class="fas fa-envelope text-xl text-blue-600"></i>
                        <p class="text-lg">ucsmtla20@edu.com</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Information Form -->
            <div class="lg:w-1/2">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Information</h2>
                <form class="space-y-4">
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-500 text-lg">
                    </div>
                    <div>
                        <label for="subject" class="sr-only">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject"
                               class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-500 text-lg">
                    </div>
                    <div>
                        <label for="message" class="sr-only">Message</label>
                        <textarea id="message" name="message" rows="6" placeholder="Message"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 placeholder-gray-500 text-lg resize-y"></textarea>
                    </div>
                    <button type="submit"
                            class="w-full sm:w-auto px-8 py-3 bg-blue-800 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 text-lg">
                        Send
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>

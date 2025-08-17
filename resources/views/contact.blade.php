<x-guest-layout>
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-3xl font-bold text-black">Contact Us</h1>
            <p class="text-gray-600 mt-2">We respond within 24 hours.</p>

            <div class="mt-8 grid md:grid-cols-2 gap-8">
                <div class="va-card p-6">
                    <h2 class="font-semibold text-lg text-black">Get in touch</h2>
                    <p class="text-gray-600 mt-2">Phone: 301 395 7085</p>
                    <p class="text-gray-600">Email: healthcare@Visitingangelshealth.com</p>
                    <p class="text-gray-600">Address: 15426  Bevanwood Dr, Woodbridge, VA, 22193-5716</p>
                </div>
                <form action="{{ route('contact.send') }}" method="POST" class="bg-white border rounded-xl p-6">
                    @csrf
                    <x-session-msg />
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-700">Name</label>
                            <input type="text" name="name" class="mt-1 w-full border rounded-lg p-2" required>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700">Email</label>
                            <input type="email" name="email" class="mt-1 w-full border rounded-lg p-2" required>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700">Phone</label>
                            <input type="text" name="phone" class="mt-1 w-full border rounded-lg p-2">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm text-gray-700">Message</label>
                        <textarea name="message" rows="5" class="mt-1 w-full border rounded-lg p-2" required></textarea>
                    </div>
                    <button class="va-btn mt-4">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>


<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
</script>

<template>
    <app-layout>
        <div class="container mx-auto mt-8">
            <div class="py-16 bg-white">
                <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                    <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                        <div class="md:5/12 lg:w-5/12">
                            <img src="https://tailus.io/sources/blocks/left-image/preview/images/startup.png"
                                 alt="image" loading="lazy" width="" height="">
                        </div>
                        <div class="md:7/12 lg:w-6/12">
                            <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">About Central Asian Unit
                                Library</h2>
                            <p class="mt-6 text-gray-600">Welcome to Central Asian Unit
                                Library, where the pursuit of
                                knowledge meets the convenience of the digital age. We are more than just a repository
                                of books, articles, and news; we are a dynamic platform dedicated to transforming the
                                way you explore, learn, and stay informed.</p>
                            <p class="mt-4 text-gray-600"> At Central Asian Unit
                                Library, our mission is to democratize
                                access to information and foster a global community of curious minds. We believe in the
                                power of knowledge to inspire, educate, and connect individuals, transcending
                                geographical boundaries and cultural differences.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <div class="bg-white p-4 rounded-lg shadow-xl py-8 mt-16">
                    <h4 class="text-4xl font-bold text-gray-800 tracking-widest uppercase text-center">What Sets Us
                        Apart</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 xl:gap-12 px-2 xl:px-12 mt-4">
                        <div class="flex space-x-8 mt-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-700">Diverse Collection:</h4>
                                <p class="text-gray-600 my-2">Our extensive collection spans across genres, disciplines,
                                    and perspectives. From classic literature to groundbreaking research, we curate
                                    content that caters to the varied interests of our diverse user base.</p>
                            </div>
                        </div>
                        <div class="flex space-x-8 mt-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-700">User-Friendly Interface:</h4>
                                <p class="text-gray-600 my-2">We understand the importance of a seamless user
                                    experience. Our intuitive interface ensures that navigating through our digital
                                    library is not just easy but enjoyable.</p>
                            </div>
                        </div>

                        <div class="flex space-x-8 mt-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-700">Quality Content:</h4>
                                <p class="text-gray-600 my-2">e prioritize quality over quantity, ensuring that every
                                    book, article, and news piece in our collection is carefully selected to meet high
                                    standards of relevance and excellence.</p>
                            </div>
                        </div>

                        <div class="flex space-x-8 mt-8">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-600" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-700">Community Building:</h4>
                                <p class="text-gray-600 my-2">Beyond being a digital library, we are a community of
                                    like-minded individuals passionate about the pursuit of knowledge. Join us in
                                    discussions, share your insights, and be part of a community that values
                                    intellectual curiosity.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white mt-6 pt-5 mb-6 flex items-center justify-center">
                <div class=" text-center">

                    <div class="font-medium max-w-xl text-xl">Join Us on this Journey.
                        Whether you're a voracious reader, a dedicated researcher, or someone who simply values staying
                        informed, Central Asian Unit Library invites you to join us on this exciting journey of
                        exploration and enlightenment. Discover, connect, and grow with us as we redefine the way
                        knowledge is accessed and shared in the digital era.
                    </div>
                </div>
            </div>


        </div>
    </app-layout>
</template>

<style scoped>

</style>

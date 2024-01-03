<template>
    <div>
        <div class="bg-white ">
            <Head title="Library" />

            <div class="relative bg-stone-900 border-b-2 border-gray-100 ">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    <div
                        class="flex justify-between items-center py-6 md:justify-start md:space-x-10">
                        <div class="lg:w-0 lg:flex-1">
                            <Link href="/" class="flex">
                                <img class="md:h-10 h-7" src="/images/logo.svg">
                            </Link>
                        </div>
                        <div class="-mr-2 -my-2 md:hidden">
                            <button @click="mobileMenuOpen = true" type="button"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <nav class="hidden md:flex space-x-10 text-white font-bold" style="z-index: 100">
                            <Link href="/"
                                  class="text-base leading-6  font-medium  transition ease-in-out duration-150">
                                Home
                            </Link>
                            <Link href="/explore"
                                  class="text-base leading-6 font-medium transition ease-in-out duration-150">
                                Explore
                            </Link>
                            <Link href="/about"
                                  class="text-base leading-6 font-medium transition ease-in-out duration-150">
                                About
                            </Link>
                            <Link href="/contact"
                                  class="text-base leading-6 font-medium transition ease-in-out duration-150">
                                Contact Us
                            </Link>
                            <Link :href="route('login')"
                                  class="text-base leading-6 font-medium transition ease-in-out duration-150">
                                Sign In
                            </Link>
                        </nav>
                    </div>
                </div>

                <div v-if="mobileMenuOpen"
                     class="absolute top-0 inset-x-0 z-50 transition transform origin-top-right md:hidden">
                    <div class="rounded-lg shadow-lg">
                        <div class=" shadow-xs bg-stone-800 divide-y-2 divide-gray-50">
                            <div class="pt-5 pb-6 px-5 space-y-6">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <img class="md:h-10 h-7" src="/images/logo.svg">
                                    </div>
                                    <div class="-mr-2">
                                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <nav class="grid row-gap-8 gap-5 font-bold text-white">
                                        <Link href="/">
                                            <MobileMenuButton>Home</MobileMenuButton>
                                        </Link>
                                        <Link href="/search">
                                            <MobileMenuButton>Search</MobileMenuButton>
                                        </Link>
                                        <Link href="/about">
                                            <MobileMenuButton>About</MobileMenuButton>
                                        </Link>
                                        <Link href="/contact">
                                            <MobileMenuButton>Contact Us</MobileMenuButton>
                                        </Link>
                                    </nav>
                                </div>
                            </div>
                            <div class="py-6 px-5 space-y-6">
                                <div class="space-y-6">
                                    <span class="w-full flex rounded-md shadow-sm">
                                        <a href="#"
                                           class="w-full flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                                           Register
                                        </a>
                                    </span>
                                    <p class="text-center text-base leading-6 font-medium text-gray-500">
                                        Have an account?
                                        <a href="#"
                                           class="text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150">
                                            LogIn
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="text-black bg-gray-100">
        <div class="">
            <slot></slot>
        </div>
    </div>
    <div class="flex bg-stone-900">
        <div class="mx-auto">
            <a href="https://coded.tj/" >
                <img class="h-12 my-5" src="/images/coded-white.svg">
            </a>
        </div>
    </div>

</template>

<script setup>

import {ref} from "vue";
import {Head, Link} from "@inertiajs/vue3";
import MobileMenuButton from "@/Components/custom/MobileMenuButton.vue";

const mobileMenuOpen = ref(false);


</script>

<style scoped>

</style>

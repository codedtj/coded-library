<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import SearchCard from "@/Components/SearchCard.vue";
import EyeIcon from "@/Components/Icon/EyeIcon.vue";
import DownloadIcon from "@/Components/Icon/DownloadIcon.vue";
</script>

<template>
    <app-layout>
        <!-- component -->
        <div class="bg-gray-100">
            <div class="container mx-auto">
                <div role="article" class="bg-gray-100  md:px-8">
                    <div class="px-4 xl:px-0 py-6">
                        <div class="flex flex-col lg:flex-row flex-wrap">
                            <div class="mt-4 lg:mt-0 lg:w-3/5">
                                <div>
                                    <h1 class="text-3xl ml-2 lg:ml-0 lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12">
                                        Find your book, article or author</h1>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="max-w-2xl mx-auto pb-10 px-4 md:px-0">
                        <form class="flex items-center">
                            <label for="voice-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  " placeholder="Book, Author or Article" required>

                            </div>
                            <button type="submit" class="inline-flex items-center py-2.5 px-3 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><svg class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>Search</button>
                        </form>
                    </div>
                    <div class="px-6 xl:px-0">
                        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 pb-6 gap-8">
                            <search-card>
                                <template #icon>
                                    <img class="bg-gray-200 p-2 mb-5 rounded-full h-16"
                                         src="/images/book.png" alt="home-1"/>
                                </template>
                                <template #title>
                                    Books
                                </template>
                                <template #description>
                                    Immerse yourself in a world of literary wonders with our vast collection of e-books.
                                    From timeless classics to contemporary masterpieces, our digital library caters to
                                    every literary taste. Enjoy the convenience of carrying an entire library in your
                                    pocket, with the ability to explore, download, and devour your favorite reads
                                    anytime, anywhere.
                                </template>
                                <template #button>
                                    See All Books
                                </template>
                            </search-card>
                            <search-card>
                                <template #icon>
                                    <img class="bg-gray-200 p-2 mb-5 rounded-full h-16"
                                         src="/images/article.png" alt="home-1"/>
                                </template>
                                <template #title>
                                    Articles
                                </template>
                                <template #description>
                                    Uncover thought-provoking insights and delve into a wealth of knowledge with our
                                    curated selection of articles. Our digital library brings you a diverse range of
                                    topics, from science and technology to arts and culture. Discover hidden gems and
                                    expand your understanding of the world through engaging and informative articles
                                    that cater to your intellectual curiosity.
                                </template>
                                <template #button>
                                    See All Articles
                                </template>
                            </search-card>
                            <search-card>
                                <template #icon>
                                    <img class="bg-gray-200 p-2 mb-5 rounded-full h-16"
                                         src="/images/news.png" alt="home-1"/>
                                </template>
                                <template #title>
                                    News
                                </template>
                                <template #description>
                                    Stay informed and up-to-date with the latest news from around the globe. Our news
                                    section provides a comprehensive overview of current affairs, featuring breaking
                                    headlines, in-depth analyses, and perspectives on a variety of topics. With a
                                    commitment to accuracy and timeliness, our digital library ensures you're always in
                                    the know.
                                </template>
                                <template #button>
                                    See All News
                                </template>
                            </search-card>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto mt-5">
            <div>
                <h1 class="text-center font-bold md:text-xl">-- Recent Resources --</h1>
            </div>

            <div class="flex">
                <div class="grid grid-cols-1 md:grid-cols-4 mt-8 mx-auto gap-x-7">
                    <div class="flex pb-7 ">
                        <div
                            class="!z-5 relative flex flex-col rounded-[20px] max-w-[300px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 shadow-2xl w-full !p-4 3xl:p-![18px] border  undefined">
                            <div class="h-full w-full">
                                <div class="relative w-full">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-direct/5432401/gx5NYqxBEeYsxbKwhHtkJg/wy300"
                                        class="mb-3 h-full w-full rounded-xl 3xl:h-full 3xl:w-full" alt="">
                                </div>
                                <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                                    <div class="mb-2">
                                        <p class="text-lg font-bold text-navy-700"> Abstract Colors </p>
                                        <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">By Esthera Jackson </p>

                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <eye-icon class="text-2xl"></eye-icon>
                                </span>
                                    </button>
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <download-icon class="text-2xl"></download-icon>
                                </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex pb-7 ">
                        <div
                            class="!z-5 relative flex flex-col rounded-[20px] max-w-[300px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 shadow-2xl w-full !p-4 3xl:p-![18px] border  undefined">
                            <div class="h-full w-full">
                                <div class="relative w-full">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-direct/5432401/gx5NYqxBEeYsxbKwhHtkJg/wy300"
                                        class="mb-3 h-full w-full rounded-xl 3xl:h-full 3xl:w-full" alt="">
                                </div>
                                <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                                    <div class="mb-2">
                                        <p class="text-lg font-bold text-navy-700"> Abstract Colors </p>
                                        <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">By Esthera Jackson </p>

                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <eye-icon class="text-2xl"></eye-icon>
                                </span>
                                    </button>
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <download-icon class="text-2xl"></download-icon>
                                </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex pb-7 ">
                        <div
                            class="!z-5 relative flex flex-col rounded-[20px] max-w-[300px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 shadow-2xl w-full !p-4 3xl:p-![18px] border  undefined">
                            <div class="h-full w-full">
                                <div class="relative w-full">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-direct/5432401/gx5NYqxBEeYsxbKwhHtkJg/wy300"
                                        class="mb-3 h-full w-full rounded-xl 3xl:h-full 3xl:w-full" alt="">
                                </div>
                                <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                                    <div class="mb-2">
                                        <p class="text-lg font-bold text-navy-700"> Abstract Colors </p>
                                        <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">By Esthera Jackson </p>

                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <eye-icon class="text-2xl"></eye-icon>
                                </span>
                                    </button>
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <download-icon class="text-2xl"></download-icon>
                                </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex pb-7 ">
                        <div
                            class="!z-5 relative flex flex-col rounded-[20px] max-w-[300px] bg-white bg-clip-border shadow-3xl shadow-shadow-500 shadow-2xl w-full !p-4 3xl:p-![18px] border  undefined">
                            <div class="h-full w-full">
                                <div class="relative w-full">
                                    <img
                                        src="https://avatars.mds.yandex.net/get-direct/5432401/gx5NYqxBEeYsxbKwhHtkJg/wy300"
                                        class="mb-3 h-full w-full rounded-xl 3xl:h-full 3xl:w-full" alt="">
                                </div>
                                <div class="mb-3 flex items-center justify-between px-1 md:items-start">
                                    <div class="mb-2">
                                        <p class="text-lg font-bold text-navy-700"> Abstract Colors </p>
                                        <p class="mt-1 text-sm font-medium text-gray-600 md:mt-2">By Esthera Jackson </p>

                                    </div>
                                </div>

                                <div class="flex space-x-4">
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <eye-icon class="text-2xl"></eye-icon>
                                </span>
                                    </button>
                                    <button
                                        class="middle none relative h-10 max-h-[40px] w-10 max-w-[40px] rounded-lg bg-slate-700 text-center font-sans text-xs font-medium uppercase text-white shadow-md shadow-slate-700/20 transition-all hover:shadow-lg hover:shadow-slate-700/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button"
                                        data-ripple-light="true"
                                    >
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <download-icon class="text-2xl"></download-icon>
                                </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </app-layout>
</template>

<style scoped>

</style>

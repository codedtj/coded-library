<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {onMounted, ref} from "vue";
import SimplePaginationMoreButton from "@/Components/SimplePaginationMoreButton.vue";
import {Link} from "@inertiajs/vue3";
import DownloadIcon from "@/Components/Icon/DownloadIcon.vue";
import EyeIcon from "@/Components/Icon/EyeIcon.vue";
import PrimaryButton from "@/Components/custom/PrimaryButton.vue";


const {pagination, query} = defineProps({
    pagination: {
        type: Object,
    },
    query: {
        type: String,
        default: '',
    }
});

const resources = ref([]);
const q = ref(query);

onMounted(() => {
    resources.value = pagination?.data || [];
});


function addResources(newResources) {
    resources.value = [...resources.value, ...newResources];
}

function getTypeName(type) {
    const typeMap = {
        0: 'Book',
        1: 'Article',
        2: 'Video',
        3: 'Audio'
    };

    return typeMap[type] || '';
}
</script>

<template>
    <app-layout>
        <div class="container mx-auto text-white pt-5 pb-10">
            <div class="bg-white shadow-2xl md:mt-5 py-5 px-7 mx-3 rounded-2xl">
                <div class="bg-[url('/images/hero.png')] rounded-2xl">
                    <div class="py-12 px-5">
                        <h1 class="text-2xl font-bold ">Welcome to Coded Library</h1>
                        <h1 class="text-5xl font-bold mt-5 pb-10"><span class="text-red-600">BROWSE</span> OUR <br> POPULAR
                            BOOKS</h1>
                        <Link href="/explore"
                            class="bg-gradient-to-r from-purple-500 to-pink-500 mt-8 px-4 py-2 rounded-2xl hover:bg-gradient-to-r hover:from-sky-500 hover:to-indigo-500 font-bold">
                            Browse Now
                        </Link>
                    </div>
                </div>

                <div class="my-5">
                    <form :action="route('home')" class="md:flex items-center" method="get">
                        <label class="sr-only" for="voice-search">Search</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path clip-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          fill-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="query"
                                   v-model="q"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                   name="query"
                                   placeholder="Book, Author or Article"
                                   type="text">

                        </div>
                        <button
                            class="inline-flex items-center py-2.5 px-3 mt-3 md:mt-0 md:ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 w-full md:w-32 text-center"
                            type="submit">
                            <svg class="mr-2 -ml-1 w-5 h-5" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"></path>
                            </svg>
                            Search
                        </button>
                    </form>
                </div>

                <div class="bg-gray-100 shadow-2xl mt-7 rounded-2xl">
                    <div class="px-5 py-4">
                        <h1 class="text-2xl font-bold text-black">Most Popular <span class="text-purple-800">Right Now</span></h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 py-5 gap-3">
                            <div class="bg-white shadow-2xl rounded-2xl" v-for="resource in resources" :key="resource.id">
                                <div class="flex pt-4 ">
                                    <img class="h-52 w-64 bg-cover mx-auto  rounded-2xl" src="/images/hero.png">
                                </div>
                                <div class="px-5 pb-4 pt-2">
                                    <h1 class=" text-black truncate ">{{resource.title}}</h1>
                                    <p class="italic text-gray-700">Type: {{ getTypeName(resource.type) }}</p>
                                    <span
                                        class="inline-flex items-center gap-1 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 px-4 py-1 mt-2 text-xs text-white" v-if="resource.category">
                                        <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                                            {{resource.category.name}}
                                    </span>
                                    <div class="mt-3">
                                        <Link :href="route('public.resources.show', resource.id)">
                                            <primary-button>Learn More</primary-button>
                                        </Link>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination button-->
                <div class="flex justify-around mt-5">
                    <simple-pagination-more-button class="mx-auto mt-10" :url="route('home')"
                                                   @next-page-data-fetched="addResources"/>
                </div>


            </div>

            <div
                class="rounded-2xl bg-white backdrop-blur-lg bg-opacity-20 p-4 flex flex-col relative undefined w-full">

            </div>
        </div>

    </app-layout>
</template>

<style scoped>

</style>

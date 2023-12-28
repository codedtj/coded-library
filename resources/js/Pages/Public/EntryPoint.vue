<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { onMounted, ref} from "vue";
import SimplePaginationMoreButton from "@/Components/SimplePaginationMoreButton.vue";
import {Link} from "@inertiajs/vue3";


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
    if(pagination?.data?.length > 0)
        resources.value = [...pagination.data];
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
        <div class="flex flex-row justify-center items-center bg-app bg-center bg-no-repeat bg-cover" :class="{'min-h-screen': resources?.length === 0 }">
            <main
                class="flex flex-col lg:flex-row bg-white backdrop-filter backdrop-blur-lg bg-opacity-20 rounded-xl overflow-hidden w-full max-w-5xl shadow-lg m-4 lg:m-6">
                <div class="flex-1 p-4 lg:p-6">
                    <div class="text-lg text-white mb-8 flex items-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                  d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                                  fill-rule="evenodd"></path>
                        </svg>
                        <div class="ml-4 font-bold">Welcome to Central Asian Unit Library</div>
                    </div>
                    <div>
                        <div
                            class="rounded-2xl bg-white backdrop-blur-lg bg-opacity-20 p-4 flex flex-col relative undefined w-full">
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
                    </div>
                </div>
            </main>
        </div>

        <section ref="resultSection my-10">
            <div  v-if="resources.length > 0">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 tracking-normal lg:w-11/12 text-center m-10">Resources</h1>
                <!-- Resource list -->
                <div>
                    <div class="space-y-3 md:container mx-auto">
                        <div class="rounded-2xl" v-for="resource in resources" :key="resource.id" >
                            <Link :href="route('public.resources.show', resource.id)">
                                <div class="border p-4 rounded-lg shadow-lg bg-white">
                                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{resource.title}}</h2>
                                    <p class="text-gray-600">Author: {{resource.author}}</p>
                                    <p class="text-sm text-gray-500 mt-1 mb-2">Description: {{resource.description}}</p>
                                    <p class="italic text-gray-700">Type: {{ getTypeName(resource.type) }}</p>
                                    <span class="inline-block px-2 py-1 mt-2 text-xs font-semibold rounded bg-blue-100 text-blue-800" v-if="resource.category">
                                    {{resource.category.name}}
                                </span>
                                </div>
                            </Link>
                        </div>
                    </div>

                </div>
                <!-- Pagination button-->
                <div class="flex justify-around mt-5">
                    <simple-pagination-more-button class="mx-auto mt-10" :url="route('home')" @next-page-data-fetched="addResources"/>
                </div>
            </div>
        </section>
    </app-layout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500&display=swap');

* {
    font-family: 'Noto Sans JP', sans-serif;
}

.bg-app {
    background-image: url('https://www.goerlitz.de/uploads/01-Tourismus-Content/OLB_Goerlitz_Barockhaus_Publikationsfoto.jpg');
}
</style>

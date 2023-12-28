<script setup>

</script>

<template>
    <div role="cell" class="bg-gray-100">
        <div class="bg-white p-5 rounded-md relative h-full w-full">
            <!-- class="absolute inset-0 object-center object-cover h-full w-full"  -->
            <span>
                <slot name="icon"></slot>
            </span>
            <h1 class="pb-4 text-2xl font-semibold"><slot name="title"></slot></h1>
            <div class="my-5">
                <div class="flex items-center pb-4 dark:border-gray-700 cursor-pointer w-full space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12.5" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <h4 class="text-md text-gray-900"><slot name="description"></slot></h4>
                </div>
            </div>
            <a class="hover:text-indigo-500 hover:underline absolute bottom-5 text-sm text-indigo-700 font-bold cursor-pointer flex items-center" href="#">
                <p><slot name="button"></slot></p>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4338CA" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                        <line x1="15" y1="16" x2="19" y2="12" />
                        <line x1="15" y1="8" x2="19" y2="12" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</template>

<style scoped>

</style>

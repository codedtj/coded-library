<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SelectInput from "@/Components/SelectInput.vue";
import FilePicker from "@/Components/FilePicker.vue";

const {resource} = defineProps({
    resource: {
        type: Object,
    },
    categories: {
      type: Array,
      default: () => [],
    },
});

const form = useForm({
    id: resource?.id,
    title: resource?.title,
    author: resource?.author,
    year: resource?.year,
    description: resource?.description,
    published_in: resource?.published_in,
    language: resource?.language,
    category_id: resource?.category_id,
    is_public: resource?.is_public ?? false,
    type: resource?.type,
    file: null,
    _method: resource?.id ? 'PUT' : 'POST',
});

const submit = () => {
    const url = form.id ? route('resources.update', form.id) : route('resources.store');

    form.post(url, {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Book editor"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Book editor</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section class="max-w-xl">
                        <!--                        <header>-->
                        <!--                            <h2 class="text-lg font-medium text-gray-900">Update Password</h2>-->

                        <!--                            <p class="mt-1 text-sm text-gray-600">-->
                        <!--                                Ensure your account is using a long, random password to stay secure.-->
                        <!--                            </p>-->
                        <!--                        </header>-->
                        <form class="mt-6 space-y-6" @submit.prevent="submit">
                            <div>
                                <InputLabel for="title" value="Title"/>

                                <TextInput
                                    id="title"
                                    ref="titleInput"
                                    v-model="form.title"
                                    autocomplete="title"
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.title" class="mt-2"/>
                            </div>

                          <div>
                            <InputLabel for="file" value="Upload File"/>
                            <file-picker v-model="form.file" id="attachment"></file-picker>

                            <InputError :message="form.errors.file" class="mt-2"/>
                          </div>

                            <div>
                                <InputLabel for="author" value="Author"/>

                                <TextInput
                                    id="author"
                                    ref="authorInput"
                                    v-model="form.author"
                                    autocomplete="author"
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.author" class="mt-2"/>
                            </div>

                            <div>
                                <InputLabel for="description" value="Description"/>

                                <TextInput
                                    id="description"
                                    ref="descriptionInput"
                                    v-model="form.description"
                                    autocomplete="description"
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.description" class="mt-2"/>
                            </div>

                            <div>
                                <InputLabel for="published_in" value="Name of Journal/Book"/>

                                <TextInput
                                    id="published_in"
                                    ref="published_inInput"
                                    v-model="form.published_in"
                                    autocomplete="published_in"
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.published_in" class="mt-2"/>
                            </div>


                            <div>
                                <InputLabel for="year" value="Year"/>

                                <TextInput
                                    id="year"
                                    ref="yearInput"
                                    v-model="form.year"
                                    autocomplete="year"
                                    class="mt-1 block w-full"
                                    type="text"
                                />

                                <InputError :message="form.errors.year" class="mt-2"/>
                            </div>

                            <div>
                                <InputLabel for="type" value="Type"/>

                                <SelectInput
                                    id="type"
                                    ref="typeInput"
                                    v-model="form.type"
                                    autocomplete="type"
                                    class="mt-1 block w-full"
                                    type="text"
                                >
                                    <option :value="0">Book</option>
                                    <option :value="1">Article</option>
                                    <option :value="2">Video</option>
                                    <option :value="3">Audio</option>
                                </SelectInput>

                                <InputError :message="form.errors.type" class="mt-2"/>
                            </div>

                            <div>
                              <InputLabel for="category_id" value="Category"/>

                              <SelectInput
                                  id="category_id"
                                  ref="category_idInput"
                                  v-model="form.category_id"
                                  autocomplete="category_id"
                                  class="mt-1 block w-full"
                                  type="text"
                              >
                                <option v-for="category in categories" :value="category.id">{{category.name}}</option>
                              </SelectInput>

                              <InputError :message="form.errors.category_id" class="mt-2"/>
                            </div>

                            <div>
                                <InputLabel for="language" value="Language"/>

                                <SelectInput
                                    id="language"
                                    ref="languageInput"
                                    v-model="form.language"
                                    autocomplete="language"
                                    class="mt-1 block w-full"
                                    type="text"
                                >
                                    <option value="en">English</option>
                                    <option value="tj">Tajik</option>
                                    <option value="ru">Russian</option>
                                </SelectInput>

                                <InputError :message="form.errors.language" class="mt-2"/>
                            </div>

                            <div>
                                <InputLabel for="is_public" value="Is public?"/>

                                <input
                                    type="checkbox"
                                    id="is_public"
                                    ref="is_publicInput"
                                    v-model="form.is_public"
                                    autocomplete="is_public"
                                    class="mt-1 block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                />

                                <InputError :message="form.errors.is_public" class="mt-2"/>
                            </div>


                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition
                                    enter-active-class="transition ease-in-out"
                                    enter-from-class="opacity-0"
                                    leave-active-class="transition ease-in-out"
                                    leave-to-class="opacity-0"
                                >
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>

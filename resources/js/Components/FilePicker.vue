<template>
    <div
        :id="id"
        class="cfp">
        <div
            class="cfp-bgArea rounded-md bg-secondary-100"
            :class="{ 'cfp-active': isActive }"
            @dragover="setActive"
            @dragleave="cancelActive"
            @drop="fileAdded"
        >
            <div class="cfp-iconHolder cfp-gridItem">
                <slot name="icon">
                    <svg
                        slot="icon"
                        height="40"
                        viewBox="0 0 48 48"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M18 32h12v-12h8l-14-14-14 14h8zm-8 4h28v4h-28z"
                            fill="#CACFD2"
                        />
                    </svg>
                </slot>
            </div>
            <input
                id="cfp-filePicker"
                class="cfp-inputfile cfp-gridItem"
                type="file"
                name="cfp-filePicker"
                :accept="accept"
                :multiple="allowMultiple"
                @change="fileAdded"
            >
            <label
                class="cfp-label cfp-gridItem"
                for="cfp-filePicker"
            >
                <slot name="label">
                    <strong>Choose a file</strong> or drop it here
                </slot>
            </label>
        </div>
        <delete-button v-if="mFiles" class="my-3" @click="clearFiles">Clear</delete-button>
        <div class="mt-2 flex flex-wrap" v-if="mFiles">
            <tag class="mr-2 mb-2" v-for="file in mFiles">
                {{ file.name }}
            </tag>
        </div>
    </div>
</template>

<script>
import DeleteButton from "@/Components/DeleteButton.vue";
import Tag from "@/Components/Tag.vue";

export default {
    name: "FilePicker",
    components: {Tag, DeleteButton},
    props: {
        id: {
            type: String,
            required: true,
            default: 'filePicker'
        },
        accept: {
            type: String,
            default: '*/*'
        },
        allowMultiple: {
            type: Boolean,
            default: false
        }
    },
    data: function () {
        return {
            isActive: false,
            mFiles: null
        }
    },
    computed: {
        requiresTypeCheck: function () {
            return this.accept !== '*/*'
        },
        acceptedTypes: function () {
            return this.accept.split(',')
        }
    },
    methods: {
        cancelHandlers(e) {
            e.preventDefault()
            e.stopPropagation()
        },
        setActive(e) {
            this.isActive = true
            this.cancelHandlers(e)
        },
        cancelActive(e) {
            this.isActive = false
            this.cancelHandlers(e)
        },
        fileAdded(e) {
            this.isActive = false
            this.cancelHandlers(e)
            const wasDropped = e.dataTransfer
            this.mFiles = wasDropped ? e.dataTransfer.files : e.target.files
            if (wasDropped && !this.allowMultiple && this.mFiles.length > 1)
                throw new Error('vue-file-picker: Multiple Files are not allowed')
            if (wasDropped && this.requiresTypeCheck) {
                for (var i = 0; i < this.mFiles.length; i++) {
                    if (this.acceptedTypes.indexOf(this.mFiles[i].type) === -1)
                        throw new Error('vue-file-picker: File type not allowed')
                }
            }

            if (this.mFiles.length === 0)
                this.mFiles = null

            if (this.allowMultiple)
                this.$emit('update:modelValue', this.mFiles)
            else this.$emit('update:modelValue', this.mFiles[0])
        },
        clearFiles() {
            this.mFiles = null
        }
    }
}
</script>

<style>
.cfp {
    /*display: flex;*/
    min-height: 100px;
}

.cfp-bgArea {
    transition: 0.3s;
    display: grid;
    grid-template-rows: 60% 40%;
    padding: 25px 10px;
    width: 100%;
    color: rgba(9, 18, 35, 0.59);
    text-align: center;
    background: #f3f4f6;
}

.cfp-inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
}

.cfp-gridItem {
    align-self: center;
    justify-self: center;
}

.cfp-label {
    cursor: pointer;
    text-align: center;
    font-size: 0.9rem;
}

.cfp-active {
    background-color: #D7DBDD;
    outline-color: #F2F3F4;
}

@media only screen and (max-width: 440px) {
    .cfp-bgArea {
        padding: 18px 10px;
        grid-template-rows: 50% 50%;
        grid-row-gap: 5px;
    }
}
</style>

<template>
    <slot>
        <primary-button v-if="!noDataLeft" @click="fetchData" :class="{ 'opacity-25': fetching || disabled}"
                          :disabled="fetching || disabled">
            More
        </primary-button>

        <c-action-message class="first-letter:capitalize" v-else :on="noDataLeft">no data left
        </c-action-message>
    </slot>
</template>

<script>
import {addQuestionMarkToUrl} from "@/Utils/stringHelper";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import CActionMessage from "@/Components/CActionMessage.vue";

export default {
    name: "SimplePaginationMoreButton",
    components: {PrimaryButton, CActionMessage},
    emits: ['nextPageDataFetching', 'nextPageDataFetched', 'noDataLeftToFetch'],
    props: {
        url: String,
        disabled: false,
        page: {
            type: Number,
            default: 1
        }
    },
    data() {
        return {
            mPage: this.page,
            fetching: false,
            noDataLeft: false
        }
    },
    methods: {
        fetchData() {
            this.fetching = true;
            this.mPage++;
            this.$emit('nextPageDataFetching', this.mPage)
            axios.get(this.fetchUrl).then(response => {
                    if (response?.data?.data?.length > 0)
                        this.$emit('nextPageDataFetched', response.data.data)
                    else {
                        this.$emit('noDataLeftToFetch', response.data.data)
                        this.noDataLeft = true
                    }
                }
            )
                .finally(() => this.fetching = false)
        },
        reset() {
            this.mPage = 1;
            this.noDataLeft = false;
        }
    },
    computed: {
        fetchUrl() {
            let url = addQuestionMarkToUrl(this.url);
            url += '&page=' + this.mPage;
            return url;
        }
    },
    watch: {
        url() {
            this.reset()
        }
    }
}
</script>

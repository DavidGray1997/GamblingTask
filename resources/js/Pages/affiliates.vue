<template>
    <Head title="Dashboard"/>
    <div class="p-10 font-bold text-3xl bg-gray-800 text-white"> Gambling.com</div>
    <div class="p-6 bg-gray-800 text-white">
        <div class="mb-4 flex justify-between items-center">

            <div class="flex space-x-2">
                <button
                    @click="sortBy(this.sortDirection,'affiliate_id')"
                    class="px-4 py-2 bg-gray-200 text-black rounded-md hover:bg-gray-300"
                >
                    Sort by Affiliate ID
                </button>

                <button
                    v-on:click="sortBy(this.sortDirection, 'name')"
                    class="px-4 py-2 bg-gray-200 text-black rounded-md hover:bg-gray-300"
                >
                    Sort by Name
                </button>

            </div>
        </div>
    </div>

    <Affiliates-List-Page :sorted-results="this.sortedResults"></Affiliates-List-Page>

</template>

<script>

import AffiliatesListPage from '/resources/js/Pages/AffiliatesListPage.vue';

export default {
    name: "affiliates",
    props: {
        filteredAffiliates: Object
    },
    components: {
        AffiliatesListPage
    },

    data() {
        return {
            searchValues: {
                'name': ''
            },
            sortDirection: 'asc',
            sortedResults: []


        }
    },

    mounted() {
        this.sortedResults = this.filteredAffiliates
    },

    methods: {
        sortBy(sortDirection, column) {
            this.sortedResults = _.orderBy(this.filteredAffiliates, column, sortDirection)
            this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
        },
    }

}
</script>


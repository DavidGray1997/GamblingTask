<template>
    <Head title="Dashboard"/>
    <div class="p-10 font-bold text-3xl bg-gray-800 text-white"> Gambling.com</div>
    <div class="p-6 bg-gray-800 text-white">
        <div class="mb-4 flex justify-between items-center">

            <div class="flex space-x-2">

                <input class="text-black" type="text" v-model="filterName" placeholder="Filter by name"
                       @input="filterData"/>

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
        <Affiliates-List-Page :sorted-results="this.sortedResults"></Affiliates-List-Page>
    </div>

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
            filterName: '',
            sortedResults: [],
            filteredData: []
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

        filterData() {
            if (!this.filterName) {
                this.sortedResults = this.filteredAffiliates;
            } else {
                this.sortedResults = this.sortedResults.filter(item => {
                    return item.name.toLowerCase().includes(this.filterName.toLowerCase());
                    return false;
                });
            }
        }
    },
    created() {
        this.filterData();
    }

}
</script>


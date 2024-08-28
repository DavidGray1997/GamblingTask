<template>
    <Head title="Dashboard"/>
    <div class="p-10 font-bold text-3xl bg-gray-800 text-white"> Gambling.com</div>

    <Affiliates-List-Page :sorted-results="sortedResults"></Affiliates-List-Page>

</template>

<script>

import AffiliatesListPage from '/resources/js/Pages/AffiliatesListPage.vue';

export default {
    name: "affiliates",
    props: {
        sortedResults: Object
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
        }
    },

    methods: {
        sortBy(sortDirection, column) {
            return _.orderBy(this.sortedResults, 'column', 'desc')
        }
    },

    computed: {
        filteredList() {
            return this.filterAray(this.sortedResults, this.searchValues, this.options)
        },

        sortedList: function () {
            return this.sortArray(this.filteredList, this.sortBy, this.sortDirection)
        }
    }

}
</script>


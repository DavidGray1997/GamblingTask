<template #body>
    <div class="p-6 bg-gray-800 text-white">
        <div class="mb-4 flex justify-between items-center">

            <div class="flex space-x-2">
                <button
                    @click="sortBy(this.sortDirection,'affiliate_id')"
                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"
                >
                    Sort by Affiliate ID
                </button>

                <button
                    v-on:click="sortBy(this.sortDirection, 'name')"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                >
                    Sort by Name
                </button>

            </div>
        </div>

        <table class="min-w-full divide-y divide-white border">
            <thead class="bg-gray-50 bg-gray-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    Affiliate ID
                </th>

                <th class="px-6 py-3 text-left text-xs font-mediumuppercase tracking-wider">
                    Name
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">

            <tr class="bg-gray-800 text-white" v-for="item in this.data">
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">{{ item.affiliate_id }}</td>
            </tr>

            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    name: "affiliates",
    props: {
        sortedResults: Object
    },

    data() {
        return {
            searchValues: {
                'name': ''
            },
            sortDirection: 'asc',
            data: []


        }
    },

    mounted() {
        this.data = this.sortedResults
    },

    methods: {
        sortBy(sortDirection, column) {
            this.data = _.orderBy(this.sortedResults, column, sortDirection)
            this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
        },

    }
}
</script>

<style scoped>

</style>

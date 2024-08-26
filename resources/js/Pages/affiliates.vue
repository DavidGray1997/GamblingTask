<template>
    <div class="p-6">
        <div class="mb-4 flex justify-between items-center">
<!--            <input-->
<!--                type="text"-->
<!--                v-model="searchTerm"-->
<!--                placeholder="Filter by name..."-->
<!--                class="p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"-->
<!--            />-->

            <div class="flex space-x-2">
<!--                <button-->
<!--                    v-on:click="sortBy('name')"-->
<!--                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600"-->
<!--                >-->
<!--                    Sort by Name-->
<!--                </button>-->
<!--                <button-->
<!--                    @click="sortBy('affiliate_id')"-->
<!--                    class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600"-->
<!--                >-->
<!--                    Sort by Affiliate ID-->
<!--                </button>-->
            </div>
        </div>

        <table class="min-w-full divide-y divide-white border">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium bg-gray-800 text-white uppercase tracking-wider">
                    Name
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium bg-gray-800 text-white uppercase tracking-wider">
                    Affiliate ID
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">


            <tr v-for="item in sortedResults">
                <td class="px-6 py-4 whitespace-nowrap text-sm bg-gray-800 text-white">{{ item.name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm bg-gray-800 text-white">{{ item.affiliate_id }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import {computed, ref} from "vue";

const searchTerm = ref('');
const sortKey = ref('name');
const sortDirection = ref('asc');


function test(test) {
    console.log(test)
}

export default {
    name: "affiliates",
    props: {
        sortedResults: Object
    },

    data() {

        function test() {

        }

        return {
            searchTerm,
            sortKey,
            sortDirection,
        }
    },


    methods: {
        // sortBy(key) {
        //     console.log("this is key", key);
        //     if (sortKey.value === key) {
        //         sortDirection.value = sortDirection.value === 'asc' ? 'desc' : 'asc';
        //     } else {
        //         sortKey.value = key;
        //         sortDirection.value = 'asc';
        //     }
        // },
        //
        //
        // filteredAndSortedItems() {
        //     let filtered = this.sortedResults.value.filter(item =>
        //         item.name.toLowerCase().includes(searchTerm.value.toLowerCase())
        //     );
        //
        //     return filtered.sort((a, b) => {
        //         if (sortDirection.value === 'asc') {
        //             return a[sortKey.value].localeCompare(b[sortKey.value]);
        //         } else {
        //             return b[sortKey.value].localeCompare(a[sortKey.value]);
        //         }
        //     });
        // }
    }

}
</script>

<style scoped>

</style>

<template #body>
    <div class=" min-h-screen p-6 bg-gray-800 text-white">

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

            <tr class="bg-gray-800 text-white" v-for="item in sortedResults">
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
}
</script>

<style scoped>

</style>

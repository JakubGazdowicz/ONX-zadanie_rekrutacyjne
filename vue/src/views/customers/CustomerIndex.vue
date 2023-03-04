<script setup>
    import useCustomers from "@/composables/customers";
    import { onMounted } from "vue";

    const { customers, getCustomers, destroyCustomer } = useCustomers();

    onMounted(() => getCustomers());
</script>

<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{ name: 'CustomerCreate' }" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded">New Customer</RouterLink>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">UserID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="customer in customers"
                        :key="customer.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                    >
                        <td class="px-6 py-4">{{ customer.id }}</td>
                        <td class="px-6 py-4">{{ customer.user_id }}</td>
                        <td class="px-6 py-4">{{ customer.name }}
                            <RouterLink
                                :to="{ name: 'CustomerEdit', params: { id: customer.id } }"
                                class="px-3 mx-4 py-2 bg-green-500 hover:bg-green-700 text-white rounded"
                            >Edit
                            </RouterLink>
                            <button
                                @click="destroyCustomer(customer.id)"
                                class="px-3 mx-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded"
                            >Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

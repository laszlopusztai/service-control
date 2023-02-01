<template>
    <div>
        <div class="flex items-center justify-between">
            <div>
                <h3>Autók</h3>
            </div>
            <div>
                <Link  href="/cars/create" class="button">Új autó</Link>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Rendszám</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Típus</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Létrehozva</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="car in cars" :key="cars.id">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ car.plate_number }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ car.type }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ car.created_at }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <Link :href="'cars/' + car.id" class="text-green-600 hover:text-green-900 ml-2">Mutat</Link>
                                    <button @click="destroy(car.id)" class="text-orange-600 hover:text-orange-900 ml-4">Töröl</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link, router} from '@inertiajs/vue3'

export default {
    name: "Index",
    components: {
        Link
    },
    props: {
        cars: Object
    },
    methods: {
        destroy(id) {
            router.delete('/cars/' + id)
        }
    }
}
</script>

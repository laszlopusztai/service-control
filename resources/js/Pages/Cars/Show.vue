<template>
    <div class="space-y-8">
        <div class="space-y-8 m:space-y-5">
            <h3>Autó megtekintése</h3>

            <div class="flex flex-wrap">
                <Tag v-for="tag in car.tags" :tag="tag">
                    {{ tag.name }}
                </Tag>
            </div>

            <div class="space-y-6 sm:space-y-5">
                    <div class="field">
                        <label for="plate_number">Rendszám</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="plate_number" id="type" v-model="car.plate_number" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm bg-gray-50" disabled/>
                        </div>
                    </div>

                    <div class="field">
                        <label for="type">Típus</label>
                        <div class="mt-1 sm:col-span-2 sm:mt-0">
                            <input type="text" name="type" id="type" v-model="car.type" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm bg-gray-50" disabled/>
                        </div>
                    </div>
            </div>
        </div>

        <div class="mt-8 mb-8">
            <h3>Szervizlapok</h3>
        </div>

        <div v-if="car.service_sheets.length" class="flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Megnevezés</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="sheet in car.service_sheets" :key="sheet.id">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ sheet.name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <div class="flex flex-wrap">
                                        <Tag v-for="tag in sheet.tags" :tag="tag">
                                            {{ tag.name }}
                                        </Tag>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <label>Nincsenek még szervizlapok.</label>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <Link href="/cars" class="ml-3 button">Vissza</Link>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';
import Tag from '../../_components/Tag.vue';

export default {
    name: "Show",
    props: {
        car: Object
    },
    components: {
        Link, Tag
    },
}
</script>

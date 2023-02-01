<template>
    <form class="space-y-8 divide-y divide-gray-200" @submit.prevent="submit">
            <div class="space-y-8 m:space-y-5">
                <h3>Új autó létrehozása</h3>

                <div class="space-y-6 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="field">
                            <label for="plate_number">Rendszám</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" name="plate_number" id="first-name" v-model="form.plate_number" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" required/>
                            </div>
                        </div>

                        <div class="field">
                            <label for="type">Típus</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <select id="type" name="type" v-model="form.type_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" required>
                                    <option v-for="(type, index) in types" :value="index">{{ type }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <Link type="button" href="/cars" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Mégsem</Link>
                    <button type="submit" class="button ml-3">Létrehoz</button>
                </div>
            </div>
        </form>
</template>

<script>
import {router, Link} from "@inertiajs/vue3";

export default {
    name: "Create",
    props: {
        carTypes : Object
    },
    components: {
        Link, router
    },
    data() {
        return {
            form: {
                plate_number: '',
                type_id: null,
            },
            types: this.carTypes
        }
    },
    methods: {
        submit() {
            router.post('/cars', this.form)
        }
    }
}
</script>

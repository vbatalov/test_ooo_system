<template>
    <div class="min-h-full" v-if="auth.user">
        <Disclosure as="nav" class="border-b border-gray-200 bg-white" v-slot="{ open }">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 justify-between">
                    <div class="flex">
                        <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                            <a v-for="item in navigation" :key="item.name" :href="item.href"
                               :class="[item.current ? 'border-indigo-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium']"
                               :aria-current="item.current ? 'page' : undefined"
                               @click="item.logout === true ? logout() : null">{{ item.name }}</a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">


                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <!-- Mobile menu button -->
                        <DisclosureButton
                            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <span class="absolute -inset-0.5"/>
                            <span class="sr-only">Open main menu</span>
                            <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true"/>
                            <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true"/>
                        </DisclosureButton>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="sm:hidden">
                <div class="space-y-1 pb-3 pt-2">
                    <DisclosureButton v-for="item in navigation" :key="item.name" as="a" :href="item.href"
                                      :class="[item.current ? 'border-indigo-500 bg-indigo-50 text-indigo-700' : 'border-transparent text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800', 'block border-l-4 py-2 pl-3 pr-4 text-base font-medium']"
                                      :aria-current="item.current ? 'page' : undefined"
                                      @click="item.logout === true ? logout() : null">{{ item.name }}
                    </DisclosureButton>
                </div>

            </DisclosurePanel>
        </Disclosure>

        <div class="py-10">
            <header>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                </div>
            </header>
            <main>
                <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
                    <router-view/>
                </div>
            </main>
        </div>
    </div>
    <div v-if="!auth.user">
        <router-view/>
    </div>
</template>

<script setup>
import {Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import {Bars3Icon, XMarkIcon} from '@heroicons/vue/24/outline'
import axios from "axios";
import router from "../router/index.js";

const navigation = [
    {name: 'Главная', href: '/'},
    {name: 'Настройки', href: '/settings'},
    {name: 'Выход', href: '#', logout: true},
]

function logout() {
    axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post("api/logout");
        location.reload();
    });
}

const auth = window.Laravel;
if (auth.user === false) {
    // console.log(router.currentRoute.value.fullPath);
    // if('/register' !== router.currentRoute.value.path) {
    //     // router.push("/login")
    // }
}
</script>

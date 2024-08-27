<script>
import axios from "axios";
import router from "../router/index.js";

export default {
    data() {
        return {
            email: null,
            password: null,
            repeat_password: null,
            message: null,
        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post("api/register", {
                    email: this.email,
                    password: this.password,
                    repeat_password: this.repeat_password,
                })
                    .then(this.redirectHome)
                    .catch(response => this.message = (response.response.data.message));
            });
        },
        redirectHome() {
            router.push("/");
        }
    }
}
</script>

<template>
    <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Create new account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input v-model="email" type="email" autocomplete="email" required
                               class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input v-model="password" type="password" required autocomplete="new-password"
                               class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Repeat
                            password</label>
                    </div>
                    <div class="mt-2">
                        <input v-model="repeat_password" type="password" required autocomplete="new-password"
                               class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>
                </div>

                <div>
                    <button type="button" @click.prevent="register"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Click for register
                    </button>
                </div>
            </form>

            <div class="text-red-400 font-semibold">
                {{ message }}
            </div>

            <p class="mt-10 text-center text-sm text-gray-500">
                Already have account?
                {{ ' ' }}
                <a href="/login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login now!</a>
            </p>
        </div>
    </div>
</template>


<template>
    <div class="flex  flex-1 flex-col justify-center px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                Update your avatar now!
            </h2>
        </div>

        <div class="my-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6">
                <div>
                    <div>
                        <span class="block mx-auto h-14 w-14 overflow-hidden rounded-full bg-gray-100">
                            <svg :class="photo == null ? '' : 'hidden'" class="h-full w-full text-gray-300"
                                 fill="currentColor" viewBox="0 0 24 24">
                              <path
                                  d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/>
                            </svg>

                        <img v-if="photo != null" :src="'storage/'+photo" alt="avatar">

                          </span>

                    </div>
                    <div class="mt-4">
                        <input ref="file" @change="updatePhoto" type="file"
                               class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"/>
                    </div>

                </div>

            </form>

            <div class="">
                <Message v-if="visible" severity="success" :life="3000">
                    Your new avatar look beautiful!
                </Message>
            </div>
            <div class="text-red-400 font-semibold">
                {{ message }}
            </div>

        </div>
    </div>
</template>
<script>
import axios from "axios";
import Message from 'primevue/message';

export default {
    data() {
        return {
            message: null,
            photo: null,
            visible: false,
        };
    },
    created() {
        this.getUserPhoto();
    },
    components: {
        Message
    },
    methods: {
        getUserPhoto() {
            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.get("api/user")
                    .then(response => {
                        this.photo = response.data.photo
                    })
            });
        },
        updatePhoto() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                const file = this.$refs.file.files[0];
                const formData = new FormData();
                formData.append("image", file, "image");

                axios.post("api/user", formData,)
                    .then(response => {
                        this.photo = response.data.patch;
                        this.visible = true;
                        this.message = null;
                    })
                    .catch(response => this.message = (response.response.data.message));
            })
        }
    },
}
</script>

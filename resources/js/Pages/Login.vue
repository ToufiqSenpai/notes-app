<template>
  <form class="max-w-sm bg-white m-auto h-max absolute top-0 bottom-0 left-0 right-0 rounded-lg p-4"
    @submit.prevent="form.post('/login')">
    <h1 className='text-2xl font-semibold text-center mb-3'>Login</h1>
    <div 
      class="w-full h-12 border-[1.5px] border-solid border-red-600 rounded-md mb-4 text-center leading-[48px] font-semibold text-red-600 text-lg"
      v-if="page.props.flash['loginError']"
    >
      {{ page.props.flash['loginError'] }}
    </div>
    <v-text-field variant="outlined" density="compact" label="Username" v-model="form.username"></v-text-field>
    <v-text-field type="password" variant="outlined" density="compact" label="Password" v-model="form.password"></v-text-field>
    <button class="h-10 text-center w-full bg-salmon text-white rounded-md">Sign In</button>
    <div class="text-sm mt-2 text-center text-slate-600">Don't have an account? 
      <Link href="/signup"><span class="text-sky-500 hover:underline cursor-pointer">Sign up</span></Link>
    </div>
  </form>
</template>
<style>
body {
  background-color: rgba(233, 237, 247, 255);
}
</style>
<script lang="ts" setup>
import { useForm, usePage, Link } from '@inertiajs/vue3'

const form = useForm({
  username: null,
  password: null
})

const page = usePage()
</script>
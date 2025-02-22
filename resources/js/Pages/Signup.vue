<template>
  <form class="max-w-sm bg-white  m-auto h-max absolute top-0 bottom-0 left-0 right-0 rounded-lg p-4"
    @submit.prevent="form.post('/signup')">
    <h1 className='text-2xl font-semibold text-center mb-3'>Sign Up</h1>
    <v-text-field 
      variant="outlined" 
      density="compact" 
      label="Username" 
      v-model="form.username"
      :errorMessages="form.errors.username"
    ></v-text-field>
    <v-text-field 
      type="password"
      variant="outlined" 
      density="compact" 
      label="Password" 
      v-model="form.password" 
      :errorMessages="form.errors.password"
    ></v-text-field>
    <button class="h-10 text-center w-full bg-salmon text-white rounded-md">Submit</button>
  </form>
</template>
<style>
body {
  background-color: rgba(233, 237, 247, 255);
}
</style>
<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  username: null,
  password: null
})
</script>
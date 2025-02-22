<template>
  <v-app-bar density="compact" elevation="0">
    <template v-slot:prepend>
      <v-app-bar-nav-icon v-if="mobile"></v-app-bar-nav-icon>
      <v-text-field 
        class="ml-1 mt-2" 
        variant="underlined" 
        density="compact" 
        :style="{ width: `${title.length ? FONT_WIDTH * title.length : FONT_WIDTH}px` }"
        v-model="title"
        v-if="isEdited"
        @focusout="router.patch(`/notes/${note.id}`, { title }, { onSuccess: () => router.visit('/') })"
      />
      <!-- <input ref="inputEl" /> -->
      <h1 class="ml-1 text-[20px]" v-if="!isEdited">{{ title }}</h1>
      <span @click="onEditBtnClick">
        <v-icon icon="edit" size="24px" class="cursor-pointer ml-1" />
      </span>
    </template>
    <template v-slot:append>
      <button class="h-9 bg-salmon px-4 rounded-lg text-white" id="add-notes-btn">Add Notes</button>
    </template>
  </v-app-bar>
</template>
<style scoped>
.v-text-field >>> input {
  font-size: 20px;
}
</style>
<script setup lang="ts">
import { ref } from 'vue'
import { useDisplay } from 'vuetify'
import { router } from '@inertiajs/vue3';

const FONT_WIDTH = 14 // Pixel

const { mobile } = useDisplay()
const { note } = defineProps({ note: Object })

const title = ref(note?.title ?? '')
const isEdited = ref(false)

function onEditBtnClick() {
  isEdited.value = !isEdited.value
}
</script>
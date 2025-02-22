<template>
  <v-card>
    <v-layout>
      <DrawerSidebar :setSelectedNote="setSelectedNote" />
      <AppBar v-if="renderComponent" :note="selectedNote" />
      <MainNote v-if="renderComponent" :note="selectedNote" />
      <AddNotesDialog />
    </v-layout>
  </v-card>
</template>
<script setup lang="ts">
import { ref, nextTick } from 'vue'
import { usePage } from '@inertiajs/vue3'
import DrawerSidebar from './DrawerSidebar.vue'
import MainNote from './MainNote.vue'
import AppBar from './AppBar.vue';
import AddNotesDialog from './AddNotesDialog.vue';

const { notes } = usePage().props as unknown as { notes: any[] }

const selectedNote = ref<any>(notes.length > 0 ? notes[0] : new URLSearchParams(location.search).get('note'))
const renderComponent = ref(true)

async function setSelectedNote(id: number) {
  renderComponent.value = false
  await nextTick()
  selectedNote.value = notes.find(note => note.id == id)
  renderComponent.value = true
}
</script>
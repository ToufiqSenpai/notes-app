<template>
  <v-navigation-drawer class="p-4" width="320" floating :temporary="mobile" :permanent="!mobile">
    <div class="text-lg mb-3">All Notes</div>
    <v-text-field variant="outlined" density="compact" prepend-inner-icon="search" placeholder="Search Notes"
      v-model="searchInput" />
    <div v-for="note in filteredNotes()">
      <div 
        class="h-28 rounded-lg p-5 mb-4 flex flex-col justify-between"
        :class="{ 
          'bg-[#fef5e5]': note.color == NoteColors.YELLOW,
          'bg-[#eff9ff]': note.color == NoteColors.TURQOISE,
          'bg-[#fdede8]': note.color == NoteColors.SALMON,
          'bg-[#e6fffa]': note.color == NoteColors.GREEN
         }"
        :key="note.id" 
        @click="setSelectedNote(note.id)"
      >
        <div 
          class="font-semibold"
          :class="{
            'text-[#fecf2c]': note.color == NoteColors.YELLOW,
            'text-[#09cbdf]': note.color == NoteColors.TURQOISE,
            'text-[#fb9c99]': note.color == NoteColors.SALMON,
            'text-[#41bb98]': note.color == NoteColors.GREEN
          }"
        >{{ note.title }}</div>
        <div class="flex justify-between items-center">
          <time class="text-sm">25-12-23</time>
          <span @click="router.delete(`/notes/${note.id}`, { onSuccess: () => router.visit('/', { only: ['notes'] })})"><v-icon class="cursor-pointer" icon="delete" /></span>
        </div>
      </div>
    </div>
  </v-navigation-drawer>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3';
import { useDisplay } from 'vuetify';
import NoteColors from '../Enums/NoteColors';

const { notes } = usePage().props
const { mobile } = useDisplay()

const searchInput = ref('')

function filteredNotes() {
  return (notes as any[]).filter(note => new RegExp(searchInput.value, 'i').test(note.title))
}

defineProps<{ setSelectedNote: (id: number) => void}>()
</script>
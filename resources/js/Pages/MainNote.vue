<template>
  <v-main class="min-h-[100vh]">
    <div class="px-4" v-if="note">
      <v-textarea variant="outlined" v-model="content" />
      <div class="mt-10">
        <div class="text-lg font-semibold">Color</div>
        <div class="flex items-center mt-1 gap-4">
          <span class="w-9 h-9 bg-metallic-yellow rounded-full cursor-pointer" @click="handleColorChange(NoteColors.YELLOW)">
            <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="color == NoteColors.YELLOW" />
          </span>
          <span class="w-9 h-9 bg-turqoise rounded-full cursor-pointer" @click="handleColorChange(NoteColors.TURQOISE)">
            <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="color == NoteColors.TURQOISE" />
          </span>
          <span class="w-9 h-9 bg-salmon rounded-full cursor-pointer" @click="handleColorChange(NoteColors.SALMON)">
            <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="color == NoteColors.SALMON" />
          </span>
          <span class="w-9 h-9 bg-persian-green rounded-full cursor-pointer" @click="handleColorChange(NoteColors.GREEN)">
            <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="color == NoteColors.GREEN" />
          </span>
        </div>
      </div>
    </div>
  </v-main>
  <!-- Add Notes Dialog -->
</template>
<script setup lang="ts">
import { ref, watch } from 'vue'
import { router } from '@inertiajs/vue3'
import NoteColors from '../Enums/NoteColors';
import debounce from 'lodash.debounce'

const { note } = defineProps({ note: Object })

const content = ref(note?.content ?? '')

const color = ref(note?.color ?? null)

watch(content, debounce(() => router.patch(`/notes/${note.id}`, { content: content.value }), 500))

function handleColorChange(noteColor: NoteColors) {
  router.patch(`/notes/${note.id}`, { color: noteColor }, { onSuccess: () => router.visit('/') })
}
</script>
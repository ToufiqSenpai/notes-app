<template>
  <v-dialog width="500" activator="#add-notes-btn" transition="">
    <template v-slot:default="{ isActive }">
      <v-card title="Add Notes" class="px-2" tag="form" @submit.prevent="form.post('/notes', {
        onSuccess: () => {
          isActive.value = false
          
          form.defaults({ title: null, content: null, color: NoteColors.YELLOW })
          form.reset()

          router.visit('/', { only: ['notes'] })
        }
      })">
        <div class="px-4">
          <v-text-field density="compact" variant="outlined" v-model="form.title" label="Title"
            :errorMessages="form.errors.title" />
          <v-textarea variant="outlined" v-model="form.content" label="Notes" :errorMessages="form.errors.content" />
          <div class="flex items-center mt-1 gap-4">
            <span class="w-9 h-9 bg-metallic-yellow rounded-full cursor-pointer" @click="form.color = NoteColors.YELLOW">
              <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="form.color == NoteColors.YELLOW" />
            </span>
            <span class="w-9 h-9 bg-turqoise rounded-full cursor-pointer" @click="form.color = NoteColors.TURQOISE">
              <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="form.color == NoteColors.TURQOISE" />
            </span>
            <span class="w-9 h-9 bg-salmon rounded-full cursor-pointer" @click="form.color = NoteColors.SALMON">
              <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="form.color == NoteColors.SALMON" />
            </span>
            <span class="w-9 h-9 bg-persian-green rounded-full cursor-pointer" @click="form.color = NoteColors.GREEN">
              <v-icon class="absolute left-[6px] top-1 text-white" icon="check" v-if="form.color == NoteColors.GREEN" />
            </span>
          </div>
        </div>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn @click="isActive.value = false">Cancel</v-btn>
          <v-btn type="submit">Create</v-btn>
        </v-card-actions>
      </v-card>
    </template>
  </v-dialog>
</template>
<script setup lang="ts">
import { useForm, router } from '@inertiajs/vue3'
import NoteColors from '../Enums/NoteColors'

interface FormProps {
  title: string
  content: string
  color: NoteColors
}

const form = useForm<FormProps>({
  title: null,
  content: null,
  color: null
}).defaults({ color: NoteColors.YELLOW }).reset()
</script>
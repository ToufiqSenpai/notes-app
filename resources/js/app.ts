import './bootstrap'
import 'vuetify/styles'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createVuetify } from 'vuetify'
import { aliases, md } from 'vuetify/iconsets/md'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(createVuetify({
        components,
        directives,
        icons: {
          defaultSet: 'md',
          aliases,
          sets: { md }
        }
      }))
      .mount(el)
  },
})
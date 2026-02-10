import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  server: {
    host: true,
    port: 5173,

    cors: {
      origin: [
        'http://192.168.31.109:8000',
      ],
      credentials: true,
    },

    hmr: {
      host: '192.168.31.109',
    },
  },

  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    tailwindcss(),
  ],
})

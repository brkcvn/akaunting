import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { createVuePlugin } from 'vite-plugin-vue2';
import path from 'path';
 
export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/assets/sass/app.css',
            'resources/assets/js/views/auth/common.js'
        ]),
        createVuePlugin(/* options */)
    ],
    resolve: {
        alias: {
          '@/': `${path.resolve(__dirname, './resources/assets/js')}/`
        }
      },
    build: {
        rollupOptions: {
          output: {
            assetFileNames: (assetInfo) => {
              let extType = assetInfo.name.split('.').at(1);
              
              if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                extType = 'img';
              }
              return `assets/${extType}/[name][extname]`;
            },
            chunkFileNames: 'assets/js/auth/[name].min.js',
            entryFileNames: 'assets/js/auth/[name].min.js',
          },
        },
      },
})
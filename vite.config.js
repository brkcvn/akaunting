import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
            'resources/assets/sass/app.css',
            'resources/assets/js/views/auth/common.js'
        ]),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
          '@/': `${path.resolve(__dirname, './resources/assets/js')}/`,
          vue: "vue/dist/vue.esm-bundler.js"
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
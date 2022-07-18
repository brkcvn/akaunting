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
        createVuePlugin({
            template: {
                transformAssetUrls: {
                    // The Vue plugin will re-write asset URLs, when referenced
                    // in Single File Components, to point to the Laravel web
                    // server. Setting this to `null` allows the Laravel plugin
                    // to instead re-write asset URLs to point to the Vite
                    // server instead.
                    base: null,
 
                    // The Vue plugin will parse absolute URLs and treat them
                    // as absolute paths to files on disk. Setting this to
                    // `false` will leave absolute URLs un-touched so they can
                    // reference assets in the public directly as expected.
                    includeAbsolute: false,
                },
            },
        }),
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
            chunkFileNames: 'assets/js/auth/[name].js',
            entryFileNames: 'assets/js/auth/[name].js',
          },
        },
      },
});
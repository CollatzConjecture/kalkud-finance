import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { babel } from '@rollup/plugin-babel';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/particle.js',
            ],
            refresh: true,
        }),
        babel({
            babelHelpers: 'bundled',
            presets: ['@babel/preset-env'],
            exclude: 'node_modules/**',
        }),
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                app: 'resources/js/app.js',
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name].js',
                assetFileNames: '[ext]/[name].[ext]',
            },
        },
    },
});

import {defineConfig} from 'vite'
import laravel, {refreshPaths} from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            //input: ['resources/css/app.css', 'resources/js/app.js'],
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/filament/admin/theme.css', 'resources/js/filament/pet-actions.js'],
            refresh: [
                ...refreshPaths,
                'app/Filament/**',
                'app/Forms/Components/**',
                'app/Livewire/**',
                'app/Infolists/Components/**',
                'app/Providers/Filament/**',
                'app/Tables/Columns/**',
            ],
        }),
    ],
})

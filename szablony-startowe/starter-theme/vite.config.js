import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';

// WAŻNE: zmień nazwę folderu w `base`, jeśli zmieniasz nazwę motywu.
// Musi pasować do ścieżki w wp-content/themes/<folder>/dist/.
const THEME_FOLDER = 'starter-theme';

export default defineConfig({
  plugins: [tailwindcss()],
  base: `/wp-content/themes/${THEME_FOLDER}/dist/`,
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    manifest: true, // generuje dist/.vite/manifest.json — czyta go functions.php
    rollupOptions: {
      // Entry: main.js importuje styles.css, więc CSS trafia do tego samego entry w manifeście.
      input: 'src/main.js',
    },
  },
  server: {
    // Stały port + CORS, żeby WP (inny origin) mógł ładować moduły z dev servera w trybie HMR.
    port: 5173,
    strictPort: true,
    cors: true,
  },
});

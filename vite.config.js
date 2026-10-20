import { dirname, resolve } from 'node:path';
import { mkdirSync, rmSync, writeFileSync } from 'node:fs';
import { fileURLToPath } from 'node:url';
import { defineConfig } from 'vite';

const projectRoot = dirname(fileURLToPath(import.meta.url));

export default defineConfig({
  root: projectRoot,
  plugins: [{
    name: 'write-vite-hot-file',
    configureServer(server) {
      const hotFile = resolve(projectRoot, 'src/assets/vite-hot');
      mkdirSync(dirname(hotFile), { recursive: true });
      writeFileSync(hotFile, 'http://localhost:5173');
      server.httpServer?.on('close', () => rmSync(hotFile, { force: true }));
    },
  }],
  build: {
    manifest: true,
    outDir: resolve(projectRoot, 'src/assets/build'),
    rollupOptions: {
      input: resolve(projectRoot, 'frontend/js/main.js'),
    },
  },
});

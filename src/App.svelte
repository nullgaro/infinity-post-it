<script>
  import svelteLogo from './assets/svelte.svg'
  import viteLogo from '/vite.svg'
  import Counter from './lib/Counter.svelte'
</script>

<template lang="pug">
  div
    a(href='https://vitejs.dev' target='_blank' rel='noreferrer')
      img.logo(src='{viteLogo}' alt='Vite Logo')
    a(href='https://svelte.dev' target='_blank' rel='noreferrer')
      img.logo.svelte(src='{svelteLogo}' alt='Svelte Logo')
  h1 Vite + Svelte
  .card
    Counter
  p
    | Check out
    a(href='https://github.com/sveltejs/kit#readme' target='_blank' rel='noreferrer') SvelteKit
    | , the official Svelte app framework powered by Vite!
  p.read-the-docs
    | Click on the Vite and Svelte logos to learn more

</template>

<style lang="sass">
  .logo
    height: 6em
    padding: 1.5em
    will-change: filter
    transition: filter 300ms

  .logo:hover
    filter: drop-shadow(0 0 2em #646cffaa)

  .logo.svelte:hover
    filter: drop-shadow(0 0 2em #ff3e00aa)

  .read-the-docs
    color: #888

</style>

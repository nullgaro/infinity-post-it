<script>
  import "./app.css";
</script>

<template lang="pug">
  .bg-p-light-turquoise.h-screen
    .py-4.px-6.bg-p-turquoise.border-b-4.border-p-dark-turquoise.flex.place-content-between
      h1.text-4xl.text-p-white Infinity Post-it
      div.w-40.flex.place-content-between.justify-around.place-content-center
        a(href="/about").mt-2.text-p-white.align-baseline About
        button
          img(src="src/assets/images/profile_icon.svg" alt="test").h-8

</template>

<style lang="sass" scoped>
</style>
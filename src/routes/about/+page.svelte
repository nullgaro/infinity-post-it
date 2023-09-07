<script>
  import "../../app.css";
  import ProfileIcon from "../../lib/ProfileIcon.svelte";
  import FilterIcon from "../../lib/FilterIcon.svelte";
  import OrderIcon from "../../lib/OrderIcon.svelte";
  import PostIt from "../../lib/PostIt.svelte";

</script>

<template lang="pug">
  div(class="min-h-screen w-full bg-p-light-gray flex flex-col items-center justify-between")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-start")
      a(href="/")
        h1(class="text-4xl text-p-white") Infinity Post-it

    div(class="p-8 max-w-[75%] my-20 bg-p-gray rounded-lg flex flex-col items-center justify-center gap-5")
      h2(class="text-p-white text-3xl") About Infinity Post-It
      p(class="text-p-white text-xl text-center") Welcome to Infinity Post-It, a cutting-edge web platform that brings the art of digital Post-it notes to life. Unlike anything you've seen before, Infinity Post-It provides an innovative and engaging way to share your thoughts, ideas, and experiences with the world.

      h2(class="text-p-white text-3xl") Our Vision
      p(class="text-p-white text-xl text-center") At Infinity Post-It, we're driven by a singular vision: to create a dynamic and interactive virtual space where users can express themselves freely. Think of it as your personal canvas on the web, where each Post-it note represents a unique perspective, story, or creative expression.

      h2(class="text-p-white text-3xl") Key Features
      ul(class="text-p-white text-xl text-center list-disc")
        li()
          span(class="font-bold") Post-it Wall: 
          | Our platform showcases a captivating virtual wall where Post-it notes from users around the globe come together. Share your insights, anecdotes, or simply brighten someone's day with a colorful note.
        li()
          span(class="font-bold") User Accounts: 
          | Create an account on Infinity Post-It to personalize your experience. Log in securely, manage your profile, and upload a profile picture that represents you.

      h2(class="text-p-white text-3xl") Tech Stack
      p(class="text-p-white text-xl text-center") At Infinity Post-It combines the power of modern web development technologies to offer a seamless user experience:

      ul(class="text-p-white text-xl text-center list-disc")
        li()
          span(class="font-bold") Front End: 
          | We use SvelteKit as the foundation for our dynamic views, while harnessing the versatility of Tailwind CSS, SCSS, and Pug for stunning styles and layouts.
        li()
          span(class="font-bold") Back End: 
          | Our robust PHP-based RESTful API handles data interactions, ensuring a secure and efficient platform. MariaDB serves as the backbone of our database, facilitating data storage and retrieval.
        li()
          span(class="font-bold") Development Automation: 
          | Vite is the unsung hero behind the scenes, automating the preprocessing of Svelte files, Pug templates, and server management. This allows us to deliver a smooth and responsive user experience.

      p(class="text-p-white text-xl text-center") Join us on this exciting journey as we reshape the way you share your thoughts and experiences online. Experience the creativity, connection, and convenience that Infinity Post-it brings to the world of digital expression.
      p(class="text-p-white text-xl text-center") Ready to get started? Sign up today and start sharing your virtual Post-it notes with the world. Together, we're building something extraordinary.

    div(class="w-full py-4 px-6 bg-p-gray flex place-content-end")
</template>

<style lang="sass" scoped>
</style>
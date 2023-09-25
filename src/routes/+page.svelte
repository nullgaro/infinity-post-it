<script>
  import "../app.css";
  import { onMount } from "svelte";

  export let data;
  const { serverUsername } = data;

  import ProfileIcon from "../lib/ProfileIcon.svelte";
  import FilterIcon from "../lib/FilterIcon.svelte";
  import OrderIcon from "../lib/OrderIcon.svelte";
  import PostIt from "../lib/PostIt.svelte";


  let username = serverUsername ?? "Anonymous";

  const getProfilePhoto = async () => {
    const image = `./public/images/profiles/${username}.png`;

    return await fetch(image).then((resp) => {
      return resp.status === 200
        ? image
        : "./public/images/profiles/Anonymous.png";
    });
  };

  const profilePhoto = getProfilePhoto();

  const fetchPostIts = (async () => {
    const response = await fetch("http://localhost:8080/post-its", {
      credentials: "include",
    });
    return await response.json();
  })();

  const createPostIt = async (e) => {
    const formData = new FormData(e.target);
    let data = {};

    for (let field of formData) {
      const [key, value] = field;
      data[key] = value;
    }

    data["username"] = username;

    const response = await fetch("http://localhost:8080/post-its", {
      method: "POST",
      credentials: "include",
      body: JSON.stringify(data),
      headers: { "Content-type": "application/json; charset=UTF-8" },
    });

    if (response.status === 201) {
      window.location.reload(true);
    }
  };
</script>

<template lang="pug">
  div(class="min-h-screen w-full bg-p-brown")
    div(class="bg-p-light-gray flex flex-col items-center")
      div(class="w-full py-4 px-6 bg-p-gray flex place-content-between")
        h1(class="text-4xl text-p-white") Infinity Post-it
        div(class="w-40 flex justify-around items-center")
          a(href="/about" class="text-p-white align-baseline duration-150 hover:text-p-navy") About
          a(href="/login")
            +await("profilePhoto")
              p loading
              +then("path")
                img(src="{path}" alt="{username}" class="h-10 w-10")

      div(class="h-96 w-4/5 sm:w-[30rem] my-20 bg-p-gray rounded-lg flex flex-col items-center justify-center")
        form(on:submit|preventDefault="{createPostIt}" class="h-full w-11/12 flex flex-col justify-evenly")
          div(class="w-full flex justify-center items-center")
            div(class="h-full w-1/2 flex items-center gap-3")
              +await("profilePhoto")
                p loading
                +then("path")
                  img(src="{path}" alt="{username}" class="h-10 w-10")
              p(class="text-p-white") {username}
            div(class="h-full w-1/2 flex items-center justify-end")
              input(name="post" value="Post-it!" type="submit" class="h-8 w-3/6 rounded-2xl bg-p-navy border border-solid border-p-gray transition-all duration-300 ease-in-out hover:cursor-pointer hover:bg-p-light-navy hover:border hover:border-solid hover:border-p-navy hover:shadow-[0_0_6px_0_rgba(0,173,181,1)]")
          textarea(name="content" placeholder="Type your Post-it..." class="h-4/6 w-full p-3 rounded-md bg-p-white resize-none outline-none border-2 border-solid border-p-gray focus:border-2 focus:border-solid focus:border-p-navy transition-all duration-300 ease-in-out focus:shadow-[0_0_6px_0_rgba(0,173,181,1)]")

    div(class="w-full py-4 px-6 bg-p-gray flex place-content-end gap-5")
        button
          //- https://www.svgrepo.com/svg/510981/filter
          FilterIcon(class="h-8 w-8 [&>*>*]:stroke-p-white [&>*>*]:duration-150 [&>*>*]:hover:stroke-p-navy")
        button
          //- https://www.svgrepo.com/svg/364195/arrows-down-up-fill
          OrderIcon(class="h-8 w-8 [&>*]:fill-p-white [&>*]:duration-150 [&>*]:hover:fill-p-navy")
    ul(class="grid grid-cols-[repeat(auto-fit,_minmax(13rem,_1fr))] place-items-center gap-8 px-4")

      +await("fetchPostIts")
        p ...loading

        +then("post_its")
          +each("post_its as post_it")
            PostIt(props="{post_it}")
        +catch('error')
          p Unable to load the postits :(

</template>

<style lang="sass" scoped>

</style>

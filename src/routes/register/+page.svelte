<script>
  import "../../app.css";
  import ProfileIcon from "../../lib/ProfileIcon.svelte";
  import FilterIcon from "../../lib/FilterIcon.svelte";
  import OrderIcon from "../../lib/OrderIcon.svelte";
  import PostIt from "../../lib/PostIt.svelte";

  const register = (async (e) => {
		const formData = new FormData(e.target)
		let data = {}

		for (let field of formData) {
      const [key, value] = field
			data[key] = value
		}

    const response = await fetch("http://localhost:8080/users", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {"Content-type": "application/json; charset=UTF-8"}
    });

    if(response.status === 201) {
      window.location.assign("/login");
    }

  });

</script>

<template lang="pug">
  div(class="min-h-screen w-full bg-p-light-gray flex flex-col items-center justify-between")
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-start")
      a(href="/")
        h1(class="text-4xl text-p-white") Infinity Post-it

    div(class="h-96 w-4/5 sm:w-[30rem] my-20 bg-p-gray rounded-lg flex flex-col items-center justify-center gap-5")
      h2(class="text-p-white text-3xl") Register
      form(on:submit|preventDefault="{register}" class="h-2/4 w-11/12 flex flex-col justify-evenly items-center")
        input(name="username" type="text" placeholder="Username" class="h-8 p-4 w-4/6 rounded-md bg-p-white border border-solid border-p-gray")
        input(name="email" type="email" placeholder="Email" class="h-8 w-4/6 p-4 rounded-md bg-p-white border border-solid border-p-gray")
        input(name="password" type="password" placeholder="Password" class="h-8 w-4/6 p-4 rounded-md bg-p-white border border-solid border-p-gray")
        input(name="register" value="Register" type="submit" class="h-8 w-4/6 rounded-2xl bg-p-navy border border-solid border-p-gray transition-all duration-300 ease-in-out hover:cursor-pointer hover:bg-p-light-navy hover:border hover:border-solid hover:border-p-navy hover:shadow-[0_0_6px_0_rgba(0,173,181,1)]")
      a(href="/login" class="text-blue-500 text-sm underline") Are you registered? Try to login
    div(class="w-full py-4 px-6 bg-p-gray flex place-content-end")
</template>

<style lang="sass" scoped>
</style>
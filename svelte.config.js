import preprocess from 'svelte-preprocess';

export default {
  // Consult https://svelte.dev/docs#compile-time-svelte-preprocess
  // for more information about preprocessors

  preprocess:  preprocess({
    pug: true
  }),
  optimizeDeps: { include: [ 'objection', 'knex', 'pg' ], exclude: [ 'pg-native' ] },
}

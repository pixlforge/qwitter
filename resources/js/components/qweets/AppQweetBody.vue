<template>
  <div>
    <p class="text-gray-300 whitespace-pre-wrap">
      <component :is="body" />
    </p>
  </div>
</template>

<script>
export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  computed: {
    body () {
      return {
        'template': `<div>${this.qweet.body} <app-qweet-hashtag-entity /></div>`
      }
    }
  }
}
</script>

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
        'template': `<div>${this.replaceEntities(this.qweet.body)}</div>`
      }
    },
    entities () {
      return this.qweet.entities.data.sort((a, b) => b.start - a.start)
    }
  },
  methods: {
    replaceEntities (body) {
      this.entities.forEach((entity) => {
        body = body.substring(0, entity.start) + this.entityComponent(entity) + body.substring(entity.end)
      })

      return body
    },
    entityComponent (entity) {
      return `<app-qweet-${entity.type}-entity body="${entity.body}" />`
    }
  }
}
</script>

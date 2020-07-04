<template>
  <div>
    Conversation
  </div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  props: {
    id: {
      type: String,
      required: true
    }
  },
  mounted () {
    this.getQweets(`/api/qweets/${this.id}`);
  },
  methods: {
    ...mapActions({
      getQweets: 'conversation/getQweets'
    })
  }
}
</script>

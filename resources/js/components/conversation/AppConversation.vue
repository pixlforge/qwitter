<template>
  <div>

    <div>
      parents
    </div>

    <div class="border-t-8 border-b-8 border-gray-800 text-lg">
      <app-qweet
        v-if="qweet(id)"
        :qweet="qweet(id)"
      />
    </div>

    <div>
      replies
    </div>
    
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  props: {
    id: {
      type: String,
      required: true
    }
  },
  computed: {
    ...mapGetters({
      qweet: 'conversation/qweet'
    })
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

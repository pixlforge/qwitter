<template>
  <div>

    <!-- Parent qweets -->
    <div v-if="qweet(id)">
      <app-qweet
        v-for="q in parents(id)"
        :key="q.id"
        :qweet="q"
      />
    </div>

    <!-- Qweet -->
    <div
      :class="{
        'border-t-8': parents(id).length
      }"
      class="border-b-8 border-gray-800 text-xl"
    >
      <app-qweet
        v-if="qweet(id)"
        :qweet="qweet(id)"
      />
    </div>

    <!-- Replies -->
    <div>
      <app-qweet
        v-for="q in replies(id)"
        :key="q.id"
        :qweet="q"
      />
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
      qweet: 'conversation/qweet',
      parents: 'conversation/parents',
      replies: 'conversation/replies'
    })
  },
  mounted () {
    this.getQweets(`/api/qweets/${this.id}`);
    this.getQweets(`/api/qweets/${this.id}/replies`);
  },
  methods: {
    ...mapActions({
      getQweets: 'conversation/getQweets'
    })
  }
}
</script>

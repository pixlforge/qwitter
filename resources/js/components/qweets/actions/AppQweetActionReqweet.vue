<template>
  <div>
    <app-dropdown v-if="!reqweeted">

      <!-- Button (reqweet) -->
      <template slot="trigger">
        <app-qweet-action-reqweet-button :qweet="qweet"></app-qweet-action-reqweet-button>
      </template>

      <!-- Reqweet -->
      <app-dropdown-item @click.prevent="reqweetOrUnreqweet">
        Reqweet
      </app-dropdown-item>

      <!-- Reqweet with comment -->
      <app-dropdown-item @click.prevent="$modal.show(AppQweetReqweetModal, { qweet })">
        Reqweet with comment
      </app-dropdown-item>
    </app-dropdown>

    <!-- Button (un-reqweet) -->
    <app-qweet-action-reqweet-button
      v-else
      @click.native="reqweetOrUnreqweet"
      :qweet="qweet"
    ></app-qweet-action-reqweet-button>

  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import AppQweetReqweetModal from '../../modals/AppQweetReqweetModal'

export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      AppQweetReqweetModal
    }
  },
  computed: {
    ...mapGetters({
      reqweets: 'reqweets/reqweets'
    }),
    reqweeted () {
      return this.reqweets.includes(this.qweet.id)
    }
  },
  methods: {
    ...mapActions({
      reqweetQweet: 'reqweets/reqweetQweet',
      unreqweetQweet: 'reqweets/unreqweetQweet'
    }),
    reqweetOrUnreqweet () {
      if (this.reqweeted) {
        this.unreqweetQweet(this.qweet)
        return;
      }

      this.reqweetQweet(this.qweet)
    }
  }
}
</script>

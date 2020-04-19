<template>
  <ul class="flex mt-4">

    <!-- Reply -->
    <li>
      <app-qweet-action-reply class="mr-8"/>
    </li>

    <!-- Reqweet -->
    <li>
      <app-qweet-action-reqweet
        :qweet="qweet"
        class="mr-8"
      />
    </li>

    <!-- Like -->
    <li>
      <app-qweet-action-like
        :qweet="qweet"
        class="mr-8"
      />
    </li>
  </ul>
</template>

<script>
export default {
  props: {
    qweet: {
      type: Object,
      required: true
    }
  }  
}
</script>

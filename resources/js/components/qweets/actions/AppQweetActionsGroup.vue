<template>
  <ul class="flex mt-4">
    <li class="mr-8">
      <app-qweet-action-reply/>
    </li>
    <li class="mr-8">
      <app-qweet-action-reqweet/>
    </li>
    <li class="mr-8">
      <app-qweet-action-like :qweet="qweet"/>
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

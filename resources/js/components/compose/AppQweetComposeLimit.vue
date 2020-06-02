<template>
  <div class="w-10 h-10 relative">
    <svg viewBox="0 0 120 120" class="transform -rotate-90">

      <circle
        :r="radius"
        cx="60"
        cy="60"
        fill="none"
        stroke-width="8"
        class="stroke-current text-gray-700"
      />

      <circle
        :r="radius"
        :stroke-dasharray="dash"
        :stroke-dashoffset="offset"
        :class="{
          '!text-red-600': percentageIsOver,
        }"
        cx="60"
        cy="60"
        fill="none"
        stroke-width="8"
        class="stroke-current text-blue-500"
      />

    </svg>
  </div>
</template>

<script>
export default {
  props: {
    body: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      radius: 30
    }
  },
  computed: {
    dash () {
      return 2 * Math.PI * this.radius
    },
    percentageIsOver() {
      return this.percentage > 100
    },
    percentage () {
      return Math.round((this.body.length * 100) / 280)
    },
    displayPercentage () {
      return this.percentage <= 100 ? this.percentage : 100
    },
    offset () {
      let progress = this.displayPercentage / 100

      return this.dash * (1 - progress)
    }
  }
}
</script>

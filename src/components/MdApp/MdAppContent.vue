<template>
  <md-card
    v-if="showCard"
    class="md-app-content md-flex"
    v-bind="$attrs"
  >
    <slot />
  </md-card>

  <md-content
    v-else
    class="md-app-content md-flex"
    v-bind="$attrs"
  >
    <slot />
  </md-content>
</template>

<script>
  export default {
    name: 'MdAppContent',
    inject: ['MdApp'],
    computed: {
      showCard () {
        return this.MdApp.options && this.MdApp.options.mode === 'overlap'
      }
    }
  }
</script>

<style lang="scss">
  .md-app-content {
    min-height: 100%;

    .md-card {
      margin-right: 16px;
      margin-left: 16px;
      overflow: visible;
    }
  }
</style>

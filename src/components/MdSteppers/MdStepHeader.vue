<template>
  <md-button
    class="md-stepper-header"
    :class="classes"
    :disabled="shouldDisable"
    v-bind="data.props"
    v-on="data.events"
    @click="!MdSteppers.syncRoute && MdSteppers.setActiveStep(index)"
  >
    <md-warning-icon
      v-if="data.error"
      class="md-stepper-icon"
    />

    <div
      v-else
      class="md-stepper-number"
    >
      <md-edit-icon
        v-if="data.done && data.editable"
        class="md-stepper-editable"
      />
      <md-check-icon
        v-else-if="data.done"
        class="md-stepper-done"
      />
      <template v-else>
        {{ MdSteppers.getStepperNumber(index) }}
      </template>
    </div>

    <div class="md-stepper-text">
      <span class="md-stepper-label">{{ data.label }}</span>
      <span
        v-if="data.error"
        class="md-stepper-error"
      >{{ data.error }}</span>
      <span
        v-else-if="data.description"
        class="md-stepper-description"
      >{{ data.description }}</span>
    </div>
  </md-button>
</template>

<script>
  import MdWarningIcon from 'core/icons/MdWarningIcon'
  import MdCheckIcon from 'core/icons/MdCheckIcon'
  import MdEditIcon from 'core/icons/MdEditIcon'

  export default {
    name: 'MdStepperHeader',
    components: {
      MdWarningIcon,
      MdCheckIcon,
      MdEditIcon
    },
    inject: ['MdSteppers'],
    props: {
      index: {
        type: String,
        required: true
      }
    },
    computed: {
      data () {
        return this.MdSteppers.items[this.index]
      },
      shouldDisable () {
        const { data, index, MdSteppers }  = this

        if (data.done && !data.editable) {
          return true
        }

        return MdSteppers.isLinear && !MdSteppers.isPreviousStepperDone(index)
      },
      classes () {
        return {
          'md-active': !this.MdSteppers.syncRoute && this.index === this.MdSteppers.activeStep,
          'md-error': this.data.error,
          'md-done': this.data.done
        }
      }
    }
  }
</script>

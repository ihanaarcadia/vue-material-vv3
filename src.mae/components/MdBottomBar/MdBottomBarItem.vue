<template>
  <md-button
    :id="id"
    class="md-bottom-bar-item"
    :class="itemClasses"
    :disabled="mdDisabled"
    :md-ripple="MdBottomBar.type === 'fixed'"
    v-bind="attrs"
    v-on="$listeners"
    @click="setActiveItem"
  >
    <slot v-if="$slots.default" />

    <template v-else>
      <md-icon
        v-if="isAssetIcon(mdIcon)"
        class="md-bottom-bar-icon"
        :md-src="mdIcon"
      />
      <md-icon
        v-else
        class="md-bottom-bar-icon"
      >
        {{ mdIcon }}
      </md-icon>
      <span class="md-bottom-bar-label">{{ mdLabel }}</span>
    </template>
  </md-button>
</template>

<script>
  import MdAssetIcon from 'core/mixins/MdAssetIcon/MdAssetIcon'
  import MdRouterLink from 'core/mixins/MdRouterLink/MdRouterLink'
  import MdUuid from 'core/utils/MdUuid'
  import MdRouterLinkProps from 'core/utils/MdRouterLinkProps'

  const ignoredProps = ['id', 'mdLabel', 'mdIcon', 'mdDisabled']

  export default {
    name: 'MdBottomBarItem',
    mixins: [MdAssetIcon, MdRouterLink],
    inject: ['MdBottomBar'],
    props: {
      id: {
        type: String,
        default: () => 'md-bottom-bar-item-' + MdUuid()
      },
      mdLabel: String,
      mdIcon: String,
      mdDisabled: Boolean
    },
    computed: {
      itemClasses () {
        return {
          'md-active': this.id === this.MdBottomBar.activeItem
        }
      },
      attrs () {
        let attrs = {...this.$attrs}

        const propNames = Object.keys(this.$options.propsData)
        propNames.forEach(prop => {
          if (!ignoredProps.includes(prop)) {
            attrs[prop] = this[prop]
          }
        })

        return attrs
      }
    },
    watch: {
      $props: {
        deep: true,
        handler () {
          this.setItemData()
        }
      },
      $attrs: {
        deep: true,
        handler () {
          this.setItemData()
        }
      }
    },
    beforeCreate () {
      if (this.$router && this.$options.propsData.to) {
        const componentProps = MdRouterLinkProps(this, this.$options.props)
        this.$options.props = componentProps
      }
    },
    created () {
      this.setItemData()
    },
    beforeUnmount () {
      this.$delete(this.MdBottomBar.items, this.id)
    },
    methods: {
      getPropValues () {
        const propNames = Object.keys(this.$options.props)
        let values = {}

        propNames.forEach(prop => {
          if (!ignoredProps.includes(prop)) {
            if (this[prop]) {
              values[prop] = this[prop]
            } else if (this.$attrs && this.$attrs.hasOwnProperty(prop)) {
              if (prop) {
                values[prop] = this.$attrs[prop]
              } else {
                values[prop] = true
              }
            }
          }
        })

        return values
      },
      setItemData () {
        this.$set(this.MdBottomBar.items, this.id, {
          disabled: this.mdDisabled,
          options: this.mdTemplateOptions,
          props: this.getPropValues()
        })
      },
      setActiveItem ($event) {
        if (!this.MdBottomBar.syncRoute) {
          this.MdBottomBar.activeItem = this.id
        }

        if (this.MdBottomBar.type === 'shift') {
          this.MdBottomBar.mouseEvent = $event
        }
      }
    }
  }
</script>

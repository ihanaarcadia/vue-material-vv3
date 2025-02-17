<template>
  <td
    class="md-table-cell"
    :class="cellClasses"
  >
    <div class="md-table-cell-container">
      <slot />
    </div>
  </td>
</template>

<script>
  export default {
    name: 'MdTableCell',
    
    inject: ['MdTable'],//
    props: {
      mdId: {type: [String, Number],default: () => ""},
      mdLabel: {type: String,default: () => ""},
      mdNumeric: Boolean,
      mdTooltip: {type: String,default: () => ""},
      mdSortBy: {type: String,default: () => ""}
    },
    data: () => ({
      index: null,
      parentNode: null
    }),
    computed: {
      cellClasses () {
        return {
          'md-numeric': this.mdNumeric
        }
      }
    },
    watch: {
      mdSortBy () {
        this.setCellData()
      },
      mdNumeric () {
        this.setCellData()
      },
      mdLabel () {
        this.setCellData()
      },
      mdTooltip () {
        this.setCellData()
      }
    },
    mounted () {
      this.parentNode = this.$el.parentNode
      this.updateAllCellData()
    },
    unmounted () {
      const rowRemoved = this.$el.parentNode !== null

      if (rowRemoved) {
        return false
      }

      this.updateAllCellData()
    },
    methods: {
      setCellData ($vm = this) {
        this.$set(this.MdTable.items, $vm.index, {
          id: $vm.mdId,
          label: $vm.mdLabel,
          numeric: $vm.mdNumeric,
          tooltip: $vm.mdTooltip,
          sortBy: $vm.mdSortBy
        })
      },
      updateAllCellData () {
        this.MdTable.items = {}

        const cells = Array.from(this.parentNode.childNodes).filter(({ tagName, classList }) => {
          const isSelection = classList && classList.contains('md-table-cell-selection')
          const isTd = tagName && tagName.toLowerCase() === 'td'

          return isTd && !isSelection
        })

        cells.forEach((cell, index) => {
          const $vm = cell.__vue__

          $vm.index = index

          this.setCellData($vm)
        })
      }
    }
  }
</script>

<style lang="scss">
  @import "~components/MdAnimation/variables";

  .md-table-cell {
    height: 48px;
    position: relative;
    transition: .3s $md-transition-default-timing;
    font-size: 13px;
    line-height: 18px;

    &.md-numeric {
      text-align: right;
    }

    &:last-child .md-table-cell-container {
      padding-right: 24px;
    }
  }

  .md-table-cell-container {
    padding: 6px 32px 6px 24px;
  }
</style>

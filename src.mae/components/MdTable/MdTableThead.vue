<template>
  <thead>
    <tr>
      <md-table-head-selection />
      <md-table-head
        v-for="(item, index) in MdTable.items"
        :key="index"
        v-bind="item"
      />
    </tr>
  </thead>
</template>

<script>
  import MdTableHead from './MdTableHead'
  import MdTableHeadSelection from './MdTableHeadSelection'

  export default {
    name: 'MdTableThead',
    components: {
      MdTableHead,
      MdTableHeadSelection
    },
    inject: ['MdTable']
  }
</script>

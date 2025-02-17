<script>
  export default {
    name: 'MdTableRowGhost',
    props: {
      mdIndex: {type: [String, Number],default: () => ""},
      mdId: {type: [String, Number],default: () => ""},
      mdItem: {type: [Array, Object],default: () => []}
    },
    render () {
      this.$slots.default()[0].componentOptions.propsData.mdIndex = this.mdIndex
      this.$slots.default()[0].componentOptions.propsData.mdId = this.mdId
      this.$slots.default()[0].componentOptions.propsData.mdItem = this.mdItem

      return this.$slots.default()[0]
    }
  }
</script>

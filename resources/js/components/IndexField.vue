<template>
  <div
    v-if="field.inlineIndex"
    slot="field"
  >
    <div class="inline-flex">
      <div class="flex-1 text-center py-2 m-1">
        <checkbox
          :id="field.attribute"
          :name="field.name"
          :checked="checked"
          :disabled="isReadonly"
          @input="toggle"
        />
      </div>
    </div>
  </div>
  <div v-else>
    <div class="inline-flex">
      <div class="flex-1 text-center py-2 m-1">
        <span
          class="inline-block rounded-full w-2 h-2 mr-1"
          :class="{ 'bg-success': field.value, 'bg-danger': !field.value }"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'field'],

  data: () => ({
    value: false,
  }),

  computed: {
    checked() {
      return Boolean(this.value)
    },
    resourceId() {
      return this.$parent.resource.id.value;
    }
  },

  mounted() {
    this.value = this.field.value || false
  },

  methods: {
    toggle() {
      this.value = !this.value
      console.log(this.value)
      this.submit()
    },
    async submit() {
      let formData = new FormData();

      let value = this.value ? 1 : 0;

      formData.append(this.field.attribute, value);
      formData.append('_method', 'PUT');

      return Nova.request({
        url: `/nova-api/${this.resourceName}/${this.resourceId}`,
        method: 'put',
        params: {
          winner: value,
        },
      })
    }
  },
}
</script>

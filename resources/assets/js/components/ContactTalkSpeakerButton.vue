<template>
    <div class="flex items-center">
        <button v-if="!sending && !has_been_contacted_by_user" @click="contact" class="text-xs font-bold">
            Give this talk at my conference >
        </button>
        <spinner v-if="sending"></spinner>
    </div>
</template>

<script>
import Spinner from 'vue-spinner-component/src/Spinner.vue';

export default {
  props: ['talk'],

  components: { Spinner },

  data() {
    return {
      sending: false,
      has_been_contacted_by_user: this.talk.has_been_contacted_by_user
    };
  },

  methods: {
    async contact() {
      this.sending = true;
      await axios.post(`/talks/${this.talk.id}/contact-speaker`);
      window.Events.$emit(
        'notify',
        'We have sent an email to the speaker with your details.'
      );
      this.sending = false;
      this.has_been_contacted_by_user = true;
    }
  }
};
</script>

